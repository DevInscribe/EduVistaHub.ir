<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Episode;
use App\Http\Requests\EpisodeRequest;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Http\Request;

class EpisodeController extends AdminController
{
    public function __construct(){
        $this->middleware('can:create_episode')->only(['create']);
        $this->middleware('can:delete_episode')->only(['destroy']);
        $this->middleware('can:edit_episode')->only(['edit','update']);
        $this->middleware('can:show_episodes')->only(['index']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $episodes = Episode::query();
        if($keyword = request('search')){
                $episodes-> where('title','like',"%$keyword%")->orWhere('body','like',"%$keyword%")
                ->orWhere('id',$keyword);
        }

        $episodes = $episodes->latest()->paginate(100);
        return view('admin.episodes.index',compact('episodes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.episodes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EpisodeRequest $request)
    {
        $videoUrl = $this->uploadVideos($request->file('videos'));
        if ($videoUrl) {
            $episodes = Episode::create(array_merge($request->all(), ['videos' => $videoUrl]));
        } else {
            $episodes = Episode::create($request->all());
        }

        $this->setCourseTime($episodes);

        return redirect(url('/admin/episodes'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Episode $episode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $episode = Episode::find($id);
        return view('admin.episodes.edit', compact('episode'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $file = $request->file('videos');
        $episode = Episode::find($id);

        $inputs = $request->all();
        if ($file) {
            $inputs['videos'] = $this->uploadVideos($request->file('videos'));
        }

        $episode->update($inputs);
        $this->setCourseTime($episode);

        return redirect(route('admin.episodes.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $episode = Episode::find($id);
        $episode-> delete();

        return redirect(route('admin.episodes.index'));
    }
}
