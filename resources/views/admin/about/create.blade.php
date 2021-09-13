@extends('admin.admin_master')
@section('admin')

<div class="col-lg-12">
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>Add About</h2>
        </div>
        <div class="card-body">
            <form action="{{route('store.about')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput1">Title</label>
                    <input type="text" class="form-control" name="title" placeholder="Enter title">
                    @error('title')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
               
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Short Description</label>
                    <textarea class="form-control" rows="3" name="short_description"></textarea>
                    @error('short_description')
                    <span class="text-danger">{{$message}}</span>
               @enderror
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Long Description</label>
                    <textarea class="form-control" rows="3" name="long_description"></textarea>
                    @error('long_description')
                    <span class="text-danger">{{$message}}</span>
               @enderror
                </div>
               
                <div class="form-footer pt-4 pt-5 mt-4 border-top">
                    <button type="submit" class="btn btn-primary btn-default">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection