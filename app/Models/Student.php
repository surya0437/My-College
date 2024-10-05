<?php

namespace App\Models;


use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Authenticatable
{
    use HasFactory;

    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    public function shift()
    {
        return $this->belongsTo(Shift::class);
    }

    public function studentAttendances()
    {
        return $this->hasMany(StudentAttendance::class);
    }
}
