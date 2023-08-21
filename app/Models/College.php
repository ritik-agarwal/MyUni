<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class College extends Model
{
    use HasFactory;

    protected $casts = [
        'streams'=>'json',
    ];

    protected $fillable = [
        'name','description','code','streams','address','city','state','zip','email','phone','banner_image','principal_name'
    ];

    public function collegeCourse()
    {
        return $this->hasMany(CollegeCourse::class);
    }
    
    public function getStreamsAttribute($streams)
    {   
        foreach(json_decode($streams) as $stream)
            $streamName[] =  Stream::where('id',$stream)->pluck('name')->first();
            
        return implode(',' ,$streamName);
    }
}
