
@extends('admin.master')
@section('content')
    <div class="col-sm-10 blog-main">
        <h1>Create Lecturer</h1>
        <hr>
        <form method="POST" action="/backend/lecturer/create" enctype="multipart/form-data">
            {{--create a token for laravel security check--}}
            {{csrf_field()}}
            {{-- Active --}}
            <div class="form-group">
                <label for="Active">Active:</label>
                <input name="active" type="checkbox" id="active" checked>
            </div>
            <div class="row">
            {{-- Name --}}
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            {{-- Category --}}
            <div class="form-group">
                <label for="category">Category:</label>
                <textarea id="category" name="category" class="form-control"></textarea>
            </div>
            {{-- Category Detail --}}
            <div class="form-group">
                <label for="category_detail">Category Detail:</label>
                <textarea id="category_detail" name="category_detail" class="form-control"></textarea>
            </div>
            {{-- Job Title --}}
            <div class="form-group">
                <label for="job_title">Job Title:</label>
                <textarea id="job_title" name="job_title" class="form-control"></textarea>
            </div>
            {{-- Body --}}
            <div class="form-group">
                <label for="body">Body:</label>
                <textarea id="body" name="body" class="form-control"></textarea>
            </div>
            {{-- Lang --}}
            <div class="form-group">
                <label for="lang">Lang:</label>
                <select name="lang" class="custom-select">
                @foreach($datas['lang'] as $data)
                    <option value="{{$data->id}}">{{$data->name}}</option>
                @endforeach
                </select>
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
    <script src="/vendor/laravel-filemanager/js/lfm.js"></script>
    <script>
        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        };    
        CKEDITOR.replace( 'body',options );

    </script>
@endsection