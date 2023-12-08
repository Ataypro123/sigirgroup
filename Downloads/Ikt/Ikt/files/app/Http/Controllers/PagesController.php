<?php

namespace App\Http\Controllers;

use App\Block;
use App\Blog;
use App\Category;
use App\Department;
use App\FiitBlog;
use App\PhotoCategory;
use App\Slider;
use App\Student;
use App\SubMenu;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        $students = Student::get();
        $photoCategories = PhotoCategory::get();
        $subMenus = SubMenu::get();
        $blocks = Block::get();
        $blogs = Blog::latest()->take(3)->get();
        $fiitBlogs = FiitBlog::latest()->take(2)->get();
        $sliders = Slider::latest()->take(6)->get();
        $departments = Department::latest()->get();
        $categories = Category::latest()->get();
        $about = SubMenu::where('id', 1)->first();
        return view('pages.index', compact('categories', 'sliders', 'blogs', 'blocks',
            'fiitBlogs', 'subMenus', 'photoCategories', 'students', 'about', 'departments'));
    }
}
