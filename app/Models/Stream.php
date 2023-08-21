<?php

namespace App\Models;

use App\Models\Admin\CollegeCourse;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stream extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'code',
    ];

    public function courses()
    {
        return $this->hasMany(Course::class);
    }
    // public function college()
    // {
    //     return $this->hasMany(College::class);
    // }
}
