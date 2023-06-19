<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CalendarEvent extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = array('end','start','title','additions','eventable_id','eventable_type');

    protected $casts = array('additions' => 'array');


}
