<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = [
        'user_id',
        'type',
        'title',
        'price',
        'city',
        'views',
    ];

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function features()
    {
        return $this->belongsToMany(Feature::class);
    }

    public function boatDetail()
    {
        return $this->hasOne(BoatDetail::class);
    }
}
