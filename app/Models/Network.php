<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Network extends Model
{
    use HasFactory;

    // Define the fillable attributes
    protected $fillable = ['variation_id', 'name'];

    /**
     * Get the variation that owns the network.
     */
    public function variation()
    {
        return $this->belongsTo(Variation::class);
    }
}
