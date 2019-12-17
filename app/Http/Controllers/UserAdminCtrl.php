<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserAdmin;//user model can kiem tra
use Auth; //use thư viện auth

class UserAdminCtrl extends Controller
{
    public function getLogin()
    {
        return view('login');//return ra trang login để đăng nhập
    }

    public function postLogin(Request $request)
    {
        $arr = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if ($request->remember == trans('remember.Remember Me')) {
            $remember = true;
        } else {
            $remember = false;
        }
        //kiểm tra trường remember có được chọn hay không
        
        if (Auth::guard('UserAdmin')->attempt($arr)) {

            return redirect()->to('administrator/brand');
        } else {

            return withErrors('tài khoản và mật khẩu chưa chính xác');
            //...code tùy chọn
            //đăng nhập thất bại hiển thị đăng nhập thất bại
        }
    }
}