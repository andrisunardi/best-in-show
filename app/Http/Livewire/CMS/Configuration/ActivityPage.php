<?php

namespace App\Http\Livewire\CMS\Configuration;

use App\Http\Livewire\CMS\Component;
use App\Models\User;
use Spatie\Activitylog\Models\Activity;

class ActivityPage extends Component
{
    public $log_name = '';

    public $description = '';

    public $event = '';

    public $subject_type = '';

    public $subject_id = '';

    public $causer_type = '';

    public $causer_id = '';

    public $properties = '';

    public $batch_uuid = '';

    public $user_id = '';

    public $queryString = [
        'log_name' => ['except' => ''],
        'description' => ['except' => ''],
        'subject_type' => ['except' => ''],
        'event' => ['except' => ''],
        'subject_id' => ['except' => ''],
        'causer_type' => ['except' => ''],
        'causer_id' => ['except' => ''],
        'properties' => ['except' => ''],
        'batch_uuid' => ['except' => ''],
        'user_id' => ['except' => ''],
    ];

    public function resetFields()
    {
        $this->reset([
            'log_name',
            'description',
            'subject_type',
            'event',
            'subject_id',
            'causer_type',
            'causer_id',
            'properties',
            'batch_uuid',
            'user_id',
        ]);
    }

    public function getActivityLogNames()
    {
        return Activity::whereNotNull('log_name')->groupBy('log_name')->orderBy('log_name')->pluck('log_name');
    }

    public function getActivityEvents()
    {
        return Activity::whereNotNull('event')->groupBy('event')->orderBy('event')->pluck('event');
    }

    public function getActivitySubjectTypes()
    {
        return Activity::whereNotNull('subject_type')->groupBy('subject_type')->orderBy('subject_type')->pluck('subject_type');
    }

    public function getActivityCauserType()
    {
        return Activity::whereNotNull('causer_type')->groupBy('causer_type')->orderBy('causer_type')->pluck('causer_type');
    }

    public function getUsers()
    {
        return User::active()->orderBy('name')->get();
    }

    public function getActivities()
    {
        return Activity::with('subject', 'causer')
            ->when($this->log_name, fn ($q) => $q->where('log_name', $this->log_name))
            ->when($this->description, fn ($q) => $q->where('description', 'LIKE', "%{$this->description}%"))
            ->when($this->event, fn ($q) => $q->where('event', $this->event))
            ->when($this->subject_type, fn ($q) => $q->where('subject_type', $this->subject_type))
            ->when($this->subject_id, fn ($q) => $q->where('subject_id', 'LIKE', "%{$this->subject_id}%"))
            ->when($this->causer_type, fn ($q) => $q->where('causer_type', $this->causer_type))
            ->when($this->causer_id, fn ($q) => $q->where('causer_id', 'LIKE', "%{$this->causer_id}%"))
            ->when($this->user_id, fn ($q) => $q->where('causer_id', $this->user_id))
            ->when($this->properties, fn ($q) => $q->where('properties', 'LIKE', "%{$this->properties}%"))
            ->when($this->batch_uuid, fn ($q) => $q->where('batch_uuid', 'LIKE', "%{$this->batch_uuid}%"))
            ->latest()
            ->paginate(10);
    }

    public function render()
    {
        return view('livewire.cms.configuration.activity', [
            'activityLogNames' => $this->getActivityLogNames(),
            'activityEvents' => $this->getActivityEvents(),
            'activitySubjectTypes' => $this->getActivitySubjectTypes(),
            'activityCauserTypes' => $this->getActivityCauserType(),
            'users' => $this->getUsers(),
            'activities' => $this->getActivities(),
        ])->extends('layouts.cms.app')->section('content');
    }
}
