<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'stream_id',
        'code',
        'category_id'
    ];

    public function stream()
    {
        return $this->belongsTo(Stream::class);
    }
    public function category()
    {
        return $this->belongsTo(CourseCategory::class);
    }
    public function collegeCourse()
    {
        return $this->hasMany(CollegeCourse::class);
    }
}
