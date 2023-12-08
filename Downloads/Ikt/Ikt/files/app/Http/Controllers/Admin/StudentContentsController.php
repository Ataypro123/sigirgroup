<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Image;
use App\Student;
use App\StudentContent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class StudentContentsController extends Controller
{
    protected $students;
    protected $paginate;

    public function __construct()
    {
        $this->students = Student::pluck('name', 'id')->toArray();
        $this->paginate = 10;
    }

    public function index()
    {
        $paginate = $this->paginate;
        $mStudentContents = StudentContent::where('role', 'Молодежный комитет')->latest()->paginate($paginate);
        $aStudentContents = StudentContent::where('role', '!=', 'Молодежный комитет')->latest()->paginate($paginate);

        return view('admin.studentContents.index', compact('mStudentContents', 'aStudentContents'));
    }

    public function create()
    {
        $students = $this->students;

        return view('admin.studentContents.create', compact('students'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'student_id' => 'required',
            'name' => 'required',
            'status' => 'required',
            'course' => 'required',
        ]);

        StudentContent::create([
            'name' => $request['name'],
            'status' => $request['status'],
            'student_id' => $request['student_id'],
            'course' => $request['course'],
            'role' => $request['role'],
            'body' => null,
            'image' => null,
        ]);

        return redirect()->route('studentContent.index')->with('status', 'Успешно добавлен!');
    }

    public function store2(Request $request)
    {
        $this->validate($request, [
            'student_id' => 'required',
            'name' => 'required',
            'body' => 'required',
        ]);

        if ($request->file('image'))
        {
            $image = Image::store('studentContents', $request->file('image'));
        } else {
            $image = null;
        }

        StudentContent::create([
            'name' => $request['name'],
            'status' => null,
            'student_id' => $request['student_id'],
            'course' => null,
            'role' => $request['role'],
            'body' => $request['body'],
            'image' => $image,
        ]);

        return redirect()->route('studentContent.index')->with('status', 'Успешно добавлен!');
    }

    public function store3(Request $request)
    {
        $this->validate($request, [
            'student_id' => 'required',
            'name' => 'required',
            'body' => 'required',
        ]);

        StudentContent::create([
            'name' => $request['name'],
            'status' => null,
            'student_id' => $request['student_id'],
            'course' => null,
            'role' => $request['role'],
            'body' => $request['body'],
            'image' => null,
        ]);

        return redirect()->route('studentContent.index')->with('status', 'Успешно добавлен!');
    }


    public function edit(StudentContent $studentContent)
    {
        $students = $this->students;

        return view('admin.studentContents.edit', compact('studentContent','students'));
    }

    public function update(Request $request, StudentContent $studentContent)
    {
        $this->validate($request, [
            'image' => 'image',
        ]);

        $studentContent->name = $request['name'];
        $studentContent->student_id = $request['student_id'];
        $studentContent->status = $request['status'];
        $studentContent->course = $request['course'];
        $studentContent->role = $request['role'];
        $studentContent->body = $request['body'];
        if ($request['image'])
        {
            Storage::delete($studentContent->image);
            $image = Image::store('studentContents', $request->file('image'));
        } else {
            $image = null;
        }
        if ($request['image'])
        {
            $studentContent->image = $image;
        }
        $studentContent->save();

        return redirect()->route('studentContent.index')->with('status', 'Успешно изменен!');
    }

    public function delete(StudentContent $studentContent)
    {
        Storage::delete($studentContent->image);
        $studentContent->delete();
        return redirect()->route('studentContent.index')->with('danger', 'Успешно удален!');
    }
}
