<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends BaseModel
{
    use HasFactory;

    protected $fillable = array('text','sourceable_model','sourceable_id');


    protected $columns = array('text');

    protected $inputs = array(
        [
            'type' => 'textarea',
            'model' => 'text',
            'role' => [
                'require' => true,
            ]
        ],
        [
            'type' => 'select',
            'model' => 'notification_type',
            'class' => 'col-md-6',
            'hideSearch' => true,
            'role' => [
                'require' => true,
            ],
            'endpoint' => [
                'option_value' => 'id',
                'option_name' => 'name',
                'model' => [
                    'الطلاب' => 'students',
                    'المدرسين' => 'teachers',
                    'طالب' => 'student',
                    'مدرس' => 'teacher',
                ]
            ],
            'function' => [
                [
                    'name' => 'onchange',
                    'callable' => 'onselect_notification_type_id',
                ]
            ]
        ],
        [
            'type' => 'select',
            'model' => 'student_id',
            'class' => 'col-md-6 d-none',
            'endpoint' => [
                'option_value' => 'id',
                'option_name' => 'name',
            ],
        ],
        [
            'type' => 'select',
            'model' => 'teacher_id',
            'class' => 'col-md-6 d-none',
            'endpoint' => [
                'option_value' => 'id',
                'option_name' => 'name',
            ],
        ],
    );
}
