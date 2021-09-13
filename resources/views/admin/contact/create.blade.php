@extends('admin.admin_master')
@section('admin')

<div class="col-lg-12">
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>Add Contact</h2>
        </div>
        <div class="card-body">
            <form action="{{route('store.contact')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput1">Email</label>
                    <input type="text" class="form-control" name="email" placeholder="Enter email">
                    @error('email')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Phone</label>
                    <input type="text" class="form-control" name="phone" placeholder="Enter Phone">
                    @error('phone')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
               
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Address</label>
                    <textarea class="form-control" rows="3" name="address"></textarea>
                    @error('address')
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