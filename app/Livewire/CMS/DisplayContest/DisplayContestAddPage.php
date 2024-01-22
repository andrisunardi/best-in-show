<?php

namespace App\Livewire\CMS\DisplayContest;

use App\Livewire\CMS\Component;
use App\Services\DisplayContestService;

class DisplayContestAddPage extends Component
{
    public $key;

    public $value;

    public $is_active = true;

    public function resetFields()
    {
        $this->reset([
            'key',
            'value',
            'is_active',
        ]);
    }

    public function rules()
    {
        return [
            'key' => 'required|string|max:100|unique:displayContests,key',
            'value' => 'required|string|max:65535',
            'is_active' => 'required|boolean',
        ];
    }

    public function submit()
    {
        $displayContest = (new DisplayContestService())->add(data: $this->validate());

        $this->flash(
            'success',
            trans('index.displayContest')." - {$displayContest->id} - ".trans('index.added'),
        );

        return redirect()->route('cms.configuration.displayContest.index');
    }

    public function render()
    {
        return view('livewire.cms.configuration.displayContest.add');
    }
}
