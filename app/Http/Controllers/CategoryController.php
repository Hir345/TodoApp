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
        return view('hello.board',['items' => $items , 'user' => $user]);
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
            return view('hello.category',$param);
        } else {
            return redirect('/');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function addTodo($id)
    {
        $param = ['category' => Category::find($id)];
        return view('hello.addTodo',$param);
    }

    public function createTodo(Request $request)
    {
        $this->validate($request,Todo::$rules);
        $todo = new Todo;
        $form = $request->all();
        unset($form['_token']);
        $todo->fill($form)->save();
        return redirect('/board/' . $request->category_id);
    }

    public function addCategory()
    {
        return view('hello.addCategory');
    }

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

    public function edit($id)
    {
        $param = ['category' => Category::find($id)];
        return view('hello.edit',$param);
    } 

    public function update(Request $request)
    {
        $this->validate($request,Category::$rules);
        $category = Category::find($request->id);
        $form = $request->all();
        unset($form['_token']);
        $category->fill($form)->save();
        return redirect('/board');
    }

    public function delete($id)
    {
        $param = ['category' => Category::find($id)];
        return view('hello.del',$param);
    }

    public function remove(Request $request)
    {
        Category::find($request->id)->delete();
        return redirect('/board');
    }

    public function delTodo(Request $request)
    {
        $catId = Todo::find($request->id)->category_id;
        Todo::find($request->id)->delete();
        return redirect('/board/' . $catId);
    }
}
