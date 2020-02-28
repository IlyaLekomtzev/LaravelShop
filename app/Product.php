<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function getPrice()
    {
        if(!is_null($this->pivot)){
            return $this->pivot->count * $this->price;
        }
        return $this->price;
    }
}
