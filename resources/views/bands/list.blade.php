@extends('master')

@section('content')
    <h1>Bands<br></h1><br>
    <table class="table table-bordered" id="bands-table">
        <thead>
        <tr>
            <th>Name</th>
            <th>Start Date</th>
            <th>Website</th>
            <th>Still Active?</th>
            <th>Actions</th>
        </tr>
        </thead>
    </table><br><br>
    <a href="{!! URL::to('/') !!}/band/create">Create New Band</a>
@stop

@push('scripts')
<script>
    $(function() {
        $('#bands-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('popbands') !!}',
            columns: [
                { data: 'name', name: 'name' },
                { data: 'start_date', name: 'start_date' },
                { data: 'website', name: 'website' },
                { data: 'active', name: 'active' },
                { data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
    });
</script>
@endpush