<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trenins extends Model
{
    use HasFactory;

    protected $table = 'trenins'; 
    
    protected $fillable = [
        'name',
        'description',
        'address',
        
    ];

    public function treners()
    {
        return $this->belongsTo(Treners::class);
    }

    public function favoritedBy()
    {
        return $this->belongsToMany(User::class, 'user_trenins');
    }

    public function comments()
{
    return $this->hasMany(Comment::class);
}
}
