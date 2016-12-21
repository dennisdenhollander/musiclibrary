<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Band extends Model
{
    /**
     * Get the albums for the band
     */
    public function albums()
    {
        return $this->hasMany('App\Album');
    }
}
