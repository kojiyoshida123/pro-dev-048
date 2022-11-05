<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function __construct()
    {
        $this->user = new User();
    }

    
    /**
     * login画面への遷移
     */
    public function login()
    {
        if (Auth::check()) {
            return view('login');
        } else {
            return view('login');
        }
    }

    /**
     * ユーザー登録画面への遷移
     */
    public function register()
    {
        if (Auth::check()) {
            return view('create');
        } else {
            return view('create');
        }
    }

    public function userStore(Request $request)
    {
        $validated = $request->validate(
            [
                'user_name' => 'required',
                'user_email' => 'required|unique:users,email|email',
                'user_password' => 'required|min:8|confirmed',
                'user_password_confirmation' => 'required|min:8'
            ],
            [
                'user_name.required' => '名前を入力して下さい。',
                'user_email.required' => 'メールアドレスを入力して下さい。',
                'user_email.unique' => 'すでに登録済みのメールアドレスです。',
                'user_email.email' => 'メールアドレス形式で入力して下さい。',
                'user_password.required' => 'パスワードを入力して下さい。',
                'user_password.min' => 'パスワードは最低8文字です。',
                'user_password.confirmed' => 'パスワードが一致しません。',
                'user_password_confirmation.required' => '確認用パスワードを入力して下さい。',
                'user_password_confirmation.min' => '確認用パスワードは最低8文字です。',
            ]
        );

        $registerUser = $this->user->InsertUser($request);
        return redirect()->route('user.login');
    }

    /**
     * ログイン認証処理_バリデーション
     */

    public function signin(Request $request)
    {
        $validated = $request->validate(
            [
                'user_email' => 'required|email',
                'user_password' => 'required|min:8'
            ],
            [
                'user_email.required' => 'メールアドレスを入力して下さい。',
                'user_email.email' => 'メールアドレス形式で入力して下さい。',
                'user_password.required' => 'パスワードを入力して下さい。',
                'user_password.min' => 'パスワードは最低8文字です。',
            ]
        );

        if (Auth::attempt([
            'email' => $request->input('user_email'),
            'password' => $request->input('user_password')
        ])) {
            return redirect()->route('item.index');
        }
        return redirect()->back();
    }

    /**
     * ログアウト処理
     */
    public function signout()
    {
        Auth::logout();
        return redirect()->route('user.login');
    }

    /**
     * ユーザー一覧
     */
    public function userList(Request $request)
    {
        $search = $request->input('search');
        $query = User::query();
        $users = User::orderBy('created_at', 'asc')->get();

        if (!empty($search)) {
            $query->where('name', 'LIKE', '%' . $search . '%');
            $query->orWhere('email', 'LIKE', '%' . $search . '%');
            $users = $query->get()->sortByDesc('created_at');
        }

        return view('userlist', [
            'users' => $users,
        ]);
    }

    /**
     * ユーザー編集画面への遷移
     */
    public function edit(Request $request)
    {
        $user = User::find($request->id);
        return view('useredit', [
            'user' => $user,
        ]);
    }

    /**
     * ユーザー編集
     */
    public function userEdit(Request $request)
    {
        $validated = $request->validate(
            [
                'edit_name' => 'required',
                'edit_email' => 'required|email',
                'edit_role' => 'required',
            ],
            [
                'edit_name.required' => '名前を入力して下さい。',
                'edit_email.required' => 'メールアドレスを入力して下さい。',
                'edit_email.email' => 'メールアドレス形式で入力して下さい。',
                'edit_role.required' => '権限を選択して下さい。'
            ]
        );
        $user = $this->user->fixUser($request);
        return redirect()->route('user.list');
    }

    /**
     * 編集_削除処理
     */
    public function userDelete(Request $request)
    {
        $user = $this->user->deleteUser($request);
        return redirect()->route('user.list');
    }
}
