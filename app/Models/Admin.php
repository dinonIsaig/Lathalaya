<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Admin extends Authenticatable
{
    use Notifiable;
    protected $primaryKey = 'admin_id';
    public $timestamps = false;
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'author_id',
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

    protected function initials(): Attribute
    {
        return Attribute::make(
            get: function () {
                // Split by space and filter out empty strings
                $words = explode(' ', trim($this->full_name ?? 'Guest Admin'));
                
                $first = $words[0][0] ?? ''; 
                $second = $words[1][0] ?? '';

                return strtoupper($first . $second);
            },
        );
    }

}
