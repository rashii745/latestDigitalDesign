<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_service extends Model
{
    use HasFactory;
    protected $table = 'order_services';

    protected $fillable = [
        'order_id','service_name','domain_id',
    ];
}
