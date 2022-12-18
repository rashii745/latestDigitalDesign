<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Component extends Model
{
    use HasFactory;
    protected $table = 'components';
<<<<<<< HEAD
    protected $primaryKey = 'component_id';
    protected $fillable = ['name','image'];
=======
    protected $fillable = [
        'id','name','image','type'
    ];
>>>>>>> 909ed3109bc24dd1c839300793ed210e123d874c
}
