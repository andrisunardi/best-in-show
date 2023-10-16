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
 * App\Models\Pet
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Banner> $banners
 * @property-read int|null $banners_count
 * @property-read \App\Models\User|null $createdBy
 * @property-read \App\Models\User|null $deletedBy
 * @property-read mixed $image_url
 * @property-read mixed $translate_name
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ProductCategory> $productCategories
 * @property-read int|null $product_categories_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Product> $products
 * @property-read int|null $products_count
 * @property-read \App\Models\User|null $updatedBy
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Pet active()
 * @method static \Illuminate\Database\Eloquent\Builder|Pet inActive()
 * @method static \Illuminate\Database\Eloquent\Builder|Pet newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pet newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pet onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Pet query()
 * @method static \Illuminate\Database\Eloquent\Builder|Pet withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Pet withoutTrashed()
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ProductType> $productTypes
 * @property-read int|null $product_types_count
 * @property int $id
 * @property int|null $name
 * @property int|null $name_idn
 * @property int|null $product_image
 * @property string|null $youtube
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
 * @method static \Illuminate\Database\Eloquent\Builder|Pet whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pet whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pet whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pet whereDeletedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pet whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pet whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pet whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pet whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pet whereNameIdn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pet whereProductImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pet whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pet whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pet whereUpdatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pet whereYoutube($value)
 *
 * @mixin \Eloquent
 */
class Pet extends Model
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

    protected $table = 'pets';

    protected $casts = [
        'name' => 'integer',
        'name_idn' => 'integer',
        'product_image' => 'integer',
        'youtube' => 'string',
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
        'product_image',
        'youtube',
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

    public function getTranslateNameAttribute()
    {
        return App::isLocale('en') ? $this->title : $this->title_idn;
    }

    public function altImage()
    {
        return trans('index.banner')." - {$this->id} - ".env('APP_TITLE');
    }

    public function checkImage()
    {
        if ($this->image && File::exists(public_path("images/banner/{$this->image}"))) {
            return true;
        }
    }

    public function assetImage()
    {
        if ($this->checkImage()) {
            return asset("images/banner/{$this->image}");
        }

        return asset('images/banner.png');
    }

    public function deleteImage()
    {
        if ($this->checkImage()) {
            File::delete(public_path("images/banner/{$this->image}"));
        }
    }

    public function getImageUrlAttribute()
    {
        if ($this->checkImage()) {
            return URL::to('/')."/images/banner/{$this->image}";
        }

        return null;
    }

    public $appends = ['image_url'];

    public function productTypes()
    {
        return $this->hasMany(ProductType::class);
    }

    public function productCategories()
    {
        return $this->hasMany(ProductCategory::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function banners()
    {
        return $this->hasMany(Banner::class);
    }
}
