<?php
namespace App\Http\Controllers;

use DB;
use Hash;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{
    public function login(Request $request)
    {
        return view('auth.login');
    }

    public function loginPost(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if ($validator->fails()) {
            return back()->withInput()->with('fail', $validator->errors()->all());
        }

        else
        {
            $userdata = [
                'email' => $request->email,
                'password' => $request->password
            ];
            if (Auth::attempt($userdata))
            {
                return redirect(Route('admin.dashboard'));
            }
            else
            {
                return back()->withInput()->with('fail', ['Invalid Credentials!']);
            }
        }
    }




}
