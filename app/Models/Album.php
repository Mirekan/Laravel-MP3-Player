<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    //
    protected $fillable = ['name', 'user_id'];

    public function songs(): BelongsToMany
    {
        return $this->belongsToMany(Song::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

}
