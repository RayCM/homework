<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use Str;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use Validator;

class UserController extends BaseController
{
    public function login(Request $request)
    {
        $user = User::where('account', $request->account)->where('password', $request->password)->first();
        $apiToken = Str::random(10);
        if ($user) {
            if ($user->update(['api_token' => $apiToken])) { //更新 api_token
                if ($user->isAdmin)
                    return $this->sendResponse(['token' => $apiToken], 'Login as admin.');
                else
                    return $this->sendResponse(['token' => $apiToken], 'Login as user.');
            }
        } else {
            return $this->sendError('Wrong account or password！', [], 500);
        }
    }

    public function logout()
   {
       if (Auth::user()->update(['api_token' => 'logged out'])) {
            return $this->sendResponse([], "Logged out successfully.");
       }
   }
   
    public function show()
    {
        $admins = User::all();
        $users = [
            'account' =>  Auth::user()->account,
            'password' =>  Auth::user()->password,
            'mail' =>  Auth::user()->email
        ];
        if (Auth::user()->isAdmin) //是管理員，回傳所有會員資料
            return $this->sendResponse($admins->toArray(), 'Users retrieved successfully.');
        else //不是管理員，回傳該會員自己的資料
            return $this->sendResponse($users, 'Users retrieved successfully.');
    }

    public function create(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'account' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'max:12'],
            'email' => ['required', 'string', 'email', 'max:255']
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors(), 500);
        }

        $apiToken = Str::random(10).$request['account'];
        $user_data = [
            'account' => $request['account'],
            'email' => $request['email'],
            'password' => $request['password'],
            'api_token' => $apiToken,
        ];
        if ($request['isAdmin'])
            $user_data['isAdmin'] = '1';
        
        $create = User::create($user_data);

        if ($create) {
            return $this->sendResponse(['token' => $apiToken], 'Regist successfully.');
        } else {
            return $this->sendError('Regist fail.', [], 500);
        }    
    }
}