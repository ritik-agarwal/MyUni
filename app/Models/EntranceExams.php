<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntranceExams extends Model
{
    use HasFactory;

    // protected $dateFormat = 'd-m-Y';
    
    protected $fillable =['admission_year' ,'name','description','code','courses','exam_date','reg_start_date','reg_last_date','fee','result_date'];

    protected $casts = [
        'courses'=>'json',
    ];

    public function getCoursesAttribute($courses)
    {       
        foreach(json_decode($courses) as $course)
            $courseName[] =  Course::where('id',$course)->pluck('name')->first();
            
        return implode(',' ,$courseName);
    }

    public function getRegStartDateAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }

    public function getRegLastDateAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }

    public function getExamDateAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }

    public function getResultDateAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }
}
