<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Specialization extends BaseModel
{
    use HasFactory, SoftDeletes;

    protected $fillable = array('name',  'number_of_hour', 'other_details','hour_price');

    protected $casts = array('other_details' => 'array');

    protected $columns = array('id', 'name', 'number_of_hour','hour_price');

//    protected $showAction = true;

    protected $inputs = array(
        [
            'type' => 'input',
            'model' => 'name',
            'role' => [
                'require' => true,
            ]
        ],
        [
            'type' => 'input',
            'model' => 'number_of_hour',
            'role' => [
                'require' => true,
            ]
        ],
        [
            'type' => 'input',
            'model' => 'hour_price',
            'role' => [
                'require' => true,
            ]
        ],
    );

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_specializations', 'specialization_id', 'course_id', 'id', 'id');
    }

    public function getSpecializationCoursesAttribute()
    {
        return $this->courses->groupBy(array('study_year','study_season'))->toArray();
    }
}
