
@extends('admin.master')
@section('content')
    <div class="col-sm-10 blog-main">
        <h1>Upload Excel</h1>
        <hr>
        <form method="POST" action="/backend/donate/create" enctype="multipart/form-data">
            {{--create a token for laravel security check--}}
            {{csrf_field()}}
            {{-- Excel Upload --}}
            <div class="form-group">
                <label for="excel">Upload your Excel</label>
                <input type="file" class="form-control-file" name="excel" id="excel">
            </div>
            <button type="button" class="btn btn-default " onclick="history.back()">Back</button>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
    <script>
    </script>
@endsection