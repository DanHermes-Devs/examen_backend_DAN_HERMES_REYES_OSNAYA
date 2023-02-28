<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    use HasFactory;

    protected $table = 'information';

    protected $fillable = [
        'direccion',
        'telefono',
        'fecha_nacimiento',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
