<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Image;
use App\Photo;
use App\PhotoCategory;
use App\PhotoSubcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class PhotoSubcategoriesController extends Controller
{
    protected $photoCategories;
    protected $paginate;

    public function __construct()
    {
        $this->photoCategories = PhotoCategory::pluck('name', 'id')->toArray();
        $this->paginate = 10;
    }

    public function index()
    {
        $paginate = $this->paginate;
        $photoSubcategories = PhotoSubcategory::latest()->paginate($paginate);

        return view('admin.photoSubcategories.index', compact('photoSubcategories'));
    }

    public function create()
    {
        $photoCategories = $this->photoCategories;

        return view('admin.photoSubcategories.create', compact('photoCategories'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'body' => 'required',
            'photo_category_id' => 'required'
        ]);

        if (PhotoSubcategory::where('name', '=', Input::get('name'))->exists())
        {
            return back()->with('danger', 'Такое имя уже существует!');
        }

        $photoSubcategory = PhotoSubcategory::create([
            'name' => $request['name'],
            'body' => $request['body'],
            'photo_category_id' => $request['photo_category_id']
        ]);

        if($request->file('uploads'))
        {
            $photos = $request->file('uploads');

            foreach ($photos as $uploads)
            {
                $image = Image::store('photos', $uploads);
                Photo::create([
                    'uploads' => $image,
                    'photo_subcategory_id' => $photoSubcategory->id,
                ]);
            }
        }

        return redirect()->route('photoSubcategory.index')->with('status', 'Успешно добавлен!');
    }


    public function edit(PhotoSubcategory $photoSubcategory)
    {
        $photoCategories = $this->photoCategories;

        return view('admin.photoSubcategories.edit', compact('photoSubcategory','photoCategories'));
    }

    public function update(Request $request, PhotoSubcategory $photoSubcategory)
    {
        $this->validate($request, [
            'name' => 'required',
            'body' => 'required',
            'photo_category_id' => 'required'
        ]);

        $photoSubcategory->name = $request['name'];
        $photoSubcategory->body = $request['body'];
        $photoSubcategory->photo_category_id = $request['photo_category_id'];

        if($request->file('uploads'))
        {
            $photos = $request->file('uploads');

            foreach ($photos as $uploads)
            {
                $image = Image::store('photos', $uploads);
                Photo::create([
                    'uploads' => $image,
                    'photo_subcategory_id' => $photoSubcategory->id,
                ]);
            }
        }

        $photoSubcategory->save();

        return redirect()->route('photoSubcategory.index')->with('status', 'Успешно изменен!');
    }

    public function delete(PhotoSubcategory $photoSubcategory)
    {
        $photoSubcategory->delete();
        return redirect()->route('photoSubcategory.index')->with('danger', 'Успешно удален!');
    }
}
