<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentBalanceTransaction extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = array('student_id', 'student_data', 'amount', 'transaction_type', 'description', 'sourceable_id', 'sourceable_model',);
}
