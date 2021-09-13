@extends('admin.admin_master')
@section('admin')
<div class="row">
    <div class="col-md-6">
    <div class="card">
    <div class="card-header">
        <h3>Change Profile<h3>
    </div>    
    <div class="card-body">
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Success!</strong> {{session('success')}}.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
          </div>
          @endif
        <form method="POST" action="{{route('profile.update')}}" class="form-pill">
            @csrf
            <div class="form-group">
                <label for="profilename">User Name</label>
                <input type="text" class="form-control" name="name" value="{{$user->name}}">
            </div>
            <div class="form-group">
                <label for="profilename">Email</label>
                <input type="text" class="form-control" name="email" value="{{$user->email}}">
            </div>
            <button type="submit" class="btn btn-primary btn-default">Update</button>
        
        </form>
    </div>
    </div>
    </div>
</div>
@endsection