<?php

namespace App\Http\Controllers;

use App\Department;
use App\PhotoCategory;
use App\Student;
use App\SubMenu;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    protected $departments;
    protected $subMenus;
    protected $photoCategories;
    protected $students;

    public function __construct()
    {
        $this->subMenus = SubMenu::get();
        $this->departments = Department::latest()->get();
        $this->photoCategories = PhotoCategory::get();
        $this->students = Student::get();
    }
    public function index()
    {
        $subMenus = $this->subMenus;
        $departments = $this->departments;
        $photoCategories = $this->photoCategories;
        $students = $this->students;
        return view('pages.contacts.index', compact('departments', 'subMenus', 'photoCategories', 'students'));
    }
}
