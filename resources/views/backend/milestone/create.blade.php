
@extends('admin.master')
@section('content')
<script src="{{ asset('assets/js/jquery-sortable.js')}}"></script>
<script src="{{ asset('assets/js/jquery.ui.sortable-animation.js')}}"></script>



    <div class="col-sm-10 blog-main">
        <h1>Create Milestone</h1>
        <hr>
        <form method="POST" action="/backend/milestone/create" enctype="multipart/form-data">
            {{--create a token for laravel security check--}}
            {{csrf_field()}}
            {{-- Active --}}
            <div class="form-group">
                <label for="Active">Active:</label>
                <input name="active" type="checkbox" id="active" checked>
            </div>
            {{-- Title --}}
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>
            {{-- Body --}}
            <div class="form-group">
                <label for="body">Body:</label>
                <textarea id="body" name="body" class="form-control"></textarea>
            </div>
            {{-- Date --}}
            <div class="form-group">
                <label for="date">Date:</label>
                <input type="date" id="date" name="date" class="form-control">
            </div>
            {{-- Pic Upload --}}
            <div class="form-group">
                <label for="pic">Upload your picture</label>
                <input type="file" class="form-control-file multi with-preview" name="pic" id="pic">
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
            <button type="button" class="btn btn-default " onclick="history.back()">Back</button>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>

    <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
    <script>
            $(document).ready(function(){
                $('#example').sortable({
                animation: 250,
                revert: 250,
                update: function(event, ui) {
                    var newOrder = $(this).sortable('toArray');
                    console.log(newOrder);
                    document.getElementById("order").value=newOrder;
                }
                }); 	
                // var sortedIDs = $( "#example" ).sortable( "toArray" );
                // console.log(sortedIDs);
            });

        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        };    
        CKEDITOR.replace( 'body',options );
    </script>
@endsection