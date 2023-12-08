<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Image;
use App\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

class SlidersController extends Controller
{
    protected $paginate;

    public function __construct()
    {
        $this->paginate = 10;
    }

    public function index()
    {
        $paginate = $this->paginate;
        $sliders = Slider::paginate($paginate);

        return view('admin.sliders.index', compact('sliders'));
    }

    public function create()
    {
        return view('admin.sliders.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'url' => 'required',
            'body' => 'required',
            'image' => 'required',
        ]);

        if (Slider::where('name', '=', Input::get('name'))->exists())
        {
            return back()->with('danger', 'Такое название уже существует!');
        }

        $image = Image::store('sliders', $request->file('image'));

        Slider::create([
            'name' => $request['name'],
            'url' => $request['url'],
            'body' => $request['body'],
            'image' => $image
        ]);

        return redirect()->route('slider.index')->with('status', 'Успешно добавлен!');
    }


    public function edit(Slider $slider)
    {
        return view('admin.sliders.edit', compact('slider'));
    }

    public function update(Request $request, Slider $slider)
    {
        $this->validate($request, [
            'name' => 'required',
            'url' => 'required',
            'body' => 'required',
            'image' => 'image',
        ]);

        if ($request['image'])
        {
            Storage::delete($slider->image);
            $image = Image::store('sliders', $request->file('image'));
        }
        if ($request['image'])
        {
            $slider->image = $image;
        }
        $slider->name = $request['name'];
        $slider->url = $request['url'];
        $slider->body = $request['body'];
        $slider->save();

        return redirect()->route('slider.index')->with('status', 'Успешно изменен!');
    }

    public function delete(Slider $slider)
    {
        Storage::delete($slider->image);
        $slider->delete();
        return redirect()->route('slider.index')->with('danger', 'Успешно удален!');
    }
}
