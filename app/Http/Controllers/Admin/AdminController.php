<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;


class AdminController extends Controller
{
    public function index()
    {
        alert()->info('سلام','به پنل ادمين خوش آمديد');
        return view('admin.index');
    }

    public function uploadImages($file)
    {
        $year = Carbon::now()->year;
        $month = Carbon::now()->month;
        $imagePath = "upload/images/{$year}/{$month}/";
        $filename = $file->getClientOriginalName();

        $file = $file->move(public_path($imagePath), $filename);
        $sizes = ["300", "600", "900"];
        $url['images'] = $this->resize($file->getRealPath(), $sizes, $imagePath, $filename);

        $url['thumb'] = $url['images'][$sizes[0]];
        
        return $url;
    }

    protected function resize($path, $sizes, $imagePath, $filename)
    {
        $images['original'] = $imagePath . $filename;
        foreach ($sizes as $size) {
            $images[$size] = $imagePath . "{$size}_" . $filename;
            Image::make($path)->resize($size,
                null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path($images[$size]));
        }
        return $images;
    }

    public function uploadVideos($file)
    {
        $year = Carbon::now()->year;
        $month = Carbon::now()->month;
        $videoPath = "/upload/videos/{$year}/{$month}/";
        $filename = $file->getClientOriginalName();

        $file-> move(public_path($videoPath), $filename);
        $file = $videoPath . $filename;
        return $file;
    }

    public function setCourseTime($episode)
    {
        $course = $episode->course;
        $course->time = $this->getCourseTime($course->episode->pluck('time'));
        $course->save();
    }

    public function getCourseTime($times)
    {
        $timestamp = Carbon::parse('00:00:00');
        foreach ($times as $t){
            $time = strlen($t) == 5 ? strtotime('00'.$t):strtotime($t);
            $timestamp->addSecond($time);
        }
        return $timestamp->format('H:i:s');
    }

    public function uploadImageSubject()
    {
        $this->validate(request() , [
            'upload' => 'required|mimes:jpeg,png,bmp',
        ]);

        $year = Carbon::now()->year;
        $month = Carbon::now()->month;
        $imagePath = "/upload/images/{$year}/{$month}/";

        $file = request()->file('upload');
        $filename = $file->getClientOriginalName();

        if(file_exists(public_path($imagePath) . $filename)) {
            $filename = Carbon::now()->timestamp . $filename;
        }

        $file->move(public_path($imagePath) , $filename);
        $url = $imagePath . $filename;

        return "<script>window.parent.CKEDITOR.tools.callFunction(1 , '{$url}' , '')</script>";
    }
    public function uploadUserImages($file)
    {
        $year = Carbon::now()->year;
        $month = Carbon::now()->month;
        $imagePath = "upload/images/users/{$year}/{$month}/";
        $filename = $file->getClientOriginalName();

        $file = $file->move(public_path($imagePath), $filename);
        $url = "upload/images/users/{$year}/{$month}/$filename";
        return $url;
    }
}
