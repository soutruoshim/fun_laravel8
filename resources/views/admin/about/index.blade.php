@extends('admin.admin_master')
@section('admin')

    <div class="row">
        <div class="col-md-12">
            <h2>About<a href="{{route('about.add')}}">&nbsp;<button class="btn btn-info">Add</button></a></h2>
        </div>
        <div class="col-md-12">
            <div class="card">
                @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> {{session('success')}}.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            @endif
                <div class="card-header">ABOUT</div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">SL No</th>
                            <th scope="col">Title</th>
                            <th scope="col">Short Description</th>
                            <th scope="col">Long Description</th>
                            <th scope="col">Crated At</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                            @php($i = 1)
                            @foreach($abouts AS $about)
                            <tr>
                                <td scope="row">{{$i++}}</td>
                                <td>{{$about->title}}</td>
                                <td>{{$about->short_des}}</td>
                                <td>{{$about->long_des}}</td>
                            
                                <td>
                                    @if($about->created_at == NULL)
                                    <span class = "text-danger">No Date Set</span>
                                    @else
                                    {{Carbon\Carbon::parse($about->created_at)->diffForHumans()}}
                                    @endif
                                </td>
                                <td>
                                    <a href="{{url('about/edit/'.$about->id) }}" class="btn btn-info">Edit</a>
                                    <a href="{{url('about/delete/'.$about->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure to delete?')">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                    </tbody>
                </table>
                {{$abouts->links()}}
            </div>
        </div>
       
    </div> 
    
@endsection
