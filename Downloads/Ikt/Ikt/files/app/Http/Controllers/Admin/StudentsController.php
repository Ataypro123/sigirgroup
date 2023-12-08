<?php

namespace App\Http\Controllers\Admin;

use App\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class StudentsController extends Controller
{
    protected $paginate;

    public function __construct()
    {
        $this->paginate = 10;
    }

    public function index()
    {
        $paginate = $this->paginate;
        $students = Student::paginate($paginate);

        return view('admin.students.index', compact('students'));
    }

    public function create()
    {
        return view('admin.students.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        if (Student::where('name', '=', Input::get('name'))->exists())
        {
            return back()->with('danger', 'Такое имя уже существует!');
        }

        Student::create([
            'name' => $request['name']
        ]);

        return redirect()->route('student.index')->with('status', 'Успешно добавлен!');
    }


    public function edit(Student $student)
    {
        return view('admin.students.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $student->name = $request['name'];
        $student->save();

        return redirect()->route('student.index')->with('status', 'Успешно изменен!');
    }

    public function delete(Student $student)
    {
        $student->delete();
        return redirect()->route('student.index')->with('danger', 'Успешно удален!');
    }
}
