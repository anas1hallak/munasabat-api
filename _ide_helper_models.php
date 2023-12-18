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
 * App\Models\admin
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|admin newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|admin newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|admin query()
 * @method static \Illuminate\Database\Eloquent\Builder|admin whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|admin whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|admin whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|admin whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|admin wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|admin whereUpdatedAt($value)
 */
	class admin extends \Eloquent implements \PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject {}
}

namespace App\Models{
/**
 * App\Models\booking
 *
 * @property int $id
 * @property int $users_id
 * @property int $halls_id
 * @property int $rooms_id
 * @property string $user_name
 * @property string $hall_name
 * @property string $room_name
 * @property string $event_type
 * @property string $date
 * @property string $time
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\service> $services
 * @property-read int|null $services_count
 * @method static \Illuminate\Database\Eloquent\Builder|booking newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|booking newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|booking query()
 * @method static \Illuminate\Database\Eloquent\Builder|booking whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|booking whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|booking whereEventType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|booking whereHallName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|booking whereHallsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|booking whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|booking whereRoomName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|booking whereRoomsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|booking whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|booking whereTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|booking whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|booking whereUserName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|booking whereUsersId($value)
 */
	class booking extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\day
 *
 * @property int $id
 * @property int $rooms_id
 * @property string $day
 * @property string $open_time
 * @property string $close_time
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|day newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|day newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|day query()
 * @method static \Illuminate\Database\Eloquent\Builder|day whereCloseTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|day whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|day whereDay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|day whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|day whereOpenTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|day whereRoomsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|day whereUpdatedAt($value)
 */
	class day extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\events
 *
 * @property int $id
 * @property int $halls_id
 * @property string $event
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\halls|null $halls
 * @method static \Illuminate\Database\Eloquent\Builder|events newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|events newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|events query()
 * @method static \Illuminate\Database\Eloquent\Builder|events whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|events whereEvent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|events whereHallsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|events whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|events whereUpdatedAt($value)
 */
	class events extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\halls
 *
 * @property int $id
 * @property string $name
 * @property string|null $mobile1
 * @property string|null $mobile2
 * @property string|null $mobile3
 * @property string|null $phone
 * @property string|null $social_email
 * @property string|null $address
 * @property string $email
 * @property string $password
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\events> $events
 * @property-read int|null $events_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\image> $image
 * @property-read int|null $image_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\rooms> $room
 * @property-read int|null $room_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\service> $services
 * @property-read int|null $services_count
 * @method static \Illuminate\Database\Eloquent\Builder|halls newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|halls newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|halls query()
 * @method static \Illuminate\Database\Eloquent\Builder|halls whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|halls whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|halls whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|halls whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|halls whereMobile1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|halls whereMobile2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|halls whereMobile3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|halls whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|halls wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|halls wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|halls whereSocialEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|halls whereUpdatedAt($value)
 */
	class halls extends \Eloquent implements \PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject {}
}

namespace App\Models{
/**
 * App\Models\image
 *
 * @property int $id
 * @property int $halls_id
 * @property string $image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|image newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|image newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|image query()
 * @method static \Illuminate\Database\Eloquent\Builder|image whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|image whereHallsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|image whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|image whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|image whereUpdatedAt($value)
 */
	class image extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\rooms
 *
 * @property int $id
 * @property int $halls_id
 * @property string $name
 * @property string $numOfSeats
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\booking> $bookings
 * @property-read int|null $bookings_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\day> $days
 * @property-read int|null $days_count
 * @method static \Illuminate\Database\Eloquent\Builder|rooms newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|rooms newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|rooms query()
 * @method static \Illuminate\Database\Eloquent\Builder|rooms whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|rooms whereHallsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|rooms whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|rooms whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|rooms whereNumOfSeats($value)
 * @method static \Illuminate\Database\Eloquent\Builder|rooms whereUpdatedAt($value)
 */
	class rooms extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\service
 *
 * @property int $id
 * @property int|null $halls_id
 * @property string $service
 * @property int|null $parent_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\booking> $bookings
 * @property-read int|null $bookings_count
 * @property-read service|null $parent
 * @property-read \Illuminate\Database\Eloquent\Collection<int, service> $subservice
 * @property-read int|null $subservice_count
 * @method static \Illuminate\Database\Eloquent\Builder|service newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|service newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|service query()
 * @method static \Illuminate\Database\Eloquent\Builder|service whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|service whereHallsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|service whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|service whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|service whereService($value)
 * @method static \Illuminate\Database\Eloquent\Builder|service whereUpdatedAt($value)
 */
	class service extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\users
 *
 * @property int $id
 * @property string $fullName
 * @property string $mobile
 * @property string $email
 * @property string $password
 * @property string|null $image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\booking> $bookings
 * @property-read int|null $bookings_count
 * @method static \Illuminate\Database\Eloquent\Builder|users newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|users newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|users query()
 * @method static \Illuminate\Database\Eloquent\Builder|users whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|users whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|users whereFullName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|users whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|users whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|users whereMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|users wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|users whereUpdatedAt($value)
 */
	class users extends \Eloquent implements \PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject {}
}

