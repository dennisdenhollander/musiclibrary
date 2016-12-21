@extends('master')

@section('content')

    <form action="{!! URL::to('/') !!}/album/{!! $album->id !!}" method="POST">
        @foreach($errors->all() as $error)
            <p style="color:red;">{!! $error !!}</p>
        @endforeach
        <br>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input name="_method" type="hidden" value="PUT">
        <label>Band</label><br>
        <select name="band_id"><option value="">Select a Band</option>
            @foreach($bands as $band)
                <option value="{!! $band->id !!}"
                @if($band->id==$album->band->id)
                    selected
                @endif
                    >{!! $band->name !!}</option>
            @endforeach
        </select><br><br>
        <label>Name</label><br>
        <input type="text" name="name" value="{!! $album->name !!}" /><br><br>
        <label>Recorded Date</label><br>
        <input type="date" name="recorded_date" value="{!! $album->recorded_date !!}" /><br><br>
        <label>Release Date</label><br>
        <input type="date" name="release_date" value="{!! $album->release_date !!}" /><br><br>
        <label># Tracks</label><br>
        <input type="text" name="number_of_tracks" value="{!! $album->number_of_tracks !!}" /><br><br>
        <label>Label</label><br>
        <input type="text" name="label" value="{!! $album->label !!}" /><br><br>
        <label>Producer</label><br>
        <input type="text" name="producer" value="{!! $album->producer !!}" /><br><br>
        <label>Genre</label><br>
        <input type="text" name="genre" value="{!! $album->genre !!}" /><br><br>
        <button type="submit">Save</button>
    </form>

@stop
