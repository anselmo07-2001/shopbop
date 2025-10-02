<?php

namespace App\Livewire;

use App\Models\EndCategory;
use App\Models\MidCategory;
use App\Models\ProductGallery;
use App\Models\TopCategory;
use Livewire\Component;
use Livewire\WithFileUploads;

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
    // use to store the real $other_photos
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

        $this->existing_other_photos = ProductGallery::where("product_id", $product->id)->get();

        // insert all the existings other photos 
        foreach($this->existing_other_photos as $photo) {
            $this->other_photos_input_files[] = [
                "id" => $photo->id,
                "path" => $photo->image_path,
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
        
    }
}
