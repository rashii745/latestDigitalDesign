<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use mysql_xdevapi\Table;

class Subdomain extends Authenticatable
{
    /*protected $table = "sub_categories";*/
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'subdomains';
    protected $primaryKey = 'subdomain_id';
    protected $fillable = [
        'domain_id','subdomain_name',
    ];
}
