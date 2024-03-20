<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * App\Models\Event
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \App\Models\User|null $createdBy
 * @property-read \App\Models\User|null $deletedBy
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\EventImage> $eventImages
 * @property-read int|null $event_images_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\EventVideo> $eventVideos
 * @property-read int|null $event_videos_count
 * @property-read mixed $image_url
 * @property-read \App\Models\User|null $updatedBy
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Event active()
 * @method static \Illuminate\Database\Eloquent\Builder|Event inActive()
 * @method static \Illuminate\Database\Eloquent\Builder|Event newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Event newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Event onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Event query()
 * @method static \Illuminate\Database\Eloquent\Builder|Event withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Event withoutTrashed()
 *
 * @property int $id
 * @property int|null $name
 * @property string|null $name_idn
 * @property string|null $description
 * @property string|null $description_idn
 * @property \Illuminate\Support\Carbon|null $date
 * @property string|null $image
 * @property string|null $video
 * @property string|null $slug
 * @property bool|null $is_active
 * @property int|null $created_by_id
 * @property int|null $updated_by_id
 * @property int|null $deleted_by_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereDeletedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereDescriptionIdn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereNameIdn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereUpdatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereVideo($value)
 *
 * @property-read mixed $translate_description
 * @property-read mixed $translate_name
 * @property string|null $location
 * @property-read mixed $video_url
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereLocation($value)
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\EventImage> $images
 * @property-read int|null $images_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\EventVideo> $videos
 * @property-read int|null $videos_count
 *
 * @mixin \Eloquent
 */
class Event extends Model
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

    protected $table = 'events';

    protected $casts = [
        'name' => 'string',
        'name_idn' => 'string',
        'description' => 'string',
        'description_idn' => 'string',
        'date' => 'date',
        'location' => 'string',
        'image' => 'string',
        'video' => 'string',
        'slug' => 'string',
        'is_active' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    protected $fillable = [
        'name',
        'name_idn',
        'description',
        'description_idn',
        'date',
        'location',
        'image',
        'video',
        'slug',
        'is_active',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName($this->table)
            ->logFillable()
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs()
            ->setDescriptionForEvent(fn (string $eventName) => "This model has been {$eventName} by :causer.name");
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

    public function altImage()
    {
        return trans('index.event')." - {$this->id} - ".env('APP_TITLE');
    }

    public function checkImage()
    {
        if ($this->image && File::exists(public_path("images/event/{$this->image}"))) {
            return true;
        }
    }

    public function assetImage()
    {
        if ($this->checkImage()) {
            return asset("images/event/{$this->image}");
        }

        return asset('images/image-not-available.png');
    }

    public function deleteImage()
    {
        if ($this->checkImage()) {
            File::delete(public_path("images/event/{$this->image}"));
        }
    }

    public function getImageUrlAttribute()
    {
        if ($this->checkImage()) {
            return URL::to('/')."/images/event/{$this->image}";
        }

        return null;
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

        return asset('videos/video-not-available.png');
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

    public $appends = ['image_url', 'video_url'];

    public function images()
    {
        return $this->hasMany(EventImage::class, 'event_id');
    }

    public function videos()
    {
        return $this->hasMany(EventVideo::class, 'event_id');
    }

    public function getTranslateNameAttribute()
    {
        return App::isLocale('en') ? $this->name : $this->name_idn;
    }

    public function getTranslateDescriptionAttribute()
    {
        return App::isLocale('en') ? $this->description : $this->description_idn;
    }
}
