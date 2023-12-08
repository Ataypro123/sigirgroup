<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Department;
use App\FiitBlog;
use App\PhotoCategory;
use App\Student;
use App\SubMenu;
use Illuminate\Http\Request;

class BlogsController extends Controller
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
        return view('pages.blogs.index', compact('departments', 'subMenus' ,'photoCategories', 'students'));
    }

    public function knu()
    {
        $subMenus = $this->subMenus;
        $departments = $this->departments;
        $photoCategories = $this->photoCategories;
        $students = $this->students;
        $blogs = Blog::latest()->get();
        return view('pages.blogs.knu', compact( 'blogs', 'departments', 'subMenus' ,'photoCategories', 'students'));
    }

    public function showKnu(Blog $blog)
    {
        $subMenus = $this->subMenus;
        $departments = $this->departments;
        $photoCategories = $this->photoCategories;
        $students = $this->students;
        return view('pages.blogs.showKnu', compact( 'blog', 'departments', 'subMenus' ,'photoCategories', 'students'));
    }

    public function fiit()
    {
        $subMenus = $this->subMenus;
        $departments = $this->departments;
        $photoCategories = $this->photoCategories;
        $students = $this->students;
        $fiitBlogs = FiitBlog::latest()->get();
        return view('pages.blogs.fiit', compact( 'fiitBlogs', 'departments', 'subMenus' ,'photoCategories', 'students'));
    }

    public function showFiit(FiitBlog $fiitBlog)
    {
        $subMenus = $this->subMenus;
        $departments = $this->departments;
        $photoCategories = $this->photoCategories;
        $students = $this->students;
        return view('pages.blogs.showFiit', compact( 'fiitBlog', 'departments', 'subMenus' ,'photoCategories', 'students'));
    }
}
