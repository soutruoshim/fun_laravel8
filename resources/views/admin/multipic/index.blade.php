@extends('admin.admin_master')
@section('admin')

    
    <div class="row">
        <div class="col-md-8">
        <div class="card-group">
            @foreach($multipic as $multi)
            <div class="col-md-4 mt-5">
                <div class="card">
                <img src="{{ asset($multi->image) }}" alt="">
                </div>
            </div> 
            @endforeach

            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                    <div class="card-header">Add Image</div>
                    <div class="card-body">
                        <form action="{{route('store.pic')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Image</label>
                                <input type="file" name="image[]" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" multiple="">
                            </div>
                            <button type="submit" class="btn btn-primary">Add Image</button>
                        </form>
                    </div>    
            </div>
        </div>
    </div> 
      
@endsection
