<?php

namespace App\Http\Controllers;

use App\Chart;
use App\ChartContent;
use App\ChartMaterial;
use App\Instruction;
use App\Department;
use App\PhotoCategory;
use App\Student;
use App\SubMenu;
use App\Team;
use Illuminate\Http\Request;

class DepartmentsController extends Controller
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
    public function index()
    {
        $subMenus = $this->subMenus;
        $departments = $this->departments;
        $photoCategories = $this->photoCategories;
        $students = $this->students;
        return view('pages.departments.index', compact('departments', 'subMenus', 'photoCategories', 'students'));
    }

    public function department()
    {
        $subMenus = $this->subMenus;
        $departments = Department::latest()->get();
        $photoCategories = $this->photoCategories;
        $students = $this->students;
        return view('pages.departments.department', compact('departments', 'subMenus', 'photoCategories', 'students'));
    }

    public function guide()
    {
        $teams = Team::get();
        $subMenus = $this->subMenus;
        $departments = $this->departments;
        $photoCategories = $this->photoCategories;
        $students = $this->students;
        return view('pages.departments.guide', compact('departments', 'teams', 'subMenus', 'photoCategories', 'students'));
    }

    public function process()
    {
        $departments = $this->departments;
        $subMenus = $this->subMenus;
        $photoCategories = $this->photoCategories;
        $students = $this->students;
        $charts = Chart::get();
        return view('pages.departments.process', compact('departments', 'subMenus', 'photoCategories', 'students', 'charts'));
    }
    
    public function instruction()
    {
        $departments = $this->departments;
        $subMenus = $this->subMenus;
        $photoCategories = $this->photoCategories;
        $students = $this->students;
        $instructions = Instruction::get();
        return view('pages.departments.instruction', compact('departments', 'subMenus', 'photoCategories', 'students', 'instructions'));
    }

    public function chart(Chart $chart)
    {
        $departments = $this->departments;
        $subMenus = $this->subMenus;
        $photoCategories = $this->photoCategories;
        $students = $this->students;
        return view('pages.departments.chart', compact('departments', 'subMenus', 'photoCategories', 'students', 'chart'));
    }
    
    public function chartMaterial(Chart $chart, ChartContent $chartMaterial)
    {
        $departments = $this->departments;
        $subMenus = $this->subMenus;
        $photoCategories = $this->photoCategories;
        $students = $this->students;
        return view('pages.departments.chartMaterial', compact('departments', 'subMenus', 'photoCategories', 'students', 'chart', 'chartMaterial'));
    }



    public function subMenu(SubMenu $subMenu)
    {
        $departments = $this->departments;
        $subMenus = $this->subMenus;
        $photoCategories = $this->photoCategories;
        $students = $this->students;
        return view('pages.departments.subMenu', compact('subMenu', 'departments', 'subMenus', 'photoCategories', 'students'));
    }

    public function show(Department $department)
    {
        $departments = Department::get();
        $subMenus = $this->subMenus;
        $photoCategories = $this->photoCategories;
        $students = $this->students;
        return view('pages.departments.show', compact( 'departments', 'department', 'subMenus', 'photoCategories', 'students'));
    }
    
    public function programs()
    {
        $departments = Department::get();
        $subMenus = $this->subMenus;
        $photoCategories = $this->photoCategories;
        $students = $this->students;
        return view('pages.departments.programs', compact( 'departments', 'subMenus', 'photoCategories', 'students'));
    }

    public function program(Department $department)
    {
        $departments = Department::get();
        $subMenus = $this->subMenus;
        $photoCategories = $this->photoCategories;
        $students = $this->students;
        return view('pages.departments.program', compact( 'subMenus', 'photoCategories', 'students', 'department', 'departments'));
    }
}
