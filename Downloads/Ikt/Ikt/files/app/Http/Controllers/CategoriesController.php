<?php

namespace App\Http\Controllers;

use App\Category;
use App\Chart;
use App\ChartContent;
use App\Department;
use App\Instruction;
use App\PhotoCategory;
use App\Student;
use App\Subcategory;
use App\SubMenu;
use App\Team;
use Illuminate\Http\Request;

class CategoriesController extends Controller
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

    public function category($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $categories = Category::get();
        $subMenus = $this->subMenus;
        $photoCategories = $this->photoCategories;
        $students = $this->students;
        return view('pages.categories.show', compact( 'categories', 'category', 'subMenus', 'photoCategories', 'students'));
    }

    public function subCategory($slug, $id)
    {
        $category = Category::where('slug', $slug)->first();
        $subCategory = Subcategory::where('id', $id)->first();
        $categories = Category::get();
        $subMenus = $this->subMenus;
        $photoCategories = $this->photoCategories;
        $students = $this->students;
        return view('pages.categories.subCategory', compact( 'categories', 'category', 'subCategory', 'subMenus', 'photoCategories', 'students'));
    }
}
