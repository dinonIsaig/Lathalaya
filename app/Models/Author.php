<?php

namespace App\Models;

use Illuminate\database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Author extends Model
{
    use Notifiable;
    protected $primaryKey = 'author_id';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'auhtor_id',
        'full_name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     */
    protected $casts = [
        'password' => 'hashed',
    ];

}
