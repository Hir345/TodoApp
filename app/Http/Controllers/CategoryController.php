<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Todo;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    // 一覧表示
    public function index()
    {
        $user = Auth::user();
        $items = Category::where('user_id' , $user->id)->get();
        return view('category.board',['items' => $items , 'user' => $user]);
    }

    // 詳細表示
    public function detail($id)
    {
        $user = Auth::user();
        \Log::debug($user);
        $category = Category::find($id);
        \Log::debug($category);
        if ($user->id == $category->user_id) {
            $param = ['category' => $category];
            return view('category.category',$param);
        } else {
            return redirect('/');
        }
    }

    /*public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }*/

    //todo作成ページ
    public function addTodo($id)
    {
        $param = ['category' => Category::find($id)];
        return view('category.addTodo',$param);
    }

    //todo作成
    public function createTodo(Request $request)
    {
        $this->validate($request,Todo::$rules);
        $todo = new Todo;
        $form = $request->all();
        unset($form['_token']);
        $todo->fill($form)->save();
        return redirect('/board/' . $request->category_id);
    }

    //タスク作成ページ
    public function addCategory()
    {
        return view('category.addCategory');
    }

    //タスク作成
    public function createCategory(Request $request)
    {
        $this->validate($request,Category::$rules);
        $category = new Category;
        $form = $request->all();
        unset($form['_token']);
        $user = Auth::user();
        $category->user_id = $user->id;
        $category->fill($form)->save();
        return redirect('/board');
    }

    //タスク編集ページ
    public function edit($id)
    {
        $param = ['category' => Category::find($id)];
        return view('category.edit',$param);
    } 

    //タスク編集
    public function update(Request $request)
    {
        $this->validate($request,Category::$rules);
        $category = Category::find($request->id);
        $form = $request->all();
        unset($form['_token']);
        $category->fill($form)->save();
        return redirect('/board');
    }

    //タスク削除ページ
    public function delete($id)
    {
        $param = ['category' => Category::find($id)];
        return view('category.del',$param);
    }

    //タスク削除
    public function remove(Request $request)
    {
        Category::find($request->id)->delete();
        return redirect('/board');
    }

    //todo削除
    public function delTodo(Request $request)
    {
        $catId = Todo::find($request->id)->category_id;
        Todo::find($request->id)->delete();
        return redirect('/board/' . $catId);
    }
}
//test
