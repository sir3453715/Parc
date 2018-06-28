
@extends('admin.master')
@section('content')
    <div class="col-sm-10 blog-main">
        <h1>Upload Partner Logo</h1>
        <hr>
        <form method="POST" action="/backend/partner/create" enctype="multipart/form-data">
            {{--create a token for laravel security check--}}
            {{csrf_field()}}
            {{-- Active --}}
            <div class="form-group">
                <label for="Active">Active:</label>
                <input name="active" type="checkbox" id="active" checked>
            </div>
            <div class="row">
            {{-- Title --}}
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>
            {{-- Pic Upload --}}
            <div class="form-group">
                <label for="pic">Upload your picture</label>
                <input type="file" class="form-control-file" name="pic" id="pic">
            </div>
            <button type="button" class="btn btn-default " onclick="history.back()">Back</button>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>

    <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
    <script>
        //CKEDITOR.replace( 'body' );
    </script>
@endsection