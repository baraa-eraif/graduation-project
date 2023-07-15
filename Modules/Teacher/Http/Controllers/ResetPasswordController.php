<?php

namespace Modules\Teacher\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;

class ResetPasswordController extends Controller
{
    use ResetsPasswords;


    public function resetPasswordView()
    {
        return view('teacher.pages.resetPassword.index');
    }

    /**
     * Reset the given user's password.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function reset(Request $request)
    {
        $user = auth()->user();
        $isOldPasswordCorrect = Hash::check($request->get('oldPassword'), $user->password);
        if (!$isOldPasswordCorrect)
            return response()->json(['status' => false, 'message' => 'عذراً كلمة المرور القديمة غير صحيحة']);
        $user->update(array(
            'password' => Hash::make($request->get('password'))
        ));

        Auth::guard('teachers-auth')->logout();
        return response()->json(['status' => true, 'message' => 'تم تحديث كلمة المرور بنجاح','route' => 'teacher']);
    }

}
