<?php

namespace App\Livewire\CMS\Banner;

use App\Livewire\CMS\Component;
use App\Models\Banner;
use App\Services\BannerService;
use App\Services\PetService;

class BannerEditPage extends Component
{
    public $banner;

    public $pet_id;

    public $link;

    public $image;

    public $is_active = true;

    public function mount(Banner $banner)
    {
        $this->pet_id = $banner->pet_id;
        $this->link = $banner->link;
        $this->is_active = $banner->is_active;
    }

    public function resetFields()
    {
        $this->pet_id = $this->banner->pet_id;
        $this->link = $this->banner->link;
        $this->is_active = $this->banner->is_active;
    }

    public function rules()
    {
        return [
            'pet_id' => 'required|integer|exists:pets,id',
            'link' => 'nullable|string|max:100',
            'image' => 'nullable|max:'.env('MAX_IMAGE').'|mimes:'.env('MIMES_IMAGE'),
            'is_active' => 'required|boolean',
        ];
    }

    public function submit()
    {
        $banner = (new BannerService())->edit(banner: $this->banner, data: $this->validate());

        $this->flash('success', trans('index.edit_success'), [
            'html' => trans('index.banner')." - {$banner->id} - ".trans('index.edited'),
        ]);

        return redirect()->route('cms.banner.index');
    }

    public function getPets()
    {
        return (new PetService())->index(is_active: [true], orderBy: 'name', sortBy: 'asc', paginate: false);
    }

    public function render()
    {
        return view('livewire.cms.banner.edit', [
            'pets' => $this->getPets(),
        ]);
    }
}
