<?php

namespace App\Http\Livewire\CMS;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component as LivewireComponent;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Component extends LivewireComponent
{
    use LivewireAlert;
    use WithPagination;
    use WithFileUploads;

    public function getBgClasses()
    {
        return collect([
            'bg-primary',
            'bg-success',
            'bg-warning',
            'bg-danger',
            'bg-info',
            'bg-secondary',
        ]);
    }

    public function resetFile()
    {
        $this->reset(['file']);
    }

    public function resetImage()
    {
        $this->reset(['image']);
    }

    public function resetVideo()
    {
        $this->reset(['video']);
    }
}
