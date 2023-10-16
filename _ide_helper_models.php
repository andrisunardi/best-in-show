<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Banner
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \App\Models\User|null $createdBy
 * @property-read \App\Models\User|null $deletedBy
 * @property-read mixed $image_url
 * @property-read \App\Models\Pet|null $pet
 * @property-read \App\Models\User|null $updatedBy
 * @method static \Illuminate\Database\Eloquent\Builder|Banner active()
 * @method static \Illuminate\Database\Eloquent\Builder|Banner inActive()
 * @method static \Illuminate\Database\Eloquent\Builder|Banner newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Banner newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Banner onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Banner query()
 * @method static \Illuminate\Database\Eloquent\Builder|Banner withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Banner withoutTrashed()
 * @mixin \Eloquent
 * @property int $id
 * @property int|null $pet_id
 * @property string|null $image
 * @property bool|null $is_active
 * @property int|null $created_by_id
 * @property int|null $updated_by_id
 * @property int|null $deleted_by_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|Banner whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Banner whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Banner whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Banner whereDeletedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Banner whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Banner whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Banner whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Banner wherePetId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Banner whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Banner whereUpdatedById($value)
 */
	class Banner extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Contact
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \App\Models\User|null $createdBy
 * @property-read \App\Models\User|null $deletedBy
 * @property-read \App\Models\User|null $updatedBy
 * @method static \Illuminate\Database\Eloquent\Builder|Contact active()
 * @method static \Illuminate\Database\Eloquent\Builder|Contact inActive()
 * @method static \Illuminate\Database\Eloquent\Builder|Contact newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Contact newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Contact onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Contact query()
 * @method static \Illuminate\Database\Eloquent\Builder|Contact withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Contact withoutTrashed()
 * @mixin \Eloquent
 * @property int $id
 * @property string|null $category
 * @property string|null $message
 * @property string|null $attachment
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $email
 * @property string|null $address
 * @property string|null $city
 * @property string|null $province
 * @property string|null $postal_code
 * @property string|null $platform
 * @property string|null $phone_country
 * @property string|null $phone
 * @property bool|null $is_active
 * @property int|null $created_by_id
 * @property int|null $updated_by_id
 * @property int|null $deleted_by_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereAttachment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereDeletedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact wherePhoneCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact wherePlatform($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact wherePostalCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereProvince($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereUpdatedById($value)
 */
	class Contact extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\DisplayContest
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \App\Models\User|null $createdBy
 * @property-read \App\Models\User|null $deletedBy
 * @property-read \App\Models\Pet|null $pet
 * @property-read \App\Models\User|null $updatedBy
 * @method static \Illuminate\Database\Eloquent\Builder|DisplayContest active()
 * @method static \Illuminate\Database\Eloquent\Builder|DisplayContest inActive()
 * @method static \Illuminate\Database\Eloquent\Builder|DisplayContest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DisplayContest newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DisplayContest onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|DisplayContest query()
 * @method static \Illuminate\Database\Eloquent\Builder|DisplayContest withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|DisplayContest withoutTrashed()
 * @mixin \Eloquent
 */
	class DisplayContest extends \Eloquent {}
}

namespace App\Models{
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
 * @method static \Illuminate\Database\Eloquent\Builder|Event active()
 * @method static \Illuminate\Database\Eloquent\Builder|Event inActive()
 * @method static \Illuminate\Database\Eloquent\Builder|Event newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Event newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Event onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Event query()
 * @method static \Illuminate\Database\Eloquent\Builder|Event withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Event withoutTrashed()
 * @mixin \Eloquent
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
 */
	class Event extends \Eloquent {}
}

namespace App\Models{
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
 * @method static \Illuminate\Database\Eloquent\Builder|EventImage active()
 * @method static \Illuminate\Database\Eloquent\Builder|EventImage inActive()
 * @method static \Illuminate\Database\Eloquent\Builder|EventImage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EventImage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EventImage onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|EventImage query()
 * @method static \Illuminate\Database\Eloquent\Builder|EventImage withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|EventImage withoutTrashed()
 * @mixin \Eloquent
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
 */
	class EventImage extends \Eloquent {}
}

namespace App\Models{
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
 * @method static \Illuminate\Database\Eloquent\Builder|EventVideo active()
 * @method static \Illuminate\Database\Eloquent\Builder|EventVideo inActive()
 * @method static \Illuminate\Database\Eloquent\Builder|EventVideo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EventVideo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EventVideo onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|EventVideo query()
 * @method static \Illuminate\Database\Eloquent\Builder|EventVideo withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|EventVideo withoutTrashed()
 * @mixin \Eloquent
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
 */
	class EventVideo extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Faq
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \App\Models\User|null $createdBy
 * @property-read \App\Models\User|null $deletedBy
 * @property-read \App\Models\User|null $updatedBy
 * @method static \Illuminate\Database\Eloquent\Builder|Faq active()
 * @method static \Illuminate\Database\Eloquent\Builder|Faq inActive()
 * @method static \Illuminate\Database\Eloquent\Builder|Faq newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Faq newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Faq onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Faq query()
 * @method static \Illuminate\Database\Eloquent\Builder|Faq withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Faq withoutTrashed()
 * @mixin \Eloquent
 * @property int $id
 * @property string|null $question
 * @property string|null $question_idn
 * @property string|null $answer
 * @property string|null $answer_idn
 * @property bool|null $is_active
 * @property int|null $created_by_id
 * @property int|null $updated_by_id
 * @property int|null $deleted_by_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|Faq whereAnswer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faq whereAnswerIdn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faq whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faq whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faq whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faq whereDeletedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faq whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faq whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faq whereQuestion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faq whereQuestionIdn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faq whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faq whereUpdatedById($value)
 */
	class Faq extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\OnlineShop
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \App\Models\User|null $createdBy
 * @property-read \App\Models\User|null $deletedBy
 * @property-read \App\Models\User|null $updatedBy
 * @method static \Illuminate\Database\Eloquent\Builder|OnlineShop active()
 * @method static \Illuminate\Database\Eloquent\Builder|OnlineShop inActive()
 * @method static \Illuminate\Database\Eloquent\Builder|OnlineShop newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OnlineShop newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OnlineShop onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|OnlineShop query()
 * @method static \Illuminate\Database\Eloquent\Builder|OnlineShop withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|OnlineShop withoutTrashed()
 * @mixin \Eloquent
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
 */
	class OnlineShop extends \Eloquent {}
}

namespace App\Models{
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
 * @method static \Illuminate\Database\Eloquent\Builder|Pet active()
 * @method static \Illuminate\Database\Eloquent\Builder|Pet inActive()
 * @method static \Illuminate\Database\Eloquent\Builder|Pet newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pet newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pet onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Pet query()
 * @method static \Illuminate\Database\Eloquent\Builder|Pet withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Pet withoutTrashed()
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ProductType> $productTypes
 * @property-read int|null $product_types_count
 * @mixin \Eloquent
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
 */
	class Pet extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PetShop
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \App\Models\User|null $createdBy
 * @property-read \App\Models\User|null $deletedBy
 * @property-read \App\Models\User|null $updatedBy
 * @method static \Illuminate\Database\Eloquent\Builder|PetShop active()
 * @method static \Illuminate\Database\Eloquent\Builder|PetShop inActive()
 * @method static \Illuminate\Database\Eloquent\Builder|PetShop newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PetShop newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PetShop onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|PetShop query()
 * @method static \Illuminate\Database\Eloquent\Builder|PetShop withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|PetShop withoutTrashed()
 * @mixin \Eloquent
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
 */
	class PetShop extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Product
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \App\Models\User|null $createdBy
 * @property-read \App\Models\User|null $deletedBy
 * @property-read mixed $image_url
 * @property-read \App\Models\Pet|null $pet
 * @property-read \App\Models\ProductCategory|null $productCategory
 * @property-read \App\Models\ProductType|null $productType
 * @property-read \App\Models\User|null $updatedBy
 * @method static \Illuminate\Database\Eloquent\Builder|Product active()
 * @method static \Illuminate\Database\Eloquent\Builder|Product inActive()
 * @method static \Illuminate\Database\Eloquent\Builder|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|Product withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Product withoutTrashed()
 * @mixin \Eloquent
 * @property int $id
 * @property int|null $pet_id
 * @property int|null $product_type_id
 * @property int|null $product_category_id
 * @property string|null $name
 * @property string|null $name_idn
 * @property string|null $description
 * @property string|null $description_idn
 * @property string|null $variant
 * @property string|null $variant_idn
 * @property string|null $size
 * @property string|null $weight
 * @property string|null $color
 * @property string|null $image
 * @property string|null $slug
 * @property bool|null $is_active
 * @property int|null $created_by_id
 * @property int|null $updated_by_id
 * @property int|null $deleted_by_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereDeletedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereDescriptionIdn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereNameIdn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePetId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereProductCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereProductTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereUpdatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereVariant($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereVariantIdn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereWeight($value)
 */
	class Product extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ProductCategory
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \App\Models\User|null $createdBy
 * @property-read \App\Models\User|null $deletedBy
 * @property-read mixed $image_url
 * @property-read \App\Models\Pet|null $pet
 * @property-read \App\Models\ProductType|null $productType
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Product> $productWeights
 * @property-read int|null $product_weights_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Product> $products
 * @property-read int|null $products_count
 * @property-read \App\Models\User|null $updatedBy
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory active()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory inActive()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory withoutTrashed()
 * @mixin \Eloquent
 * @property int $id
 * @property int|null $pet_id
 * @property int|null $product_type_id
 * @property string|null $name
 * @property string|null $name_idn
 * @property string|null $image
 * @property string|null $slug
 * @property bool|null $is_active
 * @property int|null $created_by_id
 * @property int|null $updated_by_id
 * @property int|null $deleted_by_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory whereDeletedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory whereNameIdn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory wherePetId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory whereProductTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory whereUpdatedById($value)
 */
	class ProductCategory extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ProductType
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \App\Models\User|null $createdBy
 * @property-read \App\Models\User|null $deletedBy
 * @property-read mixed $image_url
 * @property-read \App\Models\Pet|null $pet
 * @property-read \App\Models\ProductCategory|null $productCategories
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Product> $productCategoryGroupByName
 * @property-read int|null $product_category_group_by_name_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Product> $products
 * @property-read int|null $products_count
 * @property-read \App\Models\User|null $updatedBy
 * @method static \Illuminate\Database\Eloquent\Builder|ProductType active()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductType inActive()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductType onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductType query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductType withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductType withoutTrashed()
 * @mixin \Eloquent
 * @property int $id
 * @property int|null $pet_id
 * @property string|null $name
 * @property string|null $name_idn
 * @property string|null $image
 * @property string|null $slug
 * @property bool|null $is_active
 * @property int|null $created_by_id
 * @property int|null $updated_by_id
 * @property int|null $deleted_by_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|ProductType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductType whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductType whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductType whereDeletedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductType whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductType whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductType whereNameIdn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductType wherePetId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductType whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductType whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductType whereUpdatedById($value)
 */
	class ProductType extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Promotion
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \App\Models\User|null $createdBy
 * @property-read \App\Models\User|null $deletedBy
 * @property-read mixed $image_url
 * @property-read \App\Models\User|null $updatedBy
 * @method static \Illuminate\Database\Eloquent\Builder|Promotion active()
 * @method static \Illuminate\Database\Eloquent\Builder|Promotion inActive()
 * @method static \Illuminate\Database\Eloquent\Builder|Promotion newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Promotion newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Promotion onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Promotion query()
 * @method static \Illuminate\Database\Eloquent\Builder|Promotion withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Promotion withoutTrashed()
 * @mixin \Eloquent
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
 */
	class Promotion extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Setting
 *
 * @property int $id
 * @property string|null $key
 * @property string|null $value
 * @property bool|null $is_active
 * @property int|null $created_by_id
 * @property int|null $updated_by_id
 * @property int|null $deleted_by_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \App\Models\User|null $createdBy
 * @property-read \App\Models\User|null $deletedBy
 * @property-read \App\Models\User|null $updatedBy
 * @method static \Illuminate\Database\Eloquent\Builder|Setting active()
 * @method static \Database\Factories\SettingFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Setting inActive()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting query()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereDeletedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereUpdatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting withoutTrashed()
 * @mixin \Eloquent
 */
	class Setting extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\SignUp
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \App\Models\User $createdBy
 * @property-read \App\Models\User $deletedBy
 * @property-read \App\Models\User $updatedBy
 * @method static \Illuminate\Database\Eloquent\Builder|SignUp active()
 * @method static \Illuminate\Database\Eloquent\Builder|SignUp inActive()
 * @method static \Illuminate\Database\Eloquent\Builder|SignUp newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SignUp newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SignUp onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|SignUp query()
 * @method static \Illuminate\Database\Eloquent\Builder|SignUp withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|SignUp withoutTrashed()
 * @mixin \Eloquent
 * @property int $id
 * @property string|null $email
 * @property bool|null $is_active
 * @property int|null $created_by_id
 * @property int|null $updated_by_id
 * @property int|null $deleted_by_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|SignUp whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SignUp whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SignUp whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SignUp whereDeletedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SignUp whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SignUp whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SignUp whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SignUp whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SignUp whereUpdatedById($value)
 */
	class SignUp extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Slider
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \App\Models\User $createdBy
 * @property-read \App\Models\User $deletedBy
 * @property-read mixed $image_url
 * @property-read \App\Models\User $updatedBy
 * @method static \Illuminate\Database\Eloquent\Builder|Slider active()
 * @method static \Illuminate\Database\Eloquent\Builder|Slider inActive()
 * @method static \Illuminate\Database\Eloquent\Builder|Slider newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Slider newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Slider onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Slider query()
 * @method static \Illuminate\Database\Eloquent\Builder|Slider withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Slider withoutTrashed()
 * @mixin \Eloquent
 * @property int $id
 * @property string|null $image
 * @property bool|null $is_active
 * @property int|null $created_by_id
 * @property int|null $updated_by_id
 * @property int|null $deleted_by_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereDeletedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereUpdatedById($value)
 */
	class Slider extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Store
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \App\Models\User $createdBy
 * @property-read \App\Models\User $deletedBy
 * @property-read \App\Models\User $updatedBy
 * @method static \Illuminate\Database\Eloquent\Builder|Store active()
 * @method static \Illuminate\Database\Eloquent\Builder|Store inActive()
 * @method static \Illuminate\Database\Eloquent\Builder|Store newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Store newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Store onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Store query()
 * @method static \Illuminate\Database\Eloquent\Builder|Store withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Store withoutTrashed()
 * @mixin \Eloquent
 * @property int $id
 * @property string|null $category
 * @property string|null $name
 * @property string|null $address
 * @property string|null $google_maps_iframe
 * @property string|null $google_maps
 * @property bool|null $is_active
 * @property int|null $created_by_id
 * @property int|null $updated_by_id
 * @property int|null $deleted_by_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|Store whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Store whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Store whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Store whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Store whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Store whereDeletedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Store whereGoogleMaps($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Store whereGoogleMapsIframe($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Store whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Store whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Store whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Store whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Store whereUpdatedById($value)
 */
	class Store extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\SubProduct
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \App\Models\User $createdBy
 * @property-read \App\Models\User $deletedBy
 * @property-read \App\Models\User $updatedBy
 * @method static \Illuminate\Database\Eloquent\Builder|SubProduct active()
 * @method static \Illuminate\Database\Eloquent\Builder|SubProduct inActive()
 * @method static \Illuminate\Database\Eloquent\Builder|SubProduct newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SubProduct newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SubProduct onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|SubProduct query()
 * @method static \Illuminate\Database\Eloquent\Builder|SubProduct withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|SubProduct withoutTrashed()
 * @mixin \Eloquent
 */
	class SubProduct extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $email
 * @property string|null $phone
 * @property string|null $username
 * @property string|null $password
 * @property string|null $image
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property \Illuminate\Support\Carbon|null $phone_verified_at
 * @property int|null $is_active
 * @property int|null $created_by_id
 * @property int|null $updated_by_id
 * @property int|null $deleted_by_id
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read User|null $createdBy
 * @property-read User|null $deletedBy
 * @property-read mixed $image_url
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Role> $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @property-read User|null $updatedBy
 * @method static \Illuminate\Database\Eloquent\Builder|User active()
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User inActive()
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|User permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDeletedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhoneVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUsername($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|User withoutTrashed()
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Permission> $permissions
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Role> $roles
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @mixin \Eloquent
 */
	class User extends \Eloquent {}
}

