<?php

namespace App\Livewire;

use App\Models\EndCategory;
use App\Models\MidCategory;
use App\Models\Product;
use App\Models\ProductGallery;
use App\Models\TopCategory;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductManagementEdit extends Component
{
    use WithFileUploads;

    public $product = null;

    public $topCategories = [];
    public $selected_topCategory = null;
    public $midCategories = [];
    public $selected_midCategory = null;
    public $endCategories = [];
    public $selected_endCategory = null;

    public $product_name = "";
    public $original_price = null;
    public $current_price = null;
    public $quantity = null;

    public $sizes = [];
    public $colors = [];

    public $selected_sizes = [];
    public $selected_colors = [];

    public $feature_photo = null; // for new upload
    public $current_feature_photo = []; //for showing the current feature photo

    //use for tracking items / adding and removing multiple uploads
    public $other_photos_input_files = [
        // ["id" => 1] 
    ];
    // use to store the new upload $other_photos
    public $other_photos = [];
    public $existing_other_photos = []; //for showing the current other photos

    public $description = "";
    public $short_description = "";
    public $feature = "";
    public $condition = "";
    public $return_policy = "";

    public $is_featured = null;
    public $is_active = null;  

    public function render()
    {
        return view('livewire.product-management-edit');
    }

    public function mount($product) {
        $this->selected_topCategory = $product->endCategory->midCategory->topCategory->id;
        
        $this->midCategories = MidCategory::where("top_category_id", $this->selected_topCategory)->get();
        $this->selected_midCategory = $product->endCategory->midCategory->id;

        $this->endCategories = EndCategory::where("mid_category_id", $product->endCategory->midCategory->id)->get();
        $this->selected_endCategory = $product->endCategory->id;

        $this->product_name = $product->name;
        $this->original_price = $product->original_price;
        $this->current_price = $product->current_price;
        $this->quantity = $product->quantity;

        $this->selected_sizes = $product->sizes()->pluck("sizes.id");
        $this->selected_colors = $product->colors()->pluck("colors.id");

        $this->current_feature_photo = $product->featured_photo;

        $this->existing_other_photos = ProductGallery::where("product_id", $product->id)->get()->toArray();

        // insert all the existings other photos 
        foreach($this->existing_other_photos as $photo) {
            $this->other_photos_input_files[] = [
                "id" => $photo["id"],
                "path" => $photo["image_path"],
            ];
        }

        $this->description = $product->description;
        $this->short_description = $product->short_description;
        $this->feature = $product->features;
        $this->condition = $product->condition;
        $this->return_policy = $product->return_policy;

        $this->is_active = $product->is_active;
        $this->is_featured = $product->is_featured;
    }

    public function loadMidCategories() {
        $this->midCategories = MidCategory::where('top_category_id', $this->selected_topCategory)->get();

        $ids = $this->midCategories->pluck('id')->all();
        if (!in_array($this->selected_midCategory, $ids, true)) {
            $this->selected_midCategory = null;
            $this->selected_endCategory = null;
        }
    }

    public function loadEndCategories() {
        $this->endCategories = EndCategory::where("mid_category_id", $this->selected_midCategory)->get();

        $ids = $this->endCategories->pluck("id")->all();

        if (!in_array($this->selected_endCategory, $ids, true)) {
            $this->selected_endCategory = null;
        }
    }

    public function addItem() {
        $this->other_photos_input_files[] = [
            "id" => rand(1000, 9999) // unique for each input
        ];
    }

    public function removeItem($id) {
        // remove the input from the new upload photo
        $this->other_photos_input_files = array_filter(
            $this->other_photos_input_files,
            fn($file) => $file['id'] !== $id
        );

        // remove the input from the existing photos
        $this->existing_other_photos = collect($this->existing_other_photos)
                                        ->reject(fn($file) => $file["id"] === $id)
                                        ->toArray();

        // remove file if uploaded
        if (isset($this->other_photos[$id])) {
            unset($this->other_photos[$id]);
        }
    }

    public function save() {
        // dd($this->existing_other_photos, $this->other_photos);
        $notEmptyHtml = function ($attribute, $value, $fail) {
            if (trim(strip_tags($value)) === '') {
                $fail("The $attribute field cannot be empty.");
            }
        };

        $validated_data = $this->validate([
            "selected_topCategory" => "required|exists:top_categories,id",
            "selected_midCategory" => "required|exists:mid_categories,id",
            "selected_endCategory" => "required|exists:end_categories,id",
            "product_name" => "required|string|max:255",
            "original_price" => "required|numeric",
            "current_price" => "required|numeric",
            "quantity" => "required|numeric",
            "selected_sizes" => "required|array",
            "selected_sizes.*" => "exists:sizes,id",
            "selected_colors" => "required|array",
            "selected_colors.*" => "exists:colors,id",
            "feature_photo" => "nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048",
            "other_photos" => $this->existing_other_photos && count($this->existing_other_photos) > 0 
                                ? "nullable|array" : "required|array|min:1",
            "other_photos.*" => "image|mimes:jpeg,png,jpg,gif,webp|max:2048",
            "description" => [ "required", $notEmptyHtml ],
            "feature" => [ "required", $notEmptyHtml ],
            "condition" => [ "required", $notEmptyHtml ],
            "short_description" => [ "required", $notEmptyHtml ],
            "return_policy" => [ "required", $notEmptyHtml ],
            'is_featured' => 'required|in:0,1',
            'is_active'   => 'required|in:0,1',
        ],
        [
            'selected_topCategory.required' => 'Please select a top category.',
            'selected_midCategory.required' => 'Please select a mid category.',
            'selected_endCategory.required' => 'Please select an end category.',
            'selected_sizes.required' => 'Please select at least one size.',
            'selected_colors.required' => 'Please select at least one color.',
            'other_photos.required' => 'Please upload at least one photo.',
        ]);   
        
          
        DB::transaction(function () use($validated_data) {

            $featured_photo_filename = $this->product->featured_photo;

            if ($this->feature_photo) {
                //delete the current feature photo
                if (!empty($this->current_feature_photo)) {
                    Storage::disk("public")->delete("products/" . $this->current_feature_photo);
                }

                $featured_photo_filename = "product-featured-" . time() . "." . $validated_data["feature_photo"]->getClientOriginalExtension();
                
                //upload the new featured_photo
                $validated_data["feature_photo"]->storeAs("products", $featured_photo_filename, "public");  
            }

            $this->product->update([
                "name" => $validated_data["product_name"],
                "original_price" => $validated_data["original_price"],
                "current_price" => $validated_data["current_price"],
                "quantity" => $validated_data["quantity"],
                "featured_photo" => $featured_photo_filename,
                "description" => $validated_data["description"],
                "short_description" => $validated_data["short_description"],
                "features" => $validated_data["feature"],
                "condition" => $validated_data["condition"],
                "return_policy" => $validated_data["return_policy"],
                "is_featured" => $validated_data["is_featured"],
                "is_active" => $validated_data["is_active"],
                "end_category_id" => $validated_data["selected_endCategory"]
            ]);

            $this->product->sizes()->sync($validated_data["selected_sizes"]);
            $this->product->colors()->sync($validated_data["selected_colors"]);
          
            //store other photo
            $current_photos = array_column($this->existing_other_photos ?? [], "image_path") ?? [];
            $product_other_photos = ProductGallery::where("product_id", $this->product->id)->pluck("image_path")->toArray();
    
            $remove_other_photos = array_diff($product_other_photos, $current_photos);
            
            foreach ($remove_other_photos as $photo) {
                Storage::disk("public")->delete("gallery/" . $photo);
                ProductGallery::where("product_id", $this->product->id)
                    ->where("image_path", $photo)
                    ->delete();
            };
            
            //process new upload
            $new_photos = [];
            if (!empty($this->other_photos)) {
                foreach ($this->other_photos as $upload) {
                    $filename = Str::uuid() . '.' . $upload->getClientOriginalExtension();
                    $upload->storeAs('gallery', $filename, 'public');
                    $new_photos[] = $filename;

                    ProductGallery::create([
                        "product_id" => $this->product->id,
                        "image_path" => $filename
                    ]);
                }
            }
        });

        session()->flash('success', 'Product updated successfully.');
        return redirect()->route('admin.productManagement.edit', $this->product->id);       
    }
}
