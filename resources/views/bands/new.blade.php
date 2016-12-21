



@extends('master')

@section('content')

    <form action="{!! URL::to('/') !!}/band" method="POST">
        @foreach($errors->all() as $error)<p style="color:red;">{!! $error !!}</p>
        @endforeach
        <br>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <label>Name</label><br>
        <input type="text" name="name" value="" /><br><br>
        <label>Start Date</label><br>
        <input type="date" name="start_date" value="{!! \Carbon\Carbon::now()->format('Y-m-d') !!}" /><br><br>
        <label>Website</label><br>
        <input type="text" name="website" value="" /><br><br>
        <label>Still Active?</label><br>
        <select name="still_active">
            <option value="0">No</option>
            <option value="1">Yes</option>
        </select>


        <button type="submit">Save</button>
    </form>

@stop
