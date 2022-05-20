<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lectures extends Model
{
    protected $fillable = ['subject', 'description'];
    public $timestamps = false;

    public function plans()
    {
        return $this->hasMany(Plans::class, 'lecture_id', 'id');
    }

    public function classes()
    {
        return $this->belongsToMany(Classes::class, 'plans', 'lecture_id', 'class_id');
    }
}
