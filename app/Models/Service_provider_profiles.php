<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service_provider_profiles extends Model
{
    use HasFactory;
    protected $table = 'service_provider_profiles';
    protected $primaryKey = 'profile_id';
    protected $fillable = [
        'user_id',
        'specialization',
        'experience',

    ];
}
