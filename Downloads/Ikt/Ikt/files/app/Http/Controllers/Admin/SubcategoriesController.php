<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Helpers\Image;
use App\Subcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

class SubcategoriesController extends Controller
{
    protected $categories;
    protected $paginate;

    public function __construct()
    {
        $this->categories = Category::pluck('name', 'id')->toArray();
        $this->paginate = 10;
    }

    public function index()
    {
        $paginate = $this->paginate;
        $subcategories = Subcategory::latest()->paginate($paginate);

        return view('admin.subcategories.index', compact('subcategories'));
    }

    public function create()
    {
        $categories = $this->categories;

        return view('admin.subcategories.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'category_id' => 'required',
            'body' => 'required',
        ]);

        if($request->file('image'))
        {
            $image = Image::store('subcategory', $request->file('image'));
        } else {
            $image = null;
        }

        Subcategory::create([
            'name' => $request['name'],
            'category_id' => $request['category_id'],
            'body' => $request['body'],
            'image' => $image
        ]);

        return redirect()->route('subcategory.index')->with('status', 'Успешно добавлен!');
    }


    public function edit(Subcategory $id)
    {
        $categories = $this->categories;

        return view('admin.subcategories.edit', compact('id','categories'));
    }

    public function update(Request $request, Subcategory $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'body' => 'required',
            'category_id' => 'required'
        ]);

        if ($request['image'])
        {
            Storage::delete($id->image);
            $image = Image::store('subcategory', $request->file('image'));
            $id->image = $image;
        }
        $id->name = $request['name'];
        $id->body = $request['body'];
        $id->category_id = $request['category_id'];
        $id->save();

        return redirect()->route('subcategory.index')->with('status', 'Успешно изменен!');
    }

    public function delete(Subcategory $id)
    {
        $id->delete();
        return redirect()->route('subcategory.index')->with('danger', 'Успешно удален!');
    }
}
