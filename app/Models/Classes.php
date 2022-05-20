<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    protected $fillable = ['title'];
    public $timestamps = false;

    public function students()
    {
        return $this->hasMany(Students::class, 'class_id', 'id');
    }

    public function lectures()
    {
        return $this->belongsToMany(Lectures::class, 'plans', 'class_id', 'lecture_id');
    }
}
