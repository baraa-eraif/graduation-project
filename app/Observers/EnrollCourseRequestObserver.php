<?php

namespace App\Observers;

use App\Models\EnrollCourseRequest;

class EnrollCourseRequestObserver
{
    public function created(EnrollCourseRequest $enrollCourseRequest)
    {
        $user = auth()->user();
        $user->update(array(
            'balance' => $user->balance - ($enrollCourseRequest->course->hour_number * get($user, 'specialization.hour_price', 1))
        ));
    }
}
