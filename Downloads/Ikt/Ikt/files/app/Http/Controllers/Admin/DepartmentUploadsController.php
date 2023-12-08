<?php

namespace App\Http\Controllers\Admin;

use App\DepartmentUpload;
use App\FiitUpload;
use App\Http\Controllers\Controller;
use App\KnuUpload;
use App\Photo;
use Illuminate\Support\Facades\Storage;

class DepartmentUploadsController extends Controller
{
    public function delete(DepartmentUpload $departmentUpload)
    {
        Storage::delete($departmentUpload->uploads);
        $departmentUpload->delete();
        return redirect()->back()->with('danger', 'Успешно удален!');
    }

    public function knu(KnuUpload $knuUpload)
    {
        Storage::delete($knuUpload->uploads);
        $knuUpload->delete();
        return redirect()->back()->with('danger', 'Успешно удален!');
    }

    public function fiit(FiitUpload $fiitUpload)
    {
        Storage::delete($fiitUpload->uploads);
        $fiitUpload->delete();
        return redirect()->back()->with('danger', 'Успешно удален!');
    }

    public function photo(Photo $photo)
    {
        Storage::delete($photo->uploads);
        $photo->delete();
        return redirect()->back()->with('danger', 'Успешно удален!');
    }
}
