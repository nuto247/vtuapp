<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variation extends Model
{
    use HasFactory;

    public function network()
    {
        return $this->hasOne(Network::class);
    }

    public function plan()
    {
        return $this->hasOne(Plan::class);
    }

    public function price()
    {
        return $this->hasOne(Price::class);
    }
}
