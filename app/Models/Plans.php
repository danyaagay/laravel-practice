<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plans extends Model
{
    protected $fillable = ['class_id', 'lecture_id', 'planned_at'];
    public $timestamps = false;

    public function class()
    {
        return $this->hasMany(Classes::class, 'id', 'class_id');
    }
}
