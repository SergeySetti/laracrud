<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\State
 *
 * @property integer $id
 * @property string $state_name
 * @property string $state_slug
 * @method static \Illuminate\Database\Query\Builder|\App\State whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\State whereStateName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\State whereStateSlug($value)
 * @mixin \Eloquent
 */
class State extends Model
{
    public $timestamps = false;
    
    protected $fillable = [
        'state_name',
        'state_slug',
    ];
}
