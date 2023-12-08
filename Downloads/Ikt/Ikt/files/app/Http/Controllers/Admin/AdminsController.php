<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class AdminsController extends Controller
{
    protected $paginate;

    public function __construct()
    {
        $this->paginate = 10;
    }

    public function index()
    {
        $paginate = $this->paginate;
        $admins = Admin::OrderBy('name', 'asc', mb_substr(0, 1))->paginate($paginate);

        return view('admin.admins.index', compact('admins'));
    }

    public function create()
    {
        return view('admin.admins.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins,email',
            'role' => 'required',
            'password' => 'sometimes|nullable|string|min:4|confirmed',
        ]);

        if (Admin::where('email', '=', Input::get('email'))->exists())
        {
            return back()->with('danger', 'Администратор с таким email уже существует!');
        }

        if(Auth::guard('admin')->user()->role == 0){
            Admin::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'role' => $request['role'],
                'password' => bcrypt($request['password'])
            ]);
        } else {
            return back()->with('danger', 'У вас нет права!');
        }

        return redirect()->route('administrator.index')->with('status', 'Успешно добавлен!');
    }

    public function edit(Admin $id)
    {
        return view('admin.admins.edit', compact('id'));
    }

    public function update(Request $request, Admin $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'role' => 'required',
            'password' => 'sometimes|nullable|string|min:4|confirmed',
        ]);

        $id->name = $request['name'];
        $id->email = $request['email'];
        $id->role = $request['role'];

        if ($request['password'])
        {
            $id->password = bcrypt($request['password']);
        }

        if(Auth::guard('admin')->user()->role == 0)
        {
            $id->save();
        }
        else {
            return back()->with('danger', 'У вас нет права!');
        }

        return redirect()->route('administrator.index')->with('status', 'Успешно изменен!');
    }

    public function delete(Admin $id)
    {
        if(Auth::guard('admin')->user()->role == 0)
        {
            $id->delete();
        } else {
            return back()->with('danger', 'У вас нет права!');
        }

        return redirect()->route('administrator.index')->with('danger', 'Успешно удален!');
    }
}
