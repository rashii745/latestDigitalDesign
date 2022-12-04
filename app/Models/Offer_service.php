<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer_service extends Model
{
    use HasFactory;
    protected $table = 'offer_services';
    protected $fillable = [
        'offer_service_name', 'description','domain_id','user_id',
    ];
}
