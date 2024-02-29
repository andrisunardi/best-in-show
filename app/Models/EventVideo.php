<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * App\Models\EventVideo
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \App\Models\User|null $createdBy
 * @property-read \App\Models\User|null $deletedBy
 * @property-read \App\Models\Event|null $event
 * @property-read mixed $video_url
 * @property-read \App\Models\User|null $updatedBy
 *
 * @method static \Illuminate\Database\Eloquent\Builder|EventVideo active()
 * @method static \Illuminate\Database\Eloquent\Builder|EventVideo inActive()
 * @method static \Illuminate\Database\Eloquent\Builder|EventVideo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EventVideo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EventVideo onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|EventVideo query()
 * @method static \Illuminate\Database\Eloquent\Builder|EventVideo withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|EventVideo withoutTrashed()
 *
 * @property int $id
 * @property int|null $event_id
 * @property string|null $video
 * @property bool|null $is_active
 * @property int|null $created_by_id
 * @property int|null $updated_by_id
 * @property int|null $deleted_by_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 *
 * @method static \Illuminate\Database\Eloquent\Builder|EventVideo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventVideo whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventVideo whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventVideo whereDeletedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventVideo whereEventId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventVideo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventVideo whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventVideo whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventVideo whereUpdatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventVideo whereVideo($value)
 *
 * @mixin \Eloquent
 */
class EventVideo extends Model
{
    use HasFactory;
    use LogsActivity;
    use SoftDeletes;

    // protected $connection = "mysql";

    // protected $dateFormat = "U";

    // protected $primaryKey = 'id';

    // public $incrementing = false;

    // public $timestamps = false;

    // protected $guarded = ['*'];

    // protected $hidden = ['id'];

    // protected $visible = ['id'];

    protected $table = 'event_videos';

    protected $casts = [
        'event_id' => 'integer',
        'video' => 'string',
        'is_active' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    protected $fillable = [
        'event_id',
        'video',
        'is_active',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName($this->table)
            ->logFillable()
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs()
            ->setDescriptionForEvent(fn (string $eventName) => "This model has been {$eventName} by :caevent.name");
    }

    public function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeInActive($query)
    {
        return $query->where('is_active', false);
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by_id', 'id');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by_id', 'id');
    }

    public function deletedBy()
    {
        return $this->belongsTo(User::class, 'deleted_by_id', 'id');
    }

    public function altVideo()
    {
        return trans('index.event')." - {$this->id} - ".env('APP_TITLE');
    }

    public function checkVideo()
    {
        if ($this->video && File::exists(public_path("videos/event/{$this->video}"))) {
            return true;
        }
    }

    public function assetVideo()
    {
        if ($this->checkVideo()) {
            return asset("videos/event/{$this->video}");
        }

        return asset('videos/video.mp4');
    }

    public function deleteVideo()
    {
        if ($this->checkVideo()) {
            File::delete(public_path("videos/event/{$this->video}"));
        }
    }

    public function getVideoUrlAttribute()
    {
        if ($this->checkVideo()) {
            return URL::to('/')."/videos/event/{$this->video}";
        }

        return null;
    }

    public $appends = ['video_url'];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
