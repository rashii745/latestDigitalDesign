<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class MessageModel extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'messages';
    protected $fillable = [
        'id',
        'sender_id',
        'receiver_id',
        'content',
        'readtext',
        'request_id'
    ];
}
