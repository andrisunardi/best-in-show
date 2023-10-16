<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * App\Models\OnlineShop
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \App\Models\User|null $createdBy
 * @property-read \App\Models\User|null $deletedBy
 * @property-read \App\Models\User|null $updatedBy
 *
 * @method static \Illuminate\Database\Eloquent\Builder|OnlineShop active()
 * @method static \Illuminate\Database\Eloquent\Builder|OnlineShop inActive()
 * @method static \Illuminate\Database\Eloquent\Builder|OnlineShop newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OnlineShop newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OnlineShop onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|OnlineShop query()
 * @method static \Illuminate\Database\Eloquent\Builder|OnlineShop withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|OnlineShop withoutTrashed()
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $gender
 * @property string|null $address
 * @property string|null $phone
 * @property bool|null $email
 * @property bool|null $message
 * @property bool|null $is_active
 * @property int|null $created_by_id
 * @property int|null $updated_by_id
 * @property int|null $deleted_by_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 *
 * @method static \Illuminate\Database\Eloquent\Builder|OnlineShop whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OnlineShop whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OnlineShop whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OnlineShop whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OnlineShop whereDeletedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OnlineShop whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OnlineShop whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OnlineShop whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OnlineShop whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OnlineShop whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OnlineShop whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OnlineShop wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OnlineShop whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OnlineShop whereUpdatedById($value)
 *
 * @mixin \Eloquent
 */
class OnlineShop extends Model
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

    protected $table = 'online_shops';

    protected $casts = [
        'name' => 'string',
        'gender' => 'string',
        'address' => 'string',
        'phone' => 'string',
        'email' => 'boolean',
        'message' => 'boolean',
        'is_active' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    protected $fillable = [
        'name',
        'gender',
        'address',
        'phone',
        'email',
        'message',
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
}
