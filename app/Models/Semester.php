<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Semester extends BaseModel
{
    use HasFactory, SoftDeletes;

    protected $fillable = array('title', 'number_of_hour', 'study_plan_id', 'year', 'ordered', 'start_date', 'end_date');

    protected $columns = array('id', 'title', 'number_of_hour', 'start_date', 'end_date');

    protected $inputs = array(
        [
            'type' => 'input',
            'model' => 'title',
            'role' => [
                'require' => true,
            ]
        ],
        [
            'type' => 'date',
            'model' => 'start_date',
            'role' => [
                'require' => true,
            ]
        ],
        [
            'type' => 'date',
            'model' => 'end_date',
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
            'type' => 'select',
            'model' => 'study_plan_id',
            'endpoint' => [
                'option_value' => 'id',
                'option_name' => 'title',
            ],
            'role' => [
                'require' => true,
            ]
        ],
        [
            'type' => 'select',
            'model' => 'year',
            'class' => 'col-md-6',
            'hideSearch' => true,

            'endpoint' => [
                'option_value' => 'id',
                'option_name' => 'name',
                'model' => [
                    'الاولى' => 1,
                    'الثانية' => 2,
                ]
            ],
        ],
        [
            'type' => 'select',
            'model' => 'ordered',
            'class' => 'col-md-6',
            'hideSearch' => true,

            'endpoint' => [
                'option_value' => 'id',
                'option_name' => 'name',
                'model' => [
                    'الاول' => 1,
                    'الثاني' => 2,
                ]
            ],
        ],
    );

    public function study_plan()
    {
        return $this->belongsTo(StudyPlan::class,'study_plan_id');
    }

}
