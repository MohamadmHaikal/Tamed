<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Cartalyst\Sentinel\Checkpoints\ThrottlingException;
use Sentinel;

class AuthController extends Controller
{

    public function _getLogin()
    {
        return view('dashboard.login');
    }
    public function _getRegister()
    { 
        return view('dashboard.register');
    }
    public function checkMobileUser(Request $request)
    {
        $input = request()->only('mobile', 'password');
        $validator = Validator::make(
            $request->all(),
            [
                'mobile' => 'required|numeric'
            ],
            [
                'mobile.required' => __('The mobile is required'),
                'mobile.exists' => __('The mobile does not exist'),

            ]
        );
        if ($validator->fails()) {

            return $this->sendJson([
                'status' => 0,
                'message' => view('common.alert', ['type' => 'danger', 'message' => $validator->errors()->first()])->render()
            ]);
        }
        $user = get_user_by_mobile($input['mobile']);
        $code = mt_rand(1000, 9999);
        if (!empty($user)) {

            $users = User::find($user['id']);
            $users['v-code'] = $code;
            $users['password'] = bcrypt($code);
            $users->save();
        } else {
            $credentials = [
                'phone'    => $input['mobile'],
                'password' => \Illuminate\Support\Str::random(12),
            ];
            $user = Sentinel::registerAndActivate($credentials);
            $user_model = new \App\Models\User();
            $role = $user_model->getRoleByName('customer');
            $user_model->updateUserRole($user->getUserId(), $role->id);
            $users = User::find($user['id']);
            $users['v-code'] = $code;
            $users['password'] = bcrypt($code);
            $users->save();
        }
        return $this->sendJson([
            'status' => 1,
            'mobile' => $input['mobile'],
            'message' => view('common.alert', ['type' => 'success', 'message' => 'تم إرسال كود التحقق بنجاح'])->render()
        ]);
    }
    public function _postLogin(Request $request)
    {
        $input = request()->only('mobile', 'code');
        $redirect = url('/auth/login');
        $validator = Validator::make(
            $request->all(),
            [
                'code' => 'required|numeric'
            ],
            [
                'code.required' => __('backend.Please enter the code to continue'),

            ]
        );
        if ($validator->fails()) {

            return $this->sendJson([
                'status' => 0,
                'message' => view('common.alert', ['type' => 'danger', 'message' => $validator->errors()->first()])->render()
            ]);
        }
        $credentials = [
            'phone'    => $input['mobile'],
            'password' => $input['code'],
        ];

        try {
            Sentinel::authenticate($credentials, true);
        } catch (ThrottlingException $e) {
            return $this->sendJson([
                'status' => 0,
                'message' => view('common.alert', ['type' => 'danger', 'message' => __('backend.Your account has been suspended due to 5 failed attempts. Try again after 15 minutes.')])->render()
            ]);
        }
        if (Sentinel::check()) {
            return $this->sendJson([
                'status' => 1,
                'message' => view('common.alert', ['type' => 'success', 'message' => __('backend....Logged in successfully. Redirecting')])->render(),
                'redirect' => $redirect
            ]);
        } else {
            return $this->sendJson([
                'status' => 0,
                'message' => view('common.alert', ['type' => 'danger', 'message' => __('backend.The code is incorrect')])->render()
            ]);
        }
    }
    public function _getLogout(Request $request)
    {
        $redirect_url = request()->get('redirect_url');

        Sentinel::logout();

        if (empty($redirect_url)) {
            $redirect_url = url('auth/login');
        }
        return redirect($redirect_url);
    }
}
