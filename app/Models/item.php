<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class item extends Model
{
    use HasFactory;

        //Model⇄テーブル
        protected $table = 'items';

        //テーブル⇄id
        protected $primarykey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'name',
        'status',
        'body',
        'type',
        'image',
    ];

        /**
     * ユーザーを登録する。
     */
    public function InsertItem($request)
    {
        //create.blade.phpで入力された各情報を基にデータベースへ登録する。

        $file_name = $request->item_image->getClientOriginalName();
        $img = $request->item_image->storeAs('public', $file_name);

        return $this->create([
            'name' => $request->item_name,
            'image' => $file_name,
            'body' => $request->item_body,
            'type' => $request->item_type,
        ]);
    }

    /**
     * データベースへ更新データを登録する
     */
    public function fixItem($request)
    {
        $file_name = $request->item_edit_image->getClientOriginalName();
        $img = $request->item_edit_image->storeAs('public', $file_name);

        Item::find($request->item_edit_id)->update([
            'name' => $request->item_edit_name,
            'image' => $file_name,
            'body' => $request->item_edit_body,
            'type' => $request->item_edit_type,
        ]);
    }

    /**
     * データベースから指定したIDの登録情報を削除する
     */
    public function deleteItem($request)
    {
        return Item::find($request->id)->delete();
    }
}
