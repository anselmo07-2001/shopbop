<?php

namespace App\Livewire;

use App\Models\EndCategory;
use App\Models\MidCategory;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProductAdd extends Component
{
    use WithFileUploads;

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

    public $description = "";
    public $short_description = "";
    public $feature = "";
    public $condition = "";
    public $return_policy = "";

    public $sizes = [];
    public $colors = [];

    public $selected_sizes = [];
    public $selected_colors = [];

    public $feature_photo = null;

    //use for tracking items / adding and removing multiple uploads
    public $other_photos_input_files = [
        ["id" => 1]
    ];
    // use to store the real $other_photos
    public $other_photos = [];

    public $is_featured = 1;
    public $is_active = 1;    


    public function addItem() {
        $this->other_photos_input_files[] = [
            "id" => rand(1000, 9999) // unique for each input
        ];
    }

    public function removeItem($id) {
        // remove input
        $this->other_photos_input_files = array_filter(
            $this->other_photos_input_files,
            fn($file) => $file['id'] !== $id
        );

        // remove file if uploaded
        if (isset($this->other_photos[$id])) {
            unset($this->other_photos[$id]);
        }
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


    public function render()
    {
        return view('livewire.product-add');
    }

    public function store() {

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
            "feature_photo" => "required|image|mimes:jpeg,png,jpg,gif,webp|max:2048",
            "other_photos" => "required|array|min:1",
            "other_photos.*" => "image|mimes:jpeg,png,jpg,gif,webp|max:2048",
            "description" => [ "required", $notEmptyHtml ],
            "short_description" => [ "required", $notEmptyHtml ],
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
            'selected_sizes.required' => 'Please select a size at least one.',
            'selected_colors.required' => 'Please select a color at least one.',
            "other_photos.required" => 'Please upload a photo at least one.',
        ]);

        dd($validated_data);
    }
}
