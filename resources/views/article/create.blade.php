
@extends('admin.master')
@section('content')
    <div class="col-sm-10 blog-main">
        <h1>Create Article</h1>
        <hr>
        <form method="POST" action="/backend/article/create" enctype="multipart/form-data">
            {{--create a token for laravel security check--}}
            {{csrf_field()}}
            {{-- Active --}}
            <div class="form-group">
                <label for="Active">Active:</label>
                <input name="active" type="checkbox" id="active" checked>
            </div>
            <div class="row">
                {{-- Category --}}               
                <label for="Category">Category:</label>
                <div class="col">
                    <div class="form-group">
                        <select size="6" name="category" class="custom-select">
                            <option selected disabled hidden>主分類</option>
                            @foreach($datas['categories'] as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                        <select size="6" class="custom-select" name="sub_category">
                            <option value="" selected disabled hidden>次分類</option>
                        </select>
                        <select size="6" class="custom-select" name="extra_sub_category">
                            <option value="" selected disabled hidden>其他分類</option>
                        </select>
                    </div>
                </div>
            </div>
            {{-- Title --}}
            <div class="form-group">
                <label for="Title">Title:</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            {{-- Description --}}
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea id="description" name="description" class="form-control"></textarea>
            </div>
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
            {{-- Tags --}}
            <div class="form-group">
                <label for="Tags">Tags:</label>
                <input type="text" class="form-control" id="tags" name="tags" 
                placeholder="mytag1,mytag2">
            </div>
            {{-- Date --}}
            <div class="form-group">
                <label for="expiry_date">Expiry Date:</label>
                <input type="date" id="expiry_date" name="expiry_date" class="form-control">
            </div>
            {{-- Lock --}}
            <div class="form-group">
                <label for="Lock">Lock:</label>
                <input name="lock" type="checkbox" id="lock">
            </div>
            {{-- Display --}}
            <div class="form-group">
                <label for="display">Display:</label>
                <input name="display" type="checkbox" id="display">
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
            {{-- Video URL --}}
            <div class="form-group">
                <label for="video_url">Video URL:</label>
                <input type="text" class="form-control" id="video_url" name="video_url">
            </div>
            <button type="button" class="btn btn-default " onclick="history.back()">Back</button>
            <button type="submit" class="btn btn-primary">Publish</button>
        </form>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="category"]').on('change', function() {
                var category_id = $(this).val();
                if(category_id) {
                    $.ajax({
                        url: '/backend/article/create/ajax/'+category_id,
                        type: "GET",
                        dataType: "json",
                        success:function(data) {
    
                            
                            $('select[name="sub_category"]').empty();
                            $('select[name="extra_sub_category"]').empty()
                            $.each(data, function(key, value) {
                                $('select[name="sub_category"]').append('<option value="'+ key +'">'+ value +'</option>');
                            });
    
    
                        }
                    });
                }else{
                    $('select[name="sub_category"]').empty();
                }
            });
            $('select[name="sub_category"]').on('change', function() {
                var sub_category_id = $(this).val();
                var category_id = $('select[name="category"]').val();
                if(sub_category_id) {
                    $.ajax({
                        url: '/backend/article/create/ajax/'+category_id+'/'+sub_category_id,
                        type: "GET",
                        dataType: "json",
                        success:function(data) {
                            $('select[name="extra_sub_category"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="extra_sub_category"]').append('<option value="'+ key +'">'+ value +'</option>');
                            });

                        }
                    });
                }else{
                    $('select[name="extra_sub_category"]').empty();
                }
                
            });
            

        });
    </script>
    <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
    <script>
        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
        };    
        CKEDITOR.replace( 'body',options );
    </script>

@endsection