<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    protected $guarded = ['created_at', 'updated_at'];

    public function fillGuest($attributes = []){
        if($this->fill($attributes)){
            return true;
        }
        return false;
    }

    public function updateGuest(Guest $guest, $attributes = []){
        if($guest->fill($attributes)){
            return true;
        }
        return false;
    }

}
