<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CollegeCourse extends Model
{
    use HasFactory;

    protected $fillable=['course_id','college_id','code','fee'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
    public function college()
    {
        return $this->belongsTo(College::class);
    }
}
