<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
/**
 * App\FaqCategory
 *
 * @property int $id
 * @property string|null $category
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\FaqQuestion[] $faqQuestions
 * @property-read int|null $faq_questions_count
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FaqCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FaqCategory newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\FaqCategory onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FaqCategory query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FaqCategory whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FaqCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FaqCategory whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FaqCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FaqCategory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\FaqCategory withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\FaqCategory withoutTrashed()
 */
	class FaqCategory extends \Eloquent {}
}

namespace App{
/**
 * App\FaqQuestion
 *
 * @property int $id
 * @property string|null $question
 * @property string|null $answer
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int|null $category_id
 * @property-read \App\FaqCategory|null $category
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FaqQuestion newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FaqQuestion newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\FaqQuestion onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FaqQuestion query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FaqQuestion whereAnswer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FaqQuestion whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FaqQuestion whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FaqQuestion whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FaqQuestion whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FaqQuestion whereQuestion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FaqQuestion whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\FaqQuestion withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\FaqQuestion withoutTrashed()
 */
	class FaqQuestion extends \Eloquent {}
}

namespace App{
/**
 * App\Permission
 *
 * @property int $id
 * @property string|null $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Role[] $roles
 * @property-read int|null $roles_count
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Permission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Permission newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Permission onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Permission query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Permission whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Permission whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Permission whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Permission whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Permission whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Permission withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Permission withoutTrashed()
 */
	class Permission extends \Eloquent {}
}

namespace App{
/**
 * App\Product
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $description
 * @property float|null $price
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\ProductCategory[] $categories
 * @property-read int|null $categories_count
 * @property-read mixed $photo
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\MediaLibrary\Models\Media[] $media
 * @property-read int|null $media_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\ProductTag[] $tags
 * @property-read int|null $tags_count
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Product onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Product withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Product withoutTrashed()
 */
	class Product extends \Eloquent {}
}

namespace App{
/**
 * App\ProductCategory
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read mixed $photo
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\MediaLibrary\Models\Media[] $media
 * @property-read int|null $media_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Product[] $products
 * @property-read int|null $products_count
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductCategory newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\ProductCategory onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductCategory query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductCategory whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductCategory whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductCategory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ProductCategory withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\ProductCategory withoutTrashed()
 */
	class ProductCategory extends \Eloquent {}
}

namespace App{
/**
 * App\ProductTag
 *
 * @property int $id
 * @property string|null $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Product[] $products
 * @property-read int|null $products_count
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductTag newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductTag newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\ProductTag onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductTag query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductTag whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductTag whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductTag whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductTag whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductTag whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ProductTag withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\ProductTag withoutTrashed()
 */
	class ProductTag extends \Eloquent {}
}

namespace App{
/**
 * App\QaMessage
 *
 * @property int $id
 * @property int $topic_id
 * @property int $sender_id
 * @property string|null $read_at
 * @property string $content
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\User $sender
 * @property-read \App\QaTopic $topic
 * @method static \Illuminate\Database\Eloquent\Builder|\App\QaMessage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\QaMessage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\QaMessage query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\QaMessage whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\QaMessage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\QaMessage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\QaMessage whereReadAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\QaMessage whereSenderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\QaMessage whereTopicId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\QaMessage whereUpdatedAt($value)
 */
	class QaMessage extends \Eloquent {}
}

namespace App{
/**
 * App\QaTopic
 *
 * @property int $id
 * @property string $subject
 * @property int $creator_id
 * @property int $receiver_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\QaMessage[] $messages
 * @property-read int|null $messages_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\QaTopic newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\QaTopic newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\QaTopic query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\QaTopic whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\QaTopic whereCreatorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\QaTopic whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\QaTopic whereReceiverId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\QaTopic whereSubject($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\QaTopic whereUpdatedAt($value)
 */
	class QaTopic extends \Eloquent {}
}

namespace App{
/**
 * App\Role
 *
 * @property int $id
 * @property string|null $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $users
 * @property-read int|null $users_count
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Role onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Role withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Role withoutTrashed()
 */
	class Role extends \Eloquent {}
}

namespace App{
/**
 * App\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Passport\Client[] $clients
 * @property-read int|null $clients_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Role[] $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Passport\Token[] $tokens
 * @property-read int|null $tokens_count
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\User onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\User withoutTrashed()
 */
	class User extends \Eloquent {}
}

