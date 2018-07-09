{{-- {{dd(Request::segment(3))}} --}}
@extends('admin.master')
@section('content')
    <div class="col-sm-10 blog-main">
        <h1>Create Article</h1>
        <hr>
        <form method="POST" action="/backend/article/{{Request::segment(3)}}/create" enctype="multipart/form-data">
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
                        <input type="text" value="" id="categorygg" name="category" hidden></option>
                        {{-- <select size="6" name="category" class="custom-select">
                            <option selected disabled hidden>主分類</option>
                            @foreach($datas['categories'] as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select> --}}
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
            {{-- Expiry date --}}
            @if(Request::segment(3)=="event")
                <div class="form-group">
                    <label for="expiry_date">Expiry Date:</label>
                    <input type="date" id="expiry_date" name="expiry_date" class="form-control">
                </div>
            @endif
            {{-- Lock --}}
            @if(Request::segment(3)=="story")
                <div class="form-group">
                    <label for="Lock">Lock:</label>
                    <input name="lock" type="checkbox" id="lock">
                </div>
            @endif
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
                <input type="file" class="form-control-file multi with-preview"  maxlength="1" name="pic" id="pic">
            </div>
            @if(Request::segment(3)=="event")
            {{-- Video URL --}}
                <div class="form-group">
                    <label for="video_url">Video URL:</label>
                    <input type="text" class="form-control" id="video_url" name="video_url" placeholder="在此輸入Youtube 網址 例:https://www.youtube.com/watch?v=jNQXAC9IVRw">
                </div>
                <iframe hidden width="560" id="video_iframe" height="315" src="" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
            @endif
            <button type="button" class="btn btn-default " onclick="history.back()">Back</button>
            <button type="submit" class="btn btn-primary">Publish</button>
        </form>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#video_url').on('change', function() {
                var url_string = $(this).val(); //window.location.href
                if (is_url(url_string)) {
                    var url = new URL(url_string);
                    var v = url.searchParams.get("v");
                    console.log(v);
                    $('#video_iframe').removeAttr("hidden");
                    $("#video_iframe").attr("src","https://www.youtube.com/embed/"+v+"?rel=0&amp;showinfo=0");
                }
                else{
                    $("#video_iframe").attr("hidden","");
                }
                
            });
            switch("{{Request::segment(3)}}"){
                case "story":
                    var category_id=1;
                    // document.getElementById("category").value = 1;
                    // $("#category").val(1);
                    $("#categorygg").attr("value","1");
                    break;
                case "event":
                    var category_id=2;
                    $("#categorygg").attr("value","2");
                    break;
                case "law":
                    var category_id=3;
                    $("#categorygg").attr("value","3");
                    break;
                case "trend":
                    var category_id=4;
                    $("#categorygg").attr("value","4");
                    break;
                case "news":
                    var category_id=5;
                    $("#categorygg").attr("value","5");
                    break;
            }
            
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
            $('select[name="sub_category"]').on('change', function() {
                var sub_category_id = $(this).val();
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
        function is_url(str)
        {
            regexp =  /^(?:(?:https?|ftp):\/\/)?(?:(?!(?:10|127)(?:\.\d{1,3}){3})(?!(?:169\.254|192\.168)(?:\.\d{1,3}){2})(?!172\.(?:1[6-9]|2\d|3[0-1])(?:\.\d{1,3}){2})(?:[1-9]\d?|1\d\d|2[01]\d|22[0-3])(?:\.(?:1?\d{1,2}|2[0-4]\d|25[0-5])){2}(?:\.(?:[1-9]\d?|1\d\d|2[0-4]\d|25[0-4]))|(?:(?:[a-z\u00a1-\uffff0-9]-*)*[a-z\u00a1-\uffff0-9]+)(?:\.(?:[a-z\u00a1-\uffff0-9]-*)*[a-z\u00a1-\uffff0-9]+)*(?:\.(?:[a-z\u00a1-\uffff]{2,})))(?::\d{2,5})?(?:\/\S*)?$/;
                if (regexp.test(str))   
                    return true
                else    
                    return false;
        }
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