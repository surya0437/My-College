<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Authenticatable
{
    use HasFactory;

    public function shift()
    {
        return $this->belongsTo(Shift::class);
    }

    public function assignSubject()
    {
        return $this->hasMany(AssignSubject::class);
    }
}
