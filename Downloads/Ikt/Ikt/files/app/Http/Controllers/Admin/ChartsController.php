<?php

namespace App\Http\Controllers\Admin;

use App\Chart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class ChartsController extends Controller
{
    protected $paginate;

    public function __construct()
    {
        $this->paginate = 10;
    }

    public function index()
    {
        $paginate = $this->paginate;
        $charts = Chart::paginate($paginate);

        return view('admin.charts.index', compact('charts'));
    }

    public function create()
    {
        return view('admin.charts.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        if (Chart::where('name', '=', Input::get('name'))->exists())
        {
            return back()->with('danger', 'Такое имя уже существует!');
        }

        Chart::create([
            'name' => $request['name']
        ]);

        return redirect()->route('chart.index')->with('status', 'Успешно добавлен!');
    }


    public function edit(Chart $chart)
    {
        return view('admin.charts.edit', compact('chart'));
    }

    public function update(Request $request, Chart $chart)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $chart->name = $request['name'];
        $chart->save();

        return redirect()->route('chart.index')->with('status', 'Успешно изменен!');
    }

    public function delete(Chart $chart)
    {
        $chart->delete();
        return redirect()->route('chart.index')->with('danger', 'Успешно удален!');
    }
}
