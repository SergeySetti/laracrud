<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * App\Advert
 *
 * @mixin \Eloquent
 * @property integer $id
 * @property string $user_first_name
 * @property string $user_last_name
 * @property string $user_login
 * @property string $email
 * @property string $password
 * @property string $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Advert whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Advert whereUserFirstName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Advert whereUserLastName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Advert whereUserLogin($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Advert whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Advert wherePassword($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Advert whereRememberToken($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Advert whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Advert whereUpdatedAt($value)
 */
class Advert extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'user_first_name',
        'user_last_name',
        'user_login',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
}
