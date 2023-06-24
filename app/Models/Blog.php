<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends BaseModel
{
    use HasFactory;

    protected $fillable = array('title', 'content');

    protected $columns = array('id','title');

    protected $inputs = array(
        [
            'type' => 'input',
            'model' => 'title',
            'class' => 'col-md-12',
            'role' => [
                'require' => true,
            ]
        ],
        [
            'type' => 'ckeditor',
            'model' => 'content',
            'class' => 'col-md-12 mt-5',
        ],
//        [
//            'type' => 'image',
//            'message' => 'image',
//            'model' => 'title',
//            'class' => 'col-md-12',
//            'role' => [
//                'require' => true,
//            ]
//        ],
    );

    protected $filterInputs = array(
        [
            'type' => 'input',
            'model' => 'title',
            'class' => 'col-md-6',
        ],
    );
}
