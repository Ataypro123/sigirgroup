<?php

namespace App\Http\Controllers\Admin;

use App\PhotoCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class PhotoCategoriesController extends Controller
{
    protected $paginate;

    public function __construct()
    {
        $this->paginate = 10;
    }

    public function index()
    {
        $paginate = $this->paginate;
        $photoCategories = PhotoCategory::paginate($paginate);

        return view('admin.photoCategories.index', compact('photoCategories'));
    }

    public function create()
    {
        return view('admin.photoCategories.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        if (PhotoCategory::where('name', '=', Input::get('name'))->exists())
        {
            return back()->with('danger', 'Такое имя уже существует!');
        }

        PhotoCategory::create([
            'name' => $request['name']
        ]);

        return redirect()->route('photoCategory.index')->with('status', 'Успешно добавлен!');
    }


    public function edit(PhotoCategory $photoCategory)
    {
        return view('admin.photoCategories.edit', compact('photoCategory'));
    }

    public function update(Request $request, PhotoCategory $photoCategory)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $photoCategory->name = $request['name'];
        $photoCategory->save();

        return redirect()->route('photoCategory.index')->with('status', 'Успешно изменен!');
    }

    public function delete(PhotoCategory $photoCategory)
    {
        $photoCategory->delete();
        return redirect()->route('photoCategory.index')->with('danger', 'Успешно удален!');
    }
}
