<?php

namespace App\Livewire;

use App\Models\EndCategory;
use App\Models\MidCategory;
use App\Models\TopCategory;
use Livewire\Component;

class UpdateFormLivewire extends Component
{
    public $title = 'Add End Level Category';
    public $viewAllLink = null;
    public $action = null;
    public $method = "";
    public $inputs= [];

    public $topCategoryId = null;
    public $midCategoryId = null;
    public $end_level_category_name = null;

    protected function rules()
    {
        return [
            'topCategoryId' => 'required|exists:top_categories,id',
            'midCategoryId' => [
                'required',
                'exists:mid_categories,id',
                function ($attribute, $value, $fail) {
                    $exists = MidCategory::where('id', $value)
                        ->where('top_category_id', $this->topCategoryId)
                        ->exists();

                    if (! $exists) {
                        $fail("The selected mid-level category does not belong to the chosen top-level category.");
                    }
                }
            ],
            'end_level_category_name' => 'required|string|max:255|unique:end_categories,name',
        ];
    }

    public function mount() {
        $this->viewAllLink = route('admin.shopSetting.endLevelCategory.index');
        $this->action = route('admin.shopSetting.endLevelCategory.store');
    }

    public function updatingTopCategoryId() {
       $this->midCategoryId = null;
    }

    public function render()
    {
        $top_level_categories = TopCategory::all();
        $mid_level_categories = MidCategory::where("top_category_id", $this->topCategoryId)->get();

        $this->inputs = [
            [
                'type' => 'select',
                "directive" => "wire:model.live=topCategoryId",
                'labelName' => 'Top Level Category Name',
                'name' => 'topCategoryId',
                'labelFor' => 'topCategoryId',
                'id' => 'topCategoryId',
                'options' => collect([
                    [
                        'value' => '',
                        'label' => 'Select Top Level Category',
                        'selected' => true
                    ]
                ])->merge( 
                    $top_level_categories->map( fn($c) => [
                        'value' => $c->id,
                        'label' => $c->name,
                        'selected' => false
                    ])
                )
            ],
            [
                'type' => 'select',
                "directive" => "wire:model.live=midCategoryId",
                'labelName' => 'Mid Level Category Name',
                'name' => 'midCategoryId',
                'labelFor' => 'midCategoryId',
                'id' => 'midCategoryId',
                'options' => collect([
                    [
                        'value' => '',
                        'label' => 'Select Mid Level Category',
                        'selected' => true
                    ]
                ])->merge( 
                    $mid_level_categories->map( fn($c) => [
                        'value' => $c->id,
                        'label' => $c->name,
                        'selected' => false
                    ])
                )
            ],
            [
                'type' => 'text',
                'labelName' => 'End Category Name',
                'value' => '',
                'name' => 'end_level_category_name',
                'labelFor' => 'end_level_category_name',
                'id' => 'end_level_category_name',    
            ]
        ];

        return view('admin.dashboard-components.update-form-livewire');
    }

    public function store() {
        $this->validate();

        EndCategory::create([
            "mid_category_id" => $this->midCategoryId,
            "name" => $this->end_level_category_name
        ]);

        session()->flash('success', 'End Level Category created!');
        return redirect()->route('admin.shopSetting.endLevelCategory.index');
    }
}
