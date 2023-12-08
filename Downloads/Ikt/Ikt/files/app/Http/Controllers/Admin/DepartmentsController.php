<?php

namespace App\Http\Controllers\Admin;

use App\Department;
use App\DepartmentUpload;
use App\Helpers\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

class DepartmentsController extends Controller
{
    protected $paginate;

    public function __construct()
    {
        $this->paginate = 10;
    }

    public function index()
    {
        $paginate = $this->paginate;
        $departments = Department::paginate($paginate);

        return view('admin.departments.index', compact('departments'));
    }

    public function create()
    {
        return view('admin.departments.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'body' => 'required',
            'image' => 'required',
        ]);

        if (Department::where('name', '=', Input::get('name'))->exists())
        {
            return back()->with('danger', 'Такая кафедра уже существует!');
        }

        $image = Image::store('departments', $request->file('image'));

        $department = Department::create([
            'name' => $request['name'],
            'body' => $request['body'],
            'image' => $image
        ]);

        if($request->file('uploads'))
        {
            $departmentUploads = $request->file('uploads');

            foreach ($departmentUploads as $uploads)
            {
                $image = Image::store('departmentUploads', $uploads);
                DepartmentUpload::create([
                    'uploads' => $image,
                    'department_id' => $department->id,
                ]);
            }
        }

        return redirect()->route('department.index')->with('status', 'Успешно добавлен!');
    }


    public function edit(Department $department)
    {
        return view('admin.departments.edit', compact('department'));
    }

    public function update(Request $request, Department $department)
    {
        $this->validate($request, [
            'name' => 'required',
            'body' => 'required',
            'image' => 'image',
        ]);

        if ($request['image'])
        {
            Storage::delete($department->image);
            $image = Image::store('departments', $request->file('image'));
        }
        if ($request['image'])
        {
            $department->image = $image;
        }
        $department->name = $request['name'];
        $department->body = $request['body'];

        if ($request->file('uploads'))
        {
            $departmentUploads = $request->file('uploads');

            foreach ($departmentUploads as $uploads)
            {
                $image = Image::store('departmentUploads', $uploads);
                DepartmentUpload::create([
                    'uploads' => $image,
                    'department_id' => $department->id,
                ]);
            }
        }

        $department->save();

        return redirect()->route('department.index')->with('status', 'Успешно изменен!');
    }

    public function delete(Department $department)
    {
        Storage::delete($department->image);
        $department->delete();
        return redirect()->route('department.index')->with('danger', 'Успешно удален!');
    }
}
