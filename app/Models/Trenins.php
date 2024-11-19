<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trenins extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'description',
        'address',
    ];

    public function users()
{
    return $this->belongsToMany(User::class, 'user_training', 'trenins_id', 'user_id');
}

  
}
