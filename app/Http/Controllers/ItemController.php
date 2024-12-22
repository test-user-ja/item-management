<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use App\Models\User;

class ItemController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * 商品一覧
     */
    public function index(Request $request)
    {
        // 商品一覧取得
        // $items = Item::all();

        // return view('item.index', compact('items'));
        $keyword = $request->input('keyword');
        $query = Item::query();
        if(!empty($keyword)){
            $query->where('name','LIKE',"%{$keyword}%")
            ->orWhere('type','LIKE',"%{$keyword}%")
            ->orWhere('detail','LIKE',"%{$keyword}%");
        }
        // $items = Item::sortable()->get();
        // $items = $query->get();
        // $items = $query::sortable()->get();
        $items = $query->sortable()->get();
        // $id = Auth::id();
        // $users = User::where('id', $id)->get('admin');
        $role = auth()->user()->admin;
        return view('item.index', compact('items', 'keyword', 'role'));
    }

    /**
     * 商品登録
     */
    public function add(Request $request)
    {

            // POSTリクエストのとき
            if ($request->isMethod('post')) {
                if ($request->has('registor')) {

                // バリデーション
                $this->validate($request, [
                    'name' => 'required|max:100',
                ]);

                // 商品登録
                Item::create([
                    'user_id' => Auth::user()->id,
                    'name' => $request->name,
                    'type' => $request->type,
                    'detail' => $request->detail,
                ]);

                return redirect('/items');
            }else if($request->has('return')) {
                return redirect('items');
            }
    
            }
            $role = auth()->user()->admin;
    
            return view('item.add', compact('role'));
    }

    public function edit($user_id)
    {
        $members = Item::find($user_id);
        // return view('item.edit', compact('user_id'));
        $role = auth()->user()->admin;

        return view('item.edit', compact('members', 'role'));
    }

    public function update(Request $request, $user_id)
    {
        if ($request->has('submit_del')) {

            $members = Item::find($user_id);
            $members->delete();
            return redirect('items');
        } else if ($request->has('submit_return')) {
            return redirect('items');
        }
        $members = Item::find($user_id);
        $validatedData = $request->validate([
            'name' => 'required|max:100',
            'type' => 'max:100',
            'detail' => 'max:500',
        ]);
        $members->update($validatedData);
        return redirect('items');
    }
}
