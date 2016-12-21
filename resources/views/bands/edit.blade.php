@extends('master')

@section('content')

    <form action="{!! URL::to('/') !!}/band/{!! $band->id !!}" method="POST">
        @foreach($errors->all() as $error)
        <p style="color:red;">{!! $error !!}</p>
        @endforeach
        <br>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input name="_method" type="hidden" value="PUT">
        <label>Name</label><br>
        <input type="text" name="name" value="{!! $band->name !!}" /><br><br>
        <label>Start Date</label><br>
        <input type="date" name="start_date" value="{!! $band->start_date !!}" /><br><br>
        <label>Website</label><br>
        <input type="text" name="website" value="{!! $band->website !!}" /><br><br>
        <label>Still Active?</label><br>
        <select name="still_active">
            <option value="0"
                    @if($band->still_active==0)
                    selected
                    @endif
            >No</option>
            <option value="1"
                    @if($band->still_active==1)
                    selected
                    @endif
            >Yes</option>
        </select><br><br>
        <h3>Albums</h3><br>
        @foreach($albums as $album)
            <p>{!! $album->name !!}</p>
        @endforeach
<br><br>

        <button type="submit">Save</button>
    </form>

@stop
