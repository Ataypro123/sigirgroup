<?php

namespace App\Http\Controllers;

use App\Department;
use App\PhotoCategory;
use App\Student;
use App\SubMenu;
use Illuminate\Http\Request;

class PhotosController extends Controller
{
    protected $departments;
    protected $subMenus;
    protected $photoCategories;
    protected $students;

    public function __construct()
    {
        $this->departments = Department::latest()->get();
        $this->subMenus = SubMenu::get();
        $this->photoCategories = PhotoCategory::get();
        $this->students = Student::get();
    }

    public function show(PhotoCategory $photoCategory)
    {
        $photoCategories = $this->photoCategories;
        $departments = $this->departments;
        $students = $this->students;
        $subMenus = $this->subMenus;
        return view('pages.photos.show', compact( 'departments', 'photoCategory', 'subMenus', 'photoCategories', 'students'));
    }

    public function student(PhotoCategory $photoCategory, Student $student)
    {
        $photoCategories = $this->photoCategories;
        $departments = $this->departments;
        $subMenus = $this->subMenus;
        $students = $this->students;
        return view('pages.photos.student', compact( 'departments', 'photoCategory', 'subMenus', 'photoCategories', 'student', 'students'));
    }
}
