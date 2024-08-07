<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MyMovie extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'title', 'year', 'description', 'rating', 'ranking', 'review', 'img_url'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
