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
 * App\Models\BlogCategory
 *
 * @property int $id
 * @property int $parent_id
 * @property string $slug
 * @property string $title
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|BlogCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BlogCategory newQuery()
 * @method static \Illuminate\Database\Query\Builder|BlogCategory onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|BlogCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|BlogCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogCategory whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogCategory whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogCategory whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogCategory whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogCategory whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogCategory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|BlogCategory withTrashed()
 * @method static \Illuminate\Database\Query\Builder|BlogCategory withoutTrashed()
 */
	class BlogCategory extends \Eloquent {}
}

namespace App\Models{
/**
 * Class BlogPost
 *
 * @package App\Models
 * @property \App\Models\BlogCategory $category
 * @property \App\Models\User $user
 * @property int $id
 * @property int $category_id
 * @property int $user_id
 * @property string $slug
 * @property string $title
 * @property string|null $excert
 * @property string $content_raw
 * @property string $content_html
 * @property int $is_published
 * @property string|null $published_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property string|null $img
 * @property int $view_count
 * @property string|null $meta_description
 * @property string|null $meta_keywords
 * @method static \Illuminate\Database\Eloquent\Builder|BlogPost newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BlogPost newQuery()
 * @method static \Illuminate\Database\Query\Builder|BlogPost onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|BlogPost query()
 * @method static \Illuminate\Database\Eloquent\Builder|BlogPost whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogPost whereContentHtml($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogPost whereContentRaw($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogPost whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogPost whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogPost whereExcert($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogPost whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogPost whereImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogPost whereIsPublished($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogPost whereMetaDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogPost whereMetaKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogPost wherePublishedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogPost whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogPost whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogPost whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogPost whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogPost whereViewCount($value)
 * @method static \Illuminate\Database\Query\Builder|BlogPost withTrashed()
 * @method static \Illuminate\Database\Query\Builder|BlogPost withoutTrashed()
 */
	class BlogPost extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\City
 *
 * @property int $id
 * @property string $name
 * @property string $name_for_display
 * @property string $slug
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $meta_description
 * @property string|null $meta_keywords
 * @property string|null $seo_title
 * @property int $is_for_company
 * @property-read mixed $organizations_count
 * @property-read mixed $taxi_count
 * @method static \Illuminate\Database\Eloquent\Builder|City newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|City newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|City query()
 * @method static \Illuminate\Database\Eloquent\Builder|City whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereIsForCompany($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereMetaDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereMetaKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereNameForDisplay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereSeoTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereUpdatedAt($value)
 */
	class City extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Contact
 *
 * @package App\Models
 * @var string name
 * @var string email
 * @var string message
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $message
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Contact newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Contact newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Contact query()
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereUpdatedAt($value)
 */
	class Contact extends \Eloquent {}
}

namespace App\Models{
/**
 * Class BlogPost
 *
 * @package App\Models
 * @property \App\Models\Organization $organization
 * @property \App\Models\User $user
 * @property \App\Models\City $city
 * @property int $id
 * @property int $category_id
 * @property int $user_id
 * @property string $slug
 * @property string $title
 * @property int $is_published
 * @property string|null $published_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property string|null $content_html
 * @property string $content_raw
 * @property string|null $img
 * @property float|null $mark_x
 * @property float|null $mark_y
 * @property string|null $address
 * @property string|null $phone
 * @property int|null $city_id
 * @property-read \App\Models\OrganizationCategory $category
 * @property-read string $link
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\OrganizationReview[] $reviews
 * @property-read int|null $reviews_count
 * @method static \Illuminate\Database\Eloquent\Builder|Organization newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Organization newQuery()
 * @method static \Illuminate\Database\Query\Builder|Organization onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Organization query()
 * @method static \Illuminate\Database\Eloquent\Builder|Organization whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Organization whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Organization whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Organization whereContentHtml($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Organization whereContentRaw($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Organization whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Organization whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Organization whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Organization whereImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Organization whereIsPublished($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Organization whereMarkX($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Organization whereMarkY($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Organization wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Organization wherePublishedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Organization whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Organization whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Organization whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Organization whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|Organization withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Organization withoutTrashed()
 */
	class Organization extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\OrganizationCategory
 *
 * @property int $id
 * @property int $parent_id
 * @property string $slug
 * @property string $title
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|OrganizationCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrganizationCategory newQuery()
 * @method static \Illuminate\Database\Query\Builder|OrganizationCategory onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|OrganizationCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|OrganizationCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganizationCategory whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganizationCategory whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganizationCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganizationCategory whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganizationCategory whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganizationCategory whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganizationCategory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|OrganizationCategory withTrashed()
 * @method static \Illuminate\Database\Query\Builder|OrganizationCategory withoutTrashed()
 */
	class OrganizationCategory extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\OrganizationReview
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $message
 * @property int|null $rating
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $organization_id
 * @property-read \App\Models\Organization|null $organization
 * @method static \Illuminate\Database\Eloquent\Builder|OrganizationReview newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrganizationReview newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrganizationReview query()
 * @method static \Illuminate\Database\Eloquent\Builder|OrganizationReview whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganizationReview whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganizationReview whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganizationReview whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganizationReview whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganizationReview whereOrganizationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganizationReview whereRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganizationReview whereUpdatedAt($value)
 */
	class OrganizationReview extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Review
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $message
 * @property int $taxi_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Taxi $taxi
 * @method static \Illuminate\Database\Eloquent\Builder|Review newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Review newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Review query()
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereTaxiId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereUpdatedAt($value)
 */
	class Review extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Role
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role query()
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereUpdatedAt($value)
 */
	class Role extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Taxi
 *
 * @property int $id
 * @property string $phone_number
 * @property string $title
 * @property string $description
 * @property float $mark_x
 * @property float $mark_y
 * @property int $city_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $meta_description
 * @property string|null $meta_keywords
 * @property-read \App\Models\City $city
 * @property-read string $link
 * @property-read mixed $phone_numbers
 * @method static \Illuminate\Database\Eloquent\Builder|Taxi newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Taxi newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Taxi query()
 * @method static \Illuminate\Database\Eloquent\Builder|Taxi whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Taxi whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Taxi whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Taxi whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Taxi whereMarkX($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Taxi whereMarkY($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Taxi whereMetaDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Taxi whereMetaKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Taxi wherePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Taxi whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Taxi whereUpdatedAt($value)
 */
	class Taxi extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\UserRole
 *
 * @property int $id
 * @property int $role_id
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|UserRole newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserRole newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserRole query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserRole whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserRole whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserRole whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserRole whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserRole whereUserId($value)
 */
	class UserRole extends \Eloquent {}
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
 * @property-read mixed $is_admin
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

