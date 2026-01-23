<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Illuminate\Notifications\Notifiable;

class Editor extends Model implements Authenticatable
{
    use HasFactory, AuthenticatableTrait, Notifiable;

    protected $primaryKey = 'editor_id';

    protected $fillable = [
        'editor_number',
        'first_name',
        'last_name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'password' => 'hashed',
    ];

    public function editorId()
    {
        return $this->belongsTo(EditorsID::class, 'editor_number', 'editor_number');
    }
}
