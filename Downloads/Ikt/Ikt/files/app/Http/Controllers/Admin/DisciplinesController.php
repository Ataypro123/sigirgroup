<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Discipline;
use App\Helpers\Image;
use App\Subcategory;
use App\Term;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class DisciplinesController extends Controller
{
    protected $categories;
    protected $subCategories;
    protected $terms;
    protected $paginate;

    public function __construct()
    {
        $this->categories = Category::pluck('name', 'id')->toArray();
        $this->subCategories = Subcategory::all();
        $this->terms = Term::all();
        $this->paginate = 10;
    }

    public function index()
    {
        $paginate = $this->paginate;
        $disciplines = Discipline::paginate($paginate);

        return view('admin.disciplines.index', compact('disciplines'));
    }

    public function create()
    {
        $categories = $this->categories;
        return view('admin.disciplines.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'category_id' => 'required',
            'sub_category_id' => 'required',
            'term_id' => 'required',
            'type' => 'required',
            't' => 'required',
            'u' => 'required',
            'k' => 'required',
            'ects' => 'required',
            'code' => 'required',
            'file' => 'required',
        ]);

        if($request->file('file'))
        {
            $image = Image::store('disciplines', $request->file('file'));
        } else {
            $image = null;
        }

        Discipline::create([
            'name' => $request['name'],
            'category_id' => $request['category_id'],
            'subcategory_id' => $request['sub_category_id'],
            'term_id' => $request['term_id'],
            'type' => $request['type'],
            't' => $request['t'],
            'u' => $request['u'],
            'k' => $request['k'],
            'ects' => $request['ects'],
            'code' => $request['code'],
            'file' => $image,
        ]);

        return redirect()->route('disciplines.index')->with('status', 'Успешно добавлен!');
    }


    public function edit(Discipline $id)
    {
        $categories = $this->categories;
        $subCategories = $this->subCategories;
        $terms = $this->terms;
        return view('admin.disciplines.edit', compact('id','categories', 'subCategories','terms'));
    }

    public function update(Request $request, Discipline $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'category_id' => 'required',
            'sub_category_id' => 'required',
            'term_id' => 'required',
            'type' => 'required',
            't' => 'required',
            'u' => 'required',
            'k' => 'required',
            'ects' => 'required',
            'code' => 'required',
        ]);

        if ($request['file'])
        {
            Storage::delete($id->file);
            $image = Image::store('disciplines', $request->file('file'));
            $id->file = $image;
        }

        $id->name = $request['name'];
        $id->category_id = $request['category_id'];
        $id->subcategory_id = $request['sub_category_id'];
        $id->term_id = $request['term_id'];
        $id->type = $request['type'];
        $id->t = $request['t'];
        $id->u = $request['u'];
        $id->k = $request['k'];
        $id->ects = $request['ects'];
        $id->code = $request['code'];
        $id->save();

        return redirect()->route('disciplines.index')->with('status', 'Успешно изменен!');
    }

    public function delete(Discipline $id)
    {
        $id->delete();
        Storage::delete($id->file);
        return redirect()->route('disciplines.index')->with('danger', 'Успешно удален!');
    }
}
