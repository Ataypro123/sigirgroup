<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class CategoriesController extends Controller
{
    protected $paginate;

    public function __construct()
    {
        $this->paginate = 10;
    }

    public function index()
    {
        $paginate = $this->paginate;
        $categories = Category::paginate($paginate);

        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        if (Category::where('name', '=', Input::get('name'))->exists())
        {
            return back()->with('danger', 'Такое имя уже существует!');
        }

        Category::create([
            'name' => $request['name']
        ]);

        return redirect()->route('category.index')->with('status', 'Успешно добавлен!');
    }


    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $category->name = $request['name'];
        $category->save();

        return redirect()->route('category.index')->with('status', 'Успешно изменен!');
    }

    public function delete(Category $category)
    {
        $category->delete();
        return redirect()->route('category.index')->with('danger', 'Успешно удален!');
    }
}
