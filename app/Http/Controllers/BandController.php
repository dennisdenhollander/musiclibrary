<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Band;
use App\Album;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\URL;

class BandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('bands.list');
    }

    public function populate()
    {
        $bands = Band::all();
        foreach($bands as $band) {
            $band->active = ($band->still_active==1) ? 'Yes' : 'No';
            $band->website = "<a target='_blank' href=".$band->website.">".$band->website."</a>";
        }
        return Datatables::of($bands)
            ->addColumn('action', function ($band) {
                return '<a href="'.URL::to('/').'/band/'.$band->id.'/edit">Edit</a>&nbsp;&nbsp;<a href="'.URL::to('/').'/band/'.$band->id.'/destroy">Delete</a>';
            })->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bands.new');
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
            'name' => 'required'
        ]);
        $band=new Band();
        $band->name = $request->name;
        $band->start_date = $request->start_date;
        $band->website = $request->website;
        $band->still_active = $request->still_active;
        $band->save();
        return redirect('band');
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
        $band=Band::find($id);
        $albums=Band::find($id)->albums;
        return view('bands.edit')->with('band', $band)->with('albums', $albums);
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
            'name' => 'required'
        ]);
        $band=Band::find($id);
        $band->name = $request->name;
        $band->start_date = $request->start_date;
        $band->website = $request->website;
        $band->still_active = $request->still_active;
        $band->save();
        return redirect('band');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $band=Band::find($id);
        $albums=$band->albums;
        foreach ($albums as $album) {
            $album->destroy($album->id);
        }
        $band->destroy($id);
        return redirect('band');
    }
}
