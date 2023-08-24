<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    // List user
    public function listUser(Request $request)
    {
        $title = 'User List';
        $users = User::all();
        if ($request->post() && $request->search) {
            $users = DB::table('users')->where('fullname', 'like', "%$request->search%")->get();
        }
        return view('user.index', compact('title', 'users'));
    }

    // Add user
    public function addUser(UserRequest $request)
    {
        $title = 'Add User';
        if ($request->isMethod('POST')) {
            $users = new User();
            $data = $request->except('_token');
            if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
                $data['avatar'] = uploadFile('img', $request->file('avatar'));
            }
            // dd($data);
            $users->fill($data)->save();
            if ($users->save()) {
                Session::flash('success', 'Add user success!');
                return redirect()->route('list_user');
            } else {
                Session::flash('error', 'Add user fail!');
            }
        }
        return view('user.add', compact('title'));
    }

    // Edit user
    public function editUser(UserRequest $request, $id)
    {
        $title = 'Update User';
        $details = User::find($id);
        if ($request->isMethod('POST')) {
            $data = $request->except('_token');
            if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
                $data['avatar'] = uploadFile('img', $request->file('avatar'));
            }
            $update = User::where('id', $id)->update($data);
            if ($update) {
                Session::flash('success', 'Update user success!');
                return redirect()->route('list_user');
            } else {
                Session::flash('error', 'Update user fail!');
            }
        }
        return view('user.edit', compact('title', 'details'));
    }

    // Delete user
    public function deleteUser($id)
    {
        if ($id) {
            $delete = User::where('id', $id)->delete();
            if ($delete) {
                Session::flash('success', 'Delete user success!');
                return redirect()->route('list_user');
            } else {
                Session::flash('error', 'Delete user fail!');
            }
        }
        return;
    }

    // Login
    public function login(UserRequest $request)
    {
        $title = "Login";
        if ($request->isMethod('POST')) {
            // Sử dụng Auth
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                // Thành công
                return redirect()->route('list_user');
            } else {
                // Thất bại
                Session::flash('error', 'Email or password is incorrect!');
                return redirect()->back()->with('error', 'Email or password is incorrect!');
            }
        }
        return view('auth.login', compact('title'));
    }

    // Register
    public function register(UserRequest $request)
    {
        $title = "Register";
        if ($request->isMethod('POST')) {
            $params = $request->except('_token');
            $params["password"] = Hash::make($request->password);
            $params["email_verified_at"] = Carbon::now('Asia/Ho_Chi_Minh');
            if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
                $params['avatar'] = uploadFile('img', $request->file('avatar'));
            }
            $user = User::create($params);

            if ($user->id) {
                Session::flash('success', 'Register success!');
                // Đăng nhập người dùng
                // Auth::login($user);
                // Chuyển hướng người dùng về trang danh sách sản phẩm
                // return redirect()->route('list_product');
                return redirect()->route('login');
            }
        }
        return view('auth.register', compact('title'));
    }

    // Logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
