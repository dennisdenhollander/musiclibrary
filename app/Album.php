<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    /**
     * Get the band that owns the album.
     */
    public function band()
    {
        return $this->belongsTo('App\Band');
    }
}
