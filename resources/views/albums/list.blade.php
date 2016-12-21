@extends('master')

@section('content')
    <h1>Albums<br></h1><br>
    <label>Search By Band: </label>
    <select name="bands" id="bands" onchange="filterby(this.value);">
        <option value="0">All</option>
        @foreach($bands as $band)
            <option value="{!! $band->id !!}">{!! $band->name !!}</option>
        @endforeach
    </select><br><br><br>
    <table class="table table-bordered" id="albums-table">
        <thead>
        <tr>
            <th>Band</th>
            <th>Name</th>
            <th>Recorded Date</th>
            <th>Release Date</th>
            <th># Tracks</th>
            <th>Label</th>
            <th>Producer</th>
            <th>Genre</th>
            <th>Actions</th>
        </tr>
        </thead>
    </table><br><br>
    <a href="{!! URL::to('/') !!}/album/create">Create New Album</a>
@stop

@push('scripts')
<script>
    $(function() {
        var table=$('#albums-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('popalbums') !!}',
            columns: [
                { data: 'bandname', name: 'bandname' },
                { data: 'name', name: 'name' },
                { data: 'recorded_date', name: 'recorded_date' },
                { data: 'release_date', name: 'release_date' },
                { data: 'number_of_tracks', name: 'number_of_tracks' },
                { data: 'label', name: 'label' },
                { data: 'producer', name: 'producer' },
                { data: 'genre', name: 'genre' },
                { data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
    });
    function filterby(band) {
        var table=$('#albums-table').DataTable();
        table.destroy();
        $('#albums-table').DataTable({
            retrieve: true,
            processing: true,
            serverSide: true,
            ajax: '{!! route('popalbums') !!}/' + band,
            columns: [
                { data: 'bandname', name: 'bandname' },
                { data: 'name', name: 'name' },
                { data: 'recorded_date', name: 'recorded_date' },
                { data: 'release_date', name: 'release_date' },
                { data: 'number_of_tracks', name: 'number_of_tracks' },
                { data: 'label', name: 'label' },
                { data: 'producer', name: 'producer' },
                { data: 'genre', name: 'genre' },
                { data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
    }
</script>
@endpush