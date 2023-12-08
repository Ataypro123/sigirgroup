<?php

namespace App\Http\Controllers\Admin;

use App\Blog;
use App\Helpers\Image;
use App\KnuUpload;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

class BlogsController extends Controller
{
    protected $paginate;

    public function __construct()
    {
        $this->paginate = 10;
    }

    public function index()
    {
        $paginate = $this->paginate;
        $blogs = Blog::paginate($paginate);

        return view('admin.blogs.index', compact('blogs'));
    }

    public function create()
    {
        return view('admin.blogs.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'url' => 'required',
            'name' => 'required',
            'body' => 'required',
            'image' => 'required',
        ]);

        if (Blog::where('name', '=', Input::get('name'))->exists())
        {
            return back()->with('danger', 'Такое название уже существует!');
        }

        $image = Image::store('blogs', $request->file('image'));

        $blog = Blog::create([
            'url' => $request['url'],
            'name' => $request['name'],
            'body' => $request['body'],
            'image' => $image
        ]);

        if($request->file('uploads'))
        {
            $knuUploads = $request->file('uploads');

            foreach ($knuUploads as $uploads)
            {
                $image = Image::store('knuUploads', $uploads);
                KnuUpload::create([
                    'uploads' => $image,
                    'blog_id' => $blog->id,
                ]);
            }
        }

        return redirect()->route('blog.index')->with('status', 'Успешно добавлен!');
    }


    public function edit(Blog $blog)
    {
        return view('admin.blogs.edit', compact('blog'));
    }

    public function update(Request $request, Blog $blog)
    {
        $this->validate($request, [
            'url' => 'required',
            'name' => 'required',
            'body' => 'required',
            'image' => 'image',
        ]);

        if ($request['image'])
        {
            Storage::delete($blog->image);
            $image = Image::store('blogs', $request->file('image'));
        }
        if ($request['image'])
        {
            $blog->image = $image;
        }
        $blog->url = $request['url'];
        $blog->name = $request['name'];
        $blog->body = $request['body'];
        if($request->file('uploads'))
        {
            $knuUploads = $request->file('uploads');

            foreach ($knuUploads as $uploads)
            {
                $image = Image::store('knuUploads', $uploads);
                KnuUpload::create([
                    'uploads' => $image,
                    'blog_id' => $blog->id,
                ]);
            }
        }
        $blog->save();

        return redirect()->route('blog.index')->with('status', 'Успешно изменен!');
    }

    public function delete(Blog $blog)
    {
        Storage::delete($blog->image);
        $blog->delete();
        return redirect()->route('blog.index')->with('danger', 'Успешно удален!');
    }
}
