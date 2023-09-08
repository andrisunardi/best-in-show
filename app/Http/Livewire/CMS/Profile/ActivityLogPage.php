<?php

namespace App\Http\Livewire\CMS\Profile;

use App\Http\Livewire\CMS\Component;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Models\Activity;

class ActivityLogPage extends Component
{
    public function getActivities()
    {
        return Activity::with('subject', 'causer')
            ->where('causer_id', Auth::user()->id)
            ->latest()
            ->paginate(10);
    }

    public function render()
    {
        return view('livewire.cms.profile.activity-log', [
            'activities' => $this->getActivities(),
        ])->extends('layouts.cms.app')->section('content');
    }
}
