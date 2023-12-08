<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Image;
use App\Instruction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

class InstructionsController extends Controller
{
    protected $paginate;

    public function __construct()
    {
        $this->paginate = 10;
    }

    public function index()
    {
        $paginate = $this->paginate;
        $instructions = Instruction::paginate($paginate);

        return view('admin.instructions.index', compact('instructions'));
    }

    public function create()
    {
        return view('admin.instructions.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        if (Instruction::where('name', '=', Input::get('name'))->exists())
        {
            return back()->with('danger', 'Такое название уже существует!');
        }

        if($request->file('video'))
        {
            $image = Image::store('instructions', $request->file('video'));
        } else {
            $image = null;
        }

        Instruction::create([
            'name' => $request['name'],
            'url' => $request['url'],
            'video' => $image
        ]);

        return redirect()->route('instruction.index')->with('status', 'Успешно добавлен!');
    }


    public function edit(Instruction $instruction)
    {
        return view('admin.instructions.edit', compact('instruction'));
    }

    public function update(Request $request, Instruction $instruction)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        if ($request['video'])
        {
            Storage::delete($instruction->video);
            $image = Image::store('instructions', $request->file('video'));
        }
        if ($request['video'])
        {
            $instruction->video = $image;
        }
        $instruction->url = $request['url'];
        $instruction->name = $request['name'];
        $instruction->save();

        return redirect()->route('instruction.index')->with('status', 'Успешно изменен!');
    }

    public function delete(Instruction $instruction)
    {
        Storage::delete($instruction->video);
        $instruction->delete();
        return redirect()->route('instruction.index')->with('danger', 'Успешно удален!');
    }
}
