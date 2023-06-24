<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Semester;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Base\Http\Controllers\BaseController;

class CourseController extends BaseController
{

    protected $config = [
      'filter_inputs' => false,
    ];

    public function store(Request $request)
    {
//        $semester = Semester::find($request->get('semester_id'));
//        $semester_course_hours = optional($semester->courses)->sum('hour_number') ?? 0;
//        if (($request->hour_number + $semester_course_hours) > $semester->number_of_hour)
//            return redirect()->back()->withErrors('لقد تجاوزت العدد المسموح به لساقات هذا الفصل');

        if ($request->hour_number > 4)
            return redirect()->back()->withErrors('يجب ألا يتجاوز قيمة عدد الساعات عن 4 ساعات');
//        if ($exists)
//            return redirect()->back()->withErrors('الفصل المراد اضافته مضاف مسبقاً');

        return parent::store($request); // TODO: Change the autogenerated stub
    }

}
