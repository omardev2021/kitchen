<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matching extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function seeker() {
        return $this->belongsTo(Seeker::class, 'seeker_id');
        // Assuming the foreign key is 'seeker_id' in the 'Matching' table
    }

    public function provider() {
        return $this->belongsTo(Provider::class, 'provider_id');
        // Assuming the foreign key is 'provider_id' in the 'Matching' table
    }
}
