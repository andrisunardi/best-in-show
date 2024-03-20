<?php

namespace App\Livewire\CMS\Promotion;

use App\Livewire\CMS\Component;
use App\Services\PromotionService;

class PromotionAddPage extends Component
{
    public $name;

    public $name_idn;

    public $description;

    public $description_idn;

    public $date;

    public $image;

    public $is_active = true;

    public function resetFields()
    {
        $this->reset([
            'name',
            'name_idn',
            'description',
            'description_idn',
            'date',
            'image',
            'is_active',
        ]);
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
        $promotion = (new PromotionService())->add(data: $this->validate());

        $this->flash('success', trans('index.add_success'), [
            'html' => trans('index.promotion')." - {$promotion->id} - ".trans('index.added'),
        ]);

        return redirect()->route('cms.promotion.index');
    }

    public function render()
    {
        return view('livewire.cms.promotion.add');
    }
}
