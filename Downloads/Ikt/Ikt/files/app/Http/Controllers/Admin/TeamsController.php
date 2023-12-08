<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Image;
use App\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class TeamsController extends Controller
{
    protected $paginate;

    public function __construct()
    {
        $this->paginate = 15;
    }

    public function index()
    {
        $paginate = $this->paginate;
        $teams = Team::paginate($paginate);
        return view('admin.teams.index', compact('teams'));
    }

    public function create()
    {
        return view('admin.teams.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'image' => 'required|image',
            'status' => 'required',
            'body' => 'required',
        ]);

        $image = Image::store('teams', $request->file('image'));
        if($request->file('pdf')){
            $pdf = Image::store('teamsFiles', $request->file('pdf'));
        } else {
            $pdf = null;
        }

        Team::create([
            'name' => $request['name'],
            'body' => $request['body'],
            'status' => $request['status'],
            'pdf' => $pdf,
            'image' => $image,
        ]);

        return redirect()->route('team.index')->with('status', 'Успешно добавлен!');
    }

    public function edit(Team $team)
    {
        return view('admin.teams.edit', compact('team'));
    }

    public function update(Request $request, Team $team)
    {
        $this->validate($request, [
            'name' => 'required',
            'image' => 'image',
            'status' => 'required',
            'body' => 'required',
        ]);

        if ($request['image'])
        {
            Storage::delete($team->image);
            $image = Image::store('teams', $request->file('image'));
        }

        if($request->file('pdf')){
            Storage::delete($team->pdf);
            $pdf = Image::store('teamsFiles', $request->file('pdf'));
        }

        $team->name = $request['name'];
        $team->status = $request['status'];
        $team->body = $request['body'];

        if ($request['image'])
        {
            $team->image = $image;
        }
        if ($request->file('pdf'))
        {
            $team->pdf = $pdf;
        }

        $team->save();
        return redirect()->route('team.index')->with('status', 'Успешно изменен!');
    }

    public function delete(Team $team)
    {
        Storage::delete($team->image);
        Storage::delete($team->pdf);
        $team->delete();
        return redirect()->route('team.index')->with('danger', 'Успешно удален!');
    }
}
