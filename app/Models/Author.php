<?php

namespace App\Models;

use Illuminate\database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;

class Author extends Model implements Authenticatable
{
    use AuthenticatableTrait, Notifiable;
    protected $primaryKey = 'author_id';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'author_id',
        'first_name',
        'last_name',
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

    protected $guarded = ['password'];

}
