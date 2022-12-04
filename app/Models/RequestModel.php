<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class RequestModel extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'requests';
    protected $primaryKey = 'request_id';
    protected $fillable = [
        'request_id',
        'client_id',
        'sp_id',
        'description',


    ];
}
