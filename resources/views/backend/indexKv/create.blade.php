@extends('admin.master')
@section('content')
    <div class="col-sm-10 blog-main">
        @if(Request::segment(3)=="kv")
            <h1>Create Key Visual</h1>
        @else
            <h1>Create Quote</h1>
        @endif
        <hr>
        <form method="POST" action="{{ url('backend/indexKV/'.Request::segment(3).'/create') }}" enctype="multipart/form-data">
            {{--create a token for laravel security check--}}
            {{csrf_field()}}
            {{-- Active --}}
            <div class="form-group">
                <label for="Active">Active:</label>
                <input name="active" type="checkbox" id="active" checked>
            </div>
            {{-- Type --}}               
            <div class="form-group">
                @if(Request::segment(3)=="kv")
                    <input type="text" value="KV" name="type" hidden></option>
                @else
                    <input type="text" value="quote" name="type" hidden></option>
                @endif
            </div>
            {{-- Title --}}
            @if(Request::segment(3)=="kv")
                <div class="form-group">
                    <label for="Title">Title:</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>
            @endif
            {{-- Author --}}
            <div class="form-group">
                <label for="author">Author:</label>
                <input type="text" class="form-control" id="author" name="author">
            </div>
            {{-- Body --}}
            <div class="form-group">
                <label for="body">Body:</label>
                <textarea id="body" name="body" class="form-control" required></textarea>
            </div>
            {{-- Link --}}
            @if(Request::segment(3)=="kv")
                <div class="form-group">
                    <label for="Link">Link:</label>
                    <input type="text" class="form-control" id="link" name="link" 
                    placeholder="etc: http://google.com">
                </div>
            @endif
            {{-- Lang --}}
            <div class="form-group">
                <label for="lang">Lang:</label>
                <select name="lang" class="custom-select">
                    @foreach($datas['lang'] as $data)
                        <option value="{{$data->id}}">{{$data->name}}</option>
                    @endforeach
                </select>
            </div>
            {{-- Order --}}
            <div class="form-group">
                <label for="order">Order</label>
                <input type="number" class="form-control" name="order" id="order" value="0">
            </div>
            {{-- Pic Upload --}}
            <div class="form-group">
                <label for="pic">Upload your picture</label>
                <input type="file" class="form-control-file multi with-preview"  maxlength="1" name="pic" id="pic">
            </div>
            <button type="button" class="btn btn-default " onclick="history.back()">Back</button>
            <button type="submit" class="btn btn-primary">Publish</button>
        </form>
    </div>
    <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
    <script>
        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
        };    
        CKEDITOR.replace( 'body',options );
    </script>
@endsection