<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * App\Models\DisplayContest
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \App\Models\User|null $createdBy
 * @property-read \App\Models\User|null $deletedBy
 * @property-read \App\Models\Pet|null $pet
 * @property-read \App\Models\User|null $updatedBy
 *
 * @method static \Illuminate\Database\Eloquent\Builder|DisplayContest active()
 * @method static \Illuminate\Database\Eloquent\Builder|DisplayContest inActive()
 * @method static \Illuminate\Database\Eloquent\Builder|DisplayContest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DisplayContest newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DisplayContest onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|DisplayContest query()
 * @method static \Illuminate\Database\Eloquent\Builder|DisplayContest withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|DisplayContest withoutTrashed()
 *
 * @mixin \Eloquent
 */
class DisplayContest extends Model
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

    protected $table = 'display_contents';

    protected $casts = [
        'owner_name' => 'string',
        'shop_name' => 'string',
        'shop_address' => 'string',
        'phone' => 'string',
        'telephone' => 'string',
        'email' => 'string',
        'theme_display' => 'string',
        'ktp' => 'string',
        'npwp' => 'string',
        'photo_1' => 'string',
        'photo_2' => 'string',
        'photo_3' => 'string',
        'is_active' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    protected $fillable = [
        'owner_name',
        'shop_name',
        'shop_address',
        'phone',
        'telephone',
        'email',
        'theme_display',
        'ktp',
        'npwp',
        'photo_1',
        'photo_2',
        'photo_3',
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

    public function pet()
    {
        return $this->belongsTo(Pet::class);
    }
}
