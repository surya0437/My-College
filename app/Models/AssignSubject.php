<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignSubject extends Model
{
    use HasFactory;

    public function employee() {
        return $this->belongsTo(Employee::class);

    }

    public function subject() {
        return $this->belongsTo(Subject::class);
    }

    public function program() {
        return $this->belongsTo(Program::class);
    }

    public function academicPeriod() {
        return $this->belongsTo(AcademicPeriod::class);
    }

}
