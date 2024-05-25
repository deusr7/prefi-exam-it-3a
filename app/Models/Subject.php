<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
      protected $fillable = [
        'subject_code', 'name', 'description', 'instructor', 
        'schedule', 'grades', 'average_grade', 'remarks', 'date_taken'
    ];

        protected $casts = [
        'grades' => 'array',
        'date_taken' => 'date',
    ];

        public function setGradesAttribute($value)
    {
        $this->attributes['grades'] = json_encode($value);
        $this->attributes['average_grade'] = array_sum($value) / count($value);
        $this->attributes['remarks'] = $this->attributes['average_grade'] >= 3.0 ? 'PASSED' : 'FAILED';
    }
}
