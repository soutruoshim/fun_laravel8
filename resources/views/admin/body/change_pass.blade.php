@extends('admin.admin_master')
@section('admin')
<div class="row">
    <div class="col-md-6">
    <div class="card">
    <div class="card-header">
        <h3>Change Password<h3>
    </div>    
    <div class="card-body">
    
        <form method="POST" action="{{route('password.update')}}" class="form-pill">
            @csrf
            <div class="form-group">
                <label for="current_password">Current Password</label>
                <input type="password" class="form-control" id="old_password" name="old_password" placeholder="Current Password">
                @error('old_password')
                   <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">New Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="New Password">
                @error('password')
                   <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation placeholder="Confirm Password">
                @error('confirm_password')
                   <span class="text-danger">{{$message}}</span>
                @enderror
            
            </div>
            <button type="submit" class="btn btn-primary btn-default">Save</button>
        
        </form>
    </div>
    </div>
    </div>
</div>
@endsection