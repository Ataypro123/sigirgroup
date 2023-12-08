<?php

namespace App\Http\Controllers\Admin;

use App\Department;
use App\Helpers\Image;
use App\Program;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProgramsController extends Controller
{
    protected $departments;
    protected $paginate;

    public function __construct()
    {
        $this->departments = Department::pluck('name', 'id')->toArray();
        $this->paginate = 15;
    }

    public function index()
    {
        $paginate = $this->paginate;
        $programs = Program::paginate($paginate);
        return view('admin.programs.index', compact('programs'));
    }

    public function create()
    {
        $departments = $this->departments;
        return view('admin.programs.create', compact('departments'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'department_id' => 'required',
            'pdf' => 'required',
        ]);

        if($request->file('pdf'))
        {
            $programPdf = $request->file('pdf');

            foreach ($programPdf as $files)
            {
                $pdf = Image::store('DepartmentsProgramsFiles', $files);
                Program::create([
                    'pdf' => $pdf,
                    'department_id' => $request['department_id'],
                    'name' => substr($pdf, 25, -4),
                ]);
            }
        }

        return redirect()->route('programs.index')->with('status', 'Успешно добавлен!');
    }

    public function edit(Program $id)
    {
        $departments = $this->departments;
        return view('admin.programs.edit', compact('id','departments'));
    }

    public function update(Request $request, Program $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'department_id' => 'required',
        ]);

        if($request->file('pdf')){
            Storage::delete($id->pdf);
            $pdf = Image::store('DepartmentsProgramsFiles', $request->file('pdf'));
        }

        if ($request->file('pdf'))
        {
            $id->pdf = $pdf;
        }

        $id->name = $request['name'];
        $id->department_id = $request['department_id'];
        $id->save();

        return redirect()->route('programs.index')->with('status', 'Успешно изменен!');
    }

    public function delete(Program $id)
    {
        Storage::delete($id->pdf);
        $id->delete();
        return redirect()->route('programs.index')->with('danger', 'Успешно удален!');
    }
}
