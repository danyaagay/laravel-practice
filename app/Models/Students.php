<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    protected $fillable = ['name', 'email', 'class_id'];
    public $timestamps = false;

    public function class()
    {
        return $this->hasOne(Classes::class, 'id', 'class_id');
    }
}
