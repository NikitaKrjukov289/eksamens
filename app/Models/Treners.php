<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Treners extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'bio', 
        'contact',
    ];

    public function trenins()
{
    return $this->hasMany(Trenins::class, "trener_id");
}
}
