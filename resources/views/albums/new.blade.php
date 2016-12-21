@extends('master')

@section('content')

    <form action="{!! URL::to('/') !!}/album" method="POST">
        @foreach($errors->all() as $error)
            <p style="color:red;">{!! $error !!}</p>
        @endforeach
            <br>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <label>Band</label><br>
        <select name="band_id"><option value="">Select a Band</option>
            @foreach($bands as $band)
                <option value="{!! $band->id !!}">{!! $band->name !!}</option>
            @endforeach
        </select><br><br>
        <label>Name</label><br>
        <input type="text" name="name" value="" /><br><br>
        <label>Recorded Date</label><br>
        <input type="date" name="recorded_date" value="{!! \Carbon\Carbon::now()->format('Y-m-d') !!}" /><br><br>
        <label>Release Date</label><br>
        <input type="date" name="release_date" value="{!! \Carbon\Carbon::now()->format('Y-m-d') !!}" /><br><br>
        <label># Tracks</label><br>
        <input type="text" name="number_of_tracks" value="" /><br><br>
        <label>Label</label><br>
        <input type="text" name="label" value="" /><br><br>
        <label>Producer</label><br>
        <input type="text" name="producer" value="" /><br><br>
        <label>Genre</label><br>
        <input type="text" name="genre" value="" /><br><br>
        <button type="submit">Save</button>
    </form>

@stop
