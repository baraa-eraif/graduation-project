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
    );
}
