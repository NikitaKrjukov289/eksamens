<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'content', // Добавьте это
        'id',
        'user_id' // Если есть другие поля, добавьте их
    ];

    public function trenins()
    {
        return $this->belongsTo(Trenins::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
