<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EditorsID extends Model
{
    use HasFactory;
    protected $table = 'editorsID';
    protected $primaryKey = 'editor_number';

    protected $fillable = [
        'status',
    ];

    public function editor()
    {
        return $this->hasOne(Editor::class, 'editor_number', 'editor_number');
    }
}
