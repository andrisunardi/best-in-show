<?php

namespace App\Livewire\CMS\Promotion;

use App\Livewire\CMS\Component;
use App\Models\Promotion;
use App\Services\PromotionService;

class PromotionClonePage extends Component
{
    public $promotion;

    public $name;

    public $name_idn;

    public $description;

    public $description_idn;

    public $date;

    public $image;

    public $is_active = true;

    public function mount(Promotion $promotion)
    {
        $this->name = "{$promotion->name} (Copy)";
        $this->name_idn = "{$promotion->name_idn} (Copy)";
        $this->description = $promotion->description;
        $this->description_idn = $promotion->description_idn;
        $this->date = $promotion->date?->format('Y-m-d');
        $this->is_active = $promotion->is_active;
    }

    public function resetFields()
    {
        $this->name = "{$this->promotion->name} (Copy)";
        $this->name_idn = "{$this->promotion->name_idn} (Copy)";
        $this->description = $this->promotion->description;
        $this->description_idn = $this->promotion->description_idn;
        $this->date = $this->promotion->date?->format('Y-m-d');
        $this->is_active = $this->promotion->is_active;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:100|unique:promotions,name',
            'name_idn' => 'required|string|max:100|unique:promotions,name_idn',
            'description' => 'nullable|string|max:65535',
            'description_idn' => 'nullable|string|max:65535',
            'date' => 'nullable|date|date_format:Y-m-d',
            'image' => 'nullable|max:'.env('MAX_IMAGE').'|mimes:'.env('MIMES_IMAGE'),
            'is_active' => 'required|boolean',
        ];
    }

    public function submit()
    {
        $promotion = (new PromotionService())->clone(data: $this->validate(), promotion: $this->promotion);

        $this->flash('success', trans('index.clone_success'), [
            'html' => trans('index.promotion')." - {$promotion->id} - ".trans('index.cloned'),
        ]);

        return redirect()->route('cms.promotion.index');
    }

    public function render()
    {
        return view('livewire.cms.promotion.clone');
    }
}
