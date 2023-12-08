<?php

namespace App\Http\Controllers\Admin;

use App\FiitBlog;
use App\FiitUpload;
use App\Helpers\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

class FiitBlogsController extends Controller
{
    protected $paginate;

    public function __construct()
    {
        $this->paginate = 10;
    }

    public function index()
    {
        $paginate = $this->paginate;
        $fiitBlogs = FiitBlog::paginate($paginate);

        return view('admin.fiitBlogs.index', compact('fiitBlogs'));
    }

    public function create()
    {
        return view('admin.fiitBlogs.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'body' => 'required',
            'image' => 'required',
        ]);

        if (FiitBlog::where('name', '=', Input::get('name'))->exists())
        {
            return back()->with('danger', 'Такое название уже существует!');
        }

        $image = Image::store('fiitBlogs', $request->file('image'));

        $fiitBlog = FiitBlog::create([
            'name' => $request['name'],
            'body' => $request['body'],
            'image' => $image
        ]);

        if($request->file('uploads'))
        {
            $fiitUploads = $request->file('uploads');

            foreach ($fiitUploads as $uploads)
            {
                $image = Image::store('fiitUploads', $uploads);
                FiitUpload::create([
                    'uploads' => $image,
                    'fiit_blog_id' => $fiitBlog->id,
                ]);
            }
        }

        return redirect()->route('fiitBlog.index')->with('status', 'Успешно добавлен!');
    }


    public function edit(FiitBlog $fiitBlog)
    {
        return view('admin.fiitBlogs.edit', compact('fiitBlog'));
    }

    public function update(Request $request, FiitBlog $fiitBlog)
    {
        $this->validate($request, [
            'name' => 'required',
            'body' => 'required',
            'image' => 'image',
        ]);

        if ($request['image'])
        {
            Storage::delete($fiitBlog->image);
            $image = Image::store('fiitBlogs', $request->file('image'));
        }
        if ($request['image'])
        {
            $fiitBlog->image = $image;
        }
        $fiitBlog->name = $request['name'];
        $fiitBlog->body = $request['body'];
        if($request->file('uploads'))
        {
            $fiitUploads = $request->file('uploads');

            foreach ($fiitUploads as $uploads)
            {
                $image = Image::store('fiitUploads', $uploads);
                FiitUpload::create([
                    'uploads' => $image,
                    'fiit_blog_id' => $fiitBlog->id,
                ]);
            }
        }
        $fiitBlog->save();

        return redirect()->route('fiitBlog.index')->with('status', 'Успешно изменен!');
    }

    public function delete(FiitBlog $fiitBlog)
    {
        Storage::delete($fiitBlog->image);
        $fiitBlog->delete();
        return redirect()->route('fiitBlog.index')->with('danger', 'Успешно удален!');
    }
}
