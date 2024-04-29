<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seeker extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function city() {
        return $this->belongsTo(City::class, 'city_id');
        // Assuming the foreign key is 'seeker_id' in the 'Matching' table
    }

    public function food() {
        return $this->belongsTo(Food::class, 'food_id');
        // Assuming the foreign key is 'seeker_id' in the 'Matching' table
    }
}
