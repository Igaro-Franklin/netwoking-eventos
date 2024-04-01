<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'city', 'private', 'description', 'items'];

    protected $casts = [
        'items' => 'array'
    ];

    protected $dates = ['date'];
}

