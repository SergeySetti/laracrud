<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Order
 *
 * @property integer $id
 * @property integer $state_id
 * @property integer $advert_id
 * @property integer $good_id
 * @property string $order_client_phone
 * @property string $order_client_name
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Advert $advert
 * @property-read \App\Good $good
 * @property-read \App\State $state
 * @method static \Illuminate\Database\Query\Builder|\App\Order whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Order whereStateId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Order whereAdvertId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Order whereGoodId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Order whereOrderClientPhone($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Order whereOrderClientName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Order whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Order extends Model
{
    protected $fillable = [
        'state_id',
        'advert_id',
        'good_id',
        'order_client_phone',
        'order_client_name',
    ];

    public function good()
    {
        return $this->belongsTo(Good::class);
    }
    
    public function state()
    {
        return $this->belongsTo(State::class);
    }
    
}
