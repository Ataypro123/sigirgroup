<?php

namespace App\Http\Controllers\Admin;

use App\Block;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class BlocksController extends Controller
{
    protected $paginate;

    public function __construct()
    {
        $this->paginate = 10;
    }

    public function index()
    {
        $paginate = $this->paginate;
        $blocks = Block::paginate($paginate);

        return view('admin.blocks.index', compact('blocks'));
    }

    public function create()
    {
        return view('admin.blocks.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'number' => 'required',
            'url' => 'required',
        ]);

        if (Block::where('name', '=', Input::get('name'))->exists())
        {
            return back()->with('danger', 'Такое имя уже существует!');
        }

        Block::create([
            'name' => $request['name'],
            'body' => $request['body'],
            'number' => $request['number'],
            'url' => $request['url'],
        ]);

        return redirect()->route('block.index')->with('status', 'Успешно добавлен!');
    }


    public function edit(Block $block)
    {
        return view('admin.blocks.edit', compact('block'));
    }

    public function update(Request $request, Block $block)
    {
        $this->validate($request, [
            'name' => 'required',
            'number' => 'required',
            'url' => 'required',
        ]);

        $block->name = $request['name'];
        $block->body = $request['body'];
        $block->number = $request['number'];
        $block->url = $request['url'];
        $block->save();

        return redirect()->route('block.index')->with('status', 'Успешно изменен!');
    }

    public function delete(Block $block)
    {
        $block->delete();
        return redirect()->route('block.index')->with('danger', 'Успешно удален!');
    }
}
