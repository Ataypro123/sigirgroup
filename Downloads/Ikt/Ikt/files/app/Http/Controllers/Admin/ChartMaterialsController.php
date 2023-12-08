<?php

namespace App\Http\Controllers\Admin;

use App\Chart;
use App\ChartContent;
use App\ChartMaterial;
use App\Helpers\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ChartMaterialsController extends Controller
{
    protected $charts;
    protected $chartContents;
    protected $paginate;

    public function __construct()
    {
        $this->charts = Chart::pluck('name', 'id')->toArray();
        $this->chartContents = ChartContent::pluck('name', 'id')->toArray();
        $this->paginate = 15;
    }

    public function index()
    {
        $paginate = $this->paginate;
        $chartMaterials = ChartMaterial::paginate($paginate);

        return view('admin.chartMaterials.index', compact('chartMaterials'));
    }

    public function create()
    {
        $charts = $this->charts;
        $chartContents = $this->chartContents;
        return view('admin.chartMaterials.create', compact('charts', 'chartContents'));
    }

    public function selectAjax(Request $request)
    {
        if($request->ajax()){
            $chartContents = ChartContent::where('chart_id', '=', $request->chart_id)->pluck("name","id")->all();
            $data = view('admin.include.ajax-select',compact('chartContents'))->render();
            return response()->json(['options'=>$data]);
        }
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'chart_content_id' => 'required',
            'name' => 'required',
            'pdf' => 'required',
        ]);

        if($request->file('pdf')){
            $pdf = Image::store('chartMaterialsFiles', $request->file('pdf'));
        } else {
            $pdf = null;
        }

        ChartMaterial::create([
            'name' => $request['name'],
            'chart_content_id' => $request['chart_content_id'],
            'body' => $request['body'],
            'pdf' => $pdf,
        ]);

        return redirect()->route('chartMaterial.index')->with('status', 'Успешно добавлен!');
    }


    public function edit(ChartMaterial $id)
    {
        $charts = $this->charts;
        $chartContents = $this->chartContents;
        return view('admin.chartMaterials.edit', compact('id','charts', 'chartContents'));
    }

    public function update(Request $request, ChartMaterial $id)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
        $id->name = $request['name'];
        $id->chart_content_id = $request['chart_content_id'];
        $id->body = $request['body'];
        if($request->file('pdf')){
            Storage::delete($id->pdf);
            $pdf = Image::store('chartMaterialsFiles', $request->file('pdf'));
        }
        if ($request->file('pdf'))
        {
            $id->pdf = $pdf;
        }
        $id->save();
        return redirect()->route('chartMaterial.index')->with('status', 'Успешно изменен!');
    }

    public function update2(Request $request, ChartMaterial $id)
    {
        $id->chart_content_id = $request['chart_content_id'];
        $id->save();

        return redirect()->route('chartMaterial.index')->with('status', 'Успешно изменен!');
    }

    public function delete(ChartMaterial $id)
    {
        Storage::delete($id->pdf);
        $id->delete();
        return redirect()->route('chartMaterial.index')->with('danger', 'Успешно удален!');
    }
}
