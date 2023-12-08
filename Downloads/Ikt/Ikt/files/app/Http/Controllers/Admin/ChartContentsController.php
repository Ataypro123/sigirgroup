<?php

namespace App\Http\Controllers\Admin;

use App\Chart;
use App\ChartContent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChartContentsController extends Controller
{
    protected $charts;
    protected $paginate;

    public function __construct()
    {
        $this->charts = Chart::pluck('name', 'id')->toArray();
        $this->paginate = 15;
    }

    public function index()
    {
        $paginate = $this->paginate;
        $chartContents = ChartContent::paginate($paginate);

        return view('admin.chartContents.index', compact('chartContents'));
    }

    public function create()
    {
        $charts = $this->charts;
        return view('admin.chartContents.create', compact('charts'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'chart_id' => 'required',
            'name' => 'required',
        ]);

        ChartContent::create([
            'name' => $request['name'],
            'chart_id' => $request['chart_id'],
        ]);

        return redirect()->route('chartContent.index')->with('status', 'Успешно добавлен!');
    }


    public function edit(ChartContent $id)
    {
        $charts = $this->charts;
        return view('admin.chartContents.edit', compact('id','charts'));
    }

    public function update(Request $request, ChartContent $id)
    {
        $this->validate($request, [
            'chart_id' => 'required',
            'name' => 'required',
        ]);
        $id->name = $request['name'];
        $id->chart_id = $request['chart_id'];
        $id->save();
        return redirect()->route('chartContent.index')->with('status', 'Успешно изменен!');
    }

    public function delete(ChartContent $id)
    {
        $id->delete();
        return redirect()->route('chartContent.index')->with('danger', 'Успешно удален!');
    }
}
