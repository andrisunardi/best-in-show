<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * App\Models\PetShop
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \App\Models\User|null $createdBy
 * @property-read \App\Models\User|null $deletedBy
 * @property-read \App\Models\User|null $updatedBy
 *
 * @method static \Illuminate\Database\Eloquent\Builder|PetShop active()
 * @method static \Illuminate\Database\Eloquent\Builder|PetShop inActive()
 * @method static \Illuminate\Database\Eloquent\Builder|PetShop newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PetShop newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PetShop onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|PetShop query()
 * @method static \Illuminate\Database\Eloquent\Builder|PetShop withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|PetShop withoutTrashed()
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $gender
 * @property string|null $address
 * @property string|null $phone
 * @property string|null $email
 * @property string|null $message
 * @property bool|null $is_active
 * @property int|null $created_by_id
 * @property int|null $updated_by_id
 * @property int|null $deleted_by_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 *
 * @method static \Illuminate\Database\Eloquent\Builder|PetShop whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PetShop whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PetShop whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PetShop whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PetShop whereDeletedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PetShop whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PetShop whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PetShop whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PetShop whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PetShop whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PetShop whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PetShop wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PetShop whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PetShop whereUpdatedById($value)
 *
 * @mixin \Eloquent
 */
class PetShop extends Model
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

    protected $table = 'pet_shops';

    protected $casts = [
        'name' => 'string',
        'gender' => 'string',
        'address' => 'string',
        'phone' => 'string',
        'email' => 'string',
        'message' => 'string',
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
