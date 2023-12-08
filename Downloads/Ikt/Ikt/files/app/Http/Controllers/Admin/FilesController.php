<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\File;
use App\Helpers\Image;
use App\Subcategory;
use App\Term;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

class FilesController extends Controller
{
    protected $categories;
    protected $subCategories;
    protected $paginate;

    public function __construct()
    {
        $this->categories = Category::pluck('name', 'id')->toArray();
        $this->subCategories = Subcategory::all();
        $this->paginate = 10;
    }

    public function index()
    {
        $paginate = $this->paginate;
        $files = File::latest()->paginate($paginate);

        return view('admin.files.index', compact('files'));
    }

    public function create()
    {
        $categories = $this->categories;
        return view('admin.files.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'category_id' => 'required',
            'sub_category_id' => 'required',
            'type' => 'required',
        ]);

        if($request->file('file'))
        {
            $image = Image::store('file', $request->file('file'));
        } else {
            $image = null;
        }

        File::create([
            'name' => $request['name'],
            'category_id' => $request['category_id'],
            'subcategory_id' => $request['sub_category_id'],
            'type' => $request['type'],
            'url' => $request['url'],
            'file' => $image
        ]);

        return redirect()->route('files.index')->with('status', 'Успешно добавлен!');
    }


    public function edit(File $id)
    {
        $categories = $this->categories;
        $subCategories = $this->subCategories;
        return view('admin.files.edit', compact('id','categories', 'subCategories'));
    }

    public function update(Request $request, File $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'type' => 'required',
            'category_id' => 'required',
            'sub_category_id' => 'required',
        ]);

        if ($request['file'])
        {
            Storage::delete($id->file);
            $image = Image::store('file', $request->file('file'));
            $id->file = $image;
        }
        $id->name = $request['name'];
        $id->type = $request['type'];
        $id->category_id = $request['category_id'];
        $id->subcategory_id = $request['sub_category_id'];
        $id->url = $request['url'];
        $id->save();

        return redirect()->route('files.index')->with('status', 'Успешно изменен!');
    }

    public function delete(File $id)
    {
        $id->delete();
        Storage::delete($id->file);
        return redirect()->route('files.index')->with('danger', 'Успешно удален!');
    }

    public function GetSubcategory($category_id)
    {
        $subCat = Subcategory::where('category_id', $category_id)->get();

        return json_encode($subCat);
    }

    public function GetTerm($subcategory_id)
    {
        $term = Term::where('subcategory_id', $subcategory_id)->get();

        return json_encode($term);
    }
}
