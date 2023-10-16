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
 * App\Models\EventImage
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \App\Models\User|null $createdBy
 * @property-read \App\Models\User|null $deletedBy
 * @property-read \App\Models\Event|null $event
 * @property-read mixed $image_url
 * @property-read \App\Models\User|null $updatedBy
 *
 * @method static \Illuminate\Database\Eloquent\Builder|EventImage active()
 * @method static \Illuminate\Database\Eloquent\Builder|EventImage inActive()
 * @method static \Illuminate\Database\Eloquent\Builder|EventImage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EventImage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EventImage onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|EventImage query()
 * @method static \Illuminate\Database\Eloquent\Builder|EventImage withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|EventImage withoutTrashed()
 *
 * @property int $id
 * @property int|null $event_id
 * @property string|null $image
 * @property bool|null $is_active
 * @property int|null $created_by_id
 * @property int|null $updated_by_id
 * @property int|null $deleted_by_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 *
 * @method static \Illuminate\Database\Eloquent\Builder|EventImage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventImage whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventImage whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventImage whereDeletedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventImage whereEventId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventImage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventImage whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventImage whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventImage whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventImage whereUpdatedById($value)
 *
 * @mixin \Eloquent
 */
class EventImage extends Model
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

    protected $table = 'event_images';

    protected $casts = [
        'event_id' => 'integer',
        'image' => 'string',
        'is_active' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    protected $fillable = [
        'event_id',
        'image',
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

        return asset('images/event.png');
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

    public $appends = ['image_url'];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
