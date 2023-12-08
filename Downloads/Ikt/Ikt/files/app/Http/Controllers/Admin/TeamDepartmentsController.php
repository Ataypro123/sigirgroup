<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Department;
use App\Helpers\Image;
use App\Subcategory;
use App\TeamDepartment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class TeamDepartmentsController extends Controller
{
    protected $categories;
    protected $paginate;
    protected $subCategories;

    public function __construct()
    {
        $this->categories = Category::pluck('name', 'id')->toArray();
        $this->subCategories = Subcategory::all();
        $this->paginate = 15;
    }

    public function index()
    {
        $paginate = $this->paginate;
        $teamDepartments = TeamDepartment::paginate($paginate);
        return view('admin.teamDepartments.index', compact('teamDepartments'));
    }

    public function create()
    {
        $categories = $this->categories;
        return view('admin.teamDepartments.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'category_id' => 'required',
            'sub_category_id' => 'required',
            'status' => 'required',
            'body' => 'required',
        ]);

        $image = Image::store('teamDepartments', $request->file('image'));
        if($request->file('pdf')){
            $pdf = Image::store('teamDepartmentsFiles', $request->file('pdf'));
        } else {
            $pdf = null;
        }

        TeamDepartment::create([
            'name' => $request['name'],
            'body' => $request['body'],
            'status' => $request['status'],
            'pdf' => $pdf,
            'category_id' => $request['category_id'],
            'subcategory_id' => $request['sub_category_id'],
            'image' => $image,
        ]);

        return redirect()->route('teamDepartment.index')->with('status', 'Успешно добавлен!');
    }

    public function edit(TeamDepartment $teamDepartment)
    {
        $categories = $this->categories;
        $subCategories = $this->subCategories;
        return view('admin.teamDepartments.edit', compact('teamDepartment','categories', 'subCategories'));
    }

    public function update(Request $request, TeamDepartment $teamDepartment)
    {
        $this->validate($request, [
            'name' => 'required',
            'category_id' => 'required',
            'sub_category_id' => 'required',
            'status' => 'required',
            'body' => 'required',
        ]);

        if ($request['image'])
        {
            Storage::delete($teamDepartment->image);
            $image = Image::store('teamDepartments', $request->file('image'));
            $teamDepartment->image = $image;
        }

        if($request->file('pdf')){
            Storage::delete($teamDepartment->pdf);
            $pdf = Image::store('teamDepartmentsFiles', $request->file('pdf'));
            $teamDepartment->pdf = $pdf;
        }

        $teamDepartment->name = $request['name'];
        $teamDepartment->category_id = $request['category_id'];
        $teamDepartment->subcategory_id = $request['sub_category_id'];
        $teamDepartment->status = $request['status'];
        $teamDepartment->body = $request['body'];
        $teamDepartment->save();

        return redirect()->route('teamDepartment.index')->with('status', 'Успешно изменен!');
    }

    public function delete(TeamDepartment $teamDepartment)
    {
        Storage::delete($teamDepartment->image);
        Storage::delete($teamDepartment->pdf);
        $teamDepartment->delete();
        return redirect()->route('teamDepartment.index')->with('danger', 'Успешно удален!');
    }

}
