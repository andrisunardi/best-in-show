<?php

namespace App\Livewire\CMS\DisplayContest;

use App\Livewire\CMS\Component;
use App\Models\DisplayContest;
use App\Services\DisplayContestService;

class DisplayContestEditPage extends Component
{
    public $displayContest;

    public $key;

    public $value;

    public $is_active = true;

    public function mount(DisplayContest $displayContest)
    {
        $this->key = $displayContest->key;
        $this->value = $displayContest->value;
        $this->is_active = $displayContest->is_active;
    }

    public function resetFields()
    {
        $this->key = $this->displayContest->key;
        $this->value = $this->displayContest->value;
        $this->is_active = $this->displayContest->is_active;
    }

    public function rules()
    {
        return [
            'key' => "required|string|max:50|unique:displayContests,key,{$this->displayContest->id}",
            'value' => 'required|string|max:65535',
            'is_active' => 'required|boolean',
        ];
    }

    public function submit()
    {
        $displayContest = (new DisplayContestService())->edit(displayContest: $this->displayContest, data: $this->validate());

        $this->flash(
            'success',
            trans('index.displayContest')." - {$displayContest->id} - ".trans('index.edited'),
        );

        return redirect()->route('cms.configuration.displayContest.index');
    }

    public function render()
    {
        return view('livewire.cms.configuration.displayContest.edit');
    }
}
