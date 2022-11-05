<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    
    public function __construct()
    {
        $this->item = new Item();
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $search = $request->input('search');
        $query = Item::query();
        $items = Item::orderBy('id')->get();

        if (!empty($search)) {
            $query->where('name', 'LIKE', '%'.$search.'%');
            $query->orWhere('body', 'LIKE', '%'.$search.'%');
            $query->orWhere('type', 'LIKE', '%'.$search.'%');
            $items = $query->get()->sortByDesc('created_at');
        }

        return view('items.index', [
            'items' => $items,
        ]);
    }

    public function itemRegister()
    {
        if (Auth::check()) {
            return view('items.create');
        } else {
            return view('items.create');
        }
    }

    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'item_name' => 'required|max:100',
                'item_body' => 'required|max:140',
                'item_image' => 'required',
                'item_type' => 'required|max:20'
            ],
            [
                'item_name.required' => '作品名を入力して下さい。',
                'item_name.max' => '作品名は100字以内で入力して下さい。',
                'item_body.required' => '作品紹介を入力して下さい。',
                'item_body.max' => '作品紹介は140字以内で入力して下さい。',
                'item_image.required' => '作品画像を入力して下さい。',
                'item_type.required' => '作者名を入力して下さい。',
                'item_type.max' => '作品名は20字以内で入力して下さい。',
            ]
        );
        $registerItem = $this->item->InsertItem($request);
        return redirect()->route('item.index');
    }

    /**
     * 商品編集画面への遷移
     */
    public function moveToEdit(Request $request)
    {
        $item = Item::find($request->id);
        return view('items.edit', [
            'item' => $item,
        ]);
    }
    /**
     * 商品編集
     */
    public function itemEdit(Request $request)
    {
        $validated = $request->validate(
        [
            'item_edit_name' => 'required|max:100',
            'item_edit_body' => 'required|max:140',
            'item_edit_image' => 'required',
            'item_edit_type' => 'required|max:20'
        ],
        [
            'item_edit_name.required' => '作品名を入力して下さい。',
            'item_edit_name.max' => '作品名は100字以内で入力して下さい。',
            'item_edit_body.required' => '作品紹介を入力して下さい。',
            'item_edit_body.max' => '作品紹介は140字以内で入力して下さい。',
            'item_edit_image.required' => '作品画像を入力して下さい。',
            'item_edit_type.required' => '作者名を入力して下さい。',
            'item_edit_type.max' => '作品名は20字以内で入力して下さい。',
        ]);

        $item = $this->item->fixItem($request);
        return redirect()->route('item.index');
    }

    /**
     * 商品詳細画面への遷移
     */
    public function detail(Request $request)
    {
        $item = Item::find($request->id);
        return view('items.detail', [
            'item' => $item,
        ]);
    }

    /**
     * 編集_削除処理
     */
    public function itemDelete(Request $request)
    {
        $user = $this->item->deleteItem($request);
        return redirect()->route('item.index');
    }

}
