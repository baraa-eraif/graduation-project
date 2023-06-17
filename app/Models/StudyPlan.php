<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudyPlan extends BaseModel
{
    use HasFactory, SoftDeletes;

    protected $fillable = array('title', 'description', 'year', 'specialization_id', 'total_hour', 'other_data','hour_price');

    protected $casts = array('other_data' => 'array');

    protected $columns = array('id','title', 'year',);

    protected $inputs = array(
        [
            'type' => 'input',
            'model' => 'title',
            'role' => [
                'require' => true,
            ]
        ],
        [
            'type' => 'input',
            'model' => 'year',
            'role' => [
                'require' => true,
            ]
        ],
        [
            'type' => 'select',
            'model' => 'specialization_id',
            'endpoint' => [
                'option_value' => 'id',
                'option_name' => 'name',
            ],
        ],
        [
            'type' => 'input',
            'model' => 'total_hour',
            'role' => [
                'require' => true,
            ]
        ],
        [
            'type' => 'textarea',
            'model' => 'description',
            'class' => 'col-md-12',
            'role' => [
                'require' => true,
            ]
        ],

    );
}
