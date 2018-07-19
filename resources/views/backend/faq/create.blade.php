
@extends('admin.master')
@section('content')
    <div class="col-sm-10 blog-main">
        <h1>Create FAQ</h1>
        <hr>
        <form method="POST" action="/backend/faq/create" enctype="multipart/form-data">
            {{--create a token for laravel security check--}}
            {{csrf_field()}}
            {{-- Active --}}
            <div class="form-group">
                <label for="Active">Active:</label>
                <input name="active" type="checkbox" id="active" checked>
            </div>
            <div class="row">
            {{-- Question --}}
            <div class="form-group">
                <label for="question">Question</label>
                <input type="text" class="form-control" id="question" name="question">
            </div>
            {{-- Answer --}}
            <div class="form-group">
                <label for="answer">Answer</label>
                <textarea id="answer" name="answer" class="form-control"></textarea>
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
        //CKEDITOR.replace( 'body' );
    </script>
@endsection