<?php

namespace App\Models;

use App\Models\Country;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'state_id'
    ];

    public function country(){
        return $this->belongsTo(Country::class);
    }
}
