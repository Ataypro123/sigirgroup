<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Subcategory;
use App\Term;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TermsController extends Controller
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
        $terms = Term::paginate($paginate);

        return view('admin.terms.index', compact('terms'));
    }

    public function create()
    {
        $categories = $this->categories;
        return view('admin.terms.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'category_id' => 'required',
            'sub_category_id' => 'required',
        ]);

        Term::create([
            'name' => $request['name'],
            'category_id' => $request['category_id'],
            'subcategory_id' => $request['sub_category_id'],
        ]);

        return redirect()->route('terms.index')->with('status', 'Успешно добавлен!');
    }


    public function edit(Term $id)
    {
        $categories = $this->categories;
        $subCategories = $this->subCategories;
        return view('admin.terms.edit', compact('id','categories', 'subCategories'));
    }

    public function update(Request $request, Term $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'category_id' => 'required',
            'sub_category_id' => 'required',
        ]);

        $id->name = $request['name'];
        $id->category_id = $request['category_id'];
        $id->subcategory_id = $request['sub_category_id'];
        $id->save();

        return redirect()->route('terms.index')->with('status', 'Успешно изменен!');
    }

    public function delete(Term $id)
    {
        $id->delete();
        return redirect()->route('terms.index')->with('danger', 'Успешно удален!');
    }
}
