<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    public function shift()
    {
        return $this->belongsTo(shift::class);
    }

    public function assignSubject()
    {
        return $this->hasMany(AssignSubject::class);
    }
}
