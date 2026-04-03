<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
    /**
     * ブログとのリレーション
     */
    public function blogs()
    {
        return $this->belongsToMany(Blog::class);
    }
}
