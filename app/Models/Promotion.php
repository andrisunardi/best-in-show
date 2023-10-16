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
 * App\Models\Promotion
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \App\Models\User|null $createdBy
 * @property-read \App\Models\User|null $deletedBy
 * @property-read mixed $image_url
 * @property-read \App\Models\User|null $updatedBy
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Promotion active()
 * @method static \Illuminate\Database\Eloquent\Builder|Promotion inActive()
 * @method static \Illuminate\Database\Eloquent\Builder|Promotion newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Promotion newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Promotion onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Promotion query()
 * @method static \Illuminate\Database\Eloquent\Builder|Promotion withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Promotion withoutTrashed()
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $name_idn
 * @property string|null $description
 * @property string|null $description_idn
 * @property \Illuminate\Support\Carbon|null $date
 * @property string|null $image
 * @property string|null $slug
 * @property bool|null $is_active
 * @property int|null $created_by_id
 * @property int|null $updated_by_id
 * @property int|null $deleted_by_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Promotion whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promotion whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promotion whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promotion whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promotion whereDeletedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promotion whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promotion whereDescriptionIdn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promotion whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promotion whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promotion whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promotion whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promotion whereNameIdn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promotion whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promotion whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promotion whereUpdatedById($value)
 *
 * @mixin \Eloquent
 */
class Promotion extends Model
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

    protected $table = 'promotions';

    protected $casts = [
        'name' => 'string',
        'name_idn' => 'string',
        'description' => 'string',
        'description_idn' => 'string',
        'date' => 'date',
        'image' => 'string',
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
        'image',
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
        return trans('index.promotion')." - {$this->id} - ".env('APP_TITLE');
    }

    public function checkImage()
    {
        if ($this->image && File::exists(public_path("images/promotion/{$this->image}"))) {
            return true;
        }
    }

    public function assetImage()
    {
        if ($this->checkImage()) {
            return asset("images/promotion/{$this->image}");
        }

        return asset('images/promotion.png');
    }

    public function deleteImage()
    {
        if ($this->checkImage()) {
            File::delete(public_path("images/promotion/{$this->image}"));
        }
    }

    public function getImageUrlAttribute()
    {
        if ($this->checkImage()) {
            return URL::to('/')."/images/promotion/{$this->image}";
        }

        return null;
    }

    public $appends = ['image_url'];
}
