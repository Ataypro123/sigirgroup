<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Image;
use App\SubMenu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class SubMenusController extends Controller
{
    protected $paginate;

    public function __construct()
    {
        $this->paginate = 15;
    }

    public function index()
    {
        $paginate = $this->paginate;
        $subMenus = SubMenu::paginate($paginate);
        return view('admin.subMenus.index', compact('subMenus'));
    }

    public function create()
    {
        return view('admin.subMenus.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'image' => 'image',
            'body' => 'required',
        ]);

        if ($request->file('image'))
        {
            $image = Image::store('subMenus', $request->file('image'));
        }else {
            $image = null;
        }
        if($request->file('pdf')){
            $pdf = Image::store('subMenusFiles', $request->file('pdf'));
        } else {
            $pdf = null;
        }

        SubMenu::create([
            'name' => $request['name'],
            'body' => $request['body'],
            'pdf' => $pdf,
            'image' => $image,
        ]);

        return redirect()->route('subMenu.index')->with('status', 'Успешно добавлен!');
    }

    public function edit(SubMenu $subMenu)
    {
        return view('admin.subMenus.edit', compact('subMenu'));
    }

    public function update(Request $request, SubMenu $subMenu)
    {
        $this->validate($request, [
            'name' => 'required',
            'image' => 'image',
            'body' => 'required',
        ]);

        if ($request['image'])
        {
            Storage::delete($subMenu->image);
            $image = Image::store('subMenus', $request->file('image'));
        }

        if($request->file('pdf')){
            Storage::delete($subMenu->pdf);
            $pdf = Image::store('subMenusFiles', $request->file('pdf'));
        }

        $subMenu->name = $request['name'];
        $subMenu->body = $request['body'];

        if ($request['image'])
        {
            $subMenu->image = $image;
        }
        if ($request->file('pdf'))
        {
            $subMenu->pdf = $pdf;
        }

        $subMenu->save();
        return redirect()->route('subMenu.index')->with('status', 'Успешно изменен!');
    }

    public function delete(SubMenu $subMenu)
    {
        Storage::delete($subMenu->image);
        Storage::delete($subMenu->pdf);
        $subMenu->delete();
        return redirect()->route('subMenu.index')->with('danger', 'Успешно удален!');
    }
}
