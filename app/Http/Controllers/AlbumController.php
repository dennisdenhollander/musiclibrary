<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Album;
use App\Band;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\URL;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bands=Band::all()->keyBy('name');
        return view('albums.list')->with('bands', $bands);
    }

    public function populate($band = null)
    {

        if($band) {
            $albums = Album::where('band_id',$band)->get();
        } else {
            $albums = Album::all();
        }

        foreach($albums as $album){
            $album->bandname = $album->band->name;
        }
        return Datatables::of($albums)
            ->addColumn('action', function ($album) {
                return '<a href="'.URL::to('/').'/album/'.$album->id.'/edit">Edit</a>&nbsp;&nbsp;<a href="'.URL::to('/').'/album/'.$album->id.'/destroy">Delete</a>';
            })
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bands=Band::all();
        return view('albums.new')->with('bands', $bands);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'band_id' => 'required'
        ]);
        $album=new Album();
        $album->band_id = $request->band_id;
        $album->name = $request->name;
        $album->recorded_date = $request->recorded_date;
        $album->release_date = $request->release_date;
        $album->number_of_tracks = $request->number_of_tracks ?: 0;
        $album->label = $request->label;
        $album->producer = $request->producer;
        $album->genre = $request->genre;
        $album->save();
        return redirect('album');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $album=Album::find($id);
        $bands=Band::all()->keyBy('name');
        return view('albums.edit')->with('album', $album)->with('bands', $bands);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'band_id' => 'required'
        ]);
        $album=Album::find($id);
        $album->band_id = $request->band_id;
        $album->name = $request->name;
        $album->recorded_date = $request->recorded_date;
        $album->release_date = $request->release_date;
        $album->number_of_tracks = $request->number_of_tracks ?: 0;
        $album->label = $request->label;
        $album->producer = $request->producer;
        $album->genre = $request->genre;
        $album->save();
        return redirect('album');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $album=Album::find($id);
        $album->destroy($id);
        return redirect('album');
    }
}
