<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Good
 *
 * @property integer $id
 * @property integer $advert_id
 * @property string $good_name
 * @property float $good_price
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Advert $advert
 * @method static \Illuminate\Database\Query\Builder|\App\Good whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Good whereAdvertId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Good whereGoodName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Good whereGoodPrice($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Good whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Good whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Good extends Model
{
    protected $fillable = [
        'advert_id',
        'good_name',
        'good_price',
    ];

    public function advert()
    {
        return $this->belongsTo(Advert::class);
    }
}
