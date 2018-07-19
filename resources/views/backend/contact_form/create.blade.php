
@extends('admin.master')
@section('content')
    <div class="col-sm-10 blog-main">
        <h1>Create Contact Form</h1>
        <hr>
        <form method="POST" action="/backend/contact_form/create" enctype="multipart/form-data">
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
            {{-- Email --}}
            <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="text" class="form-control" id="email" name="email">
            </div>
            {{-- Phone --}}
            <div class="form-group">
                <label for="phone">電話:</label>
                <input type="text" class="form-control" id="phone" name="phone">
            </div>
            {{-- Body --}}
            <div class="form-group">
                <label for="body">Body:</label>
                <textarea id="body" name="body" class="form-control"></textarea>
            </div>
            <button type="button" class="btn btn-default " onclick="history.back()">Back</button>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection