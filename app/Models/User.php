<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    //Model⇄テーブル
    protected $table = 'users';

    //テーブル⇄id
    protected $primarykey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * ユーザーを登録する。
     */
    public function InsertUser($request)
    {
        //create.blade.phpで入力された各情報を基にデータベースへ登録する。
        return $this->create([
            'name' => $request->user_name,
            'email' => $request->user_email,
            'password' => Hash::make($request->user_password),
            'role' => '0',
        ]);
    }

        /**
     * データベースへ更新データを登録する
     */
    public function fixUser($request)
    {
        User::find($request->edit_id)->update([
            'name' => $request->edit_name,
            'phone' => $request->edit_tel,
            'email' => $request->edit_email,
            'role' => $request->edit_role
        ]);
    }

        /**
     * データベースから指定したIDの登録情報を削除する
     */
    public function deleteUser($request)
    {
        return User::find($request->id)->delete();
    }
}
