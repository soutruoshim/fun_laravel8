@extends('admin.admin_master')
@section('admin')
          <div class="row">
            <div class="col-md-12">
                <h2>Slider<a href="{{route('slider.add')}}">&nbsp;<button class="btn btn-info">Add</button></a></h2>
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
                     <div class="card-header">All Slider</div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">SL No</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Crated At</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                 @php($i = 1)
                                 @foreach($sliders AS $slider)
                                 <tr>
                                      <td scope="row">{{$i++}}</td>
                                      <td>{{$slider->title}}</td>
                                      <td>{{$slider->description}}</td>
                                      <td><img src="{{asset($slider->image)}}" width="100" height="50"></td>
                                      
                                      <td>
                                          @if($slider->created_at == NULL)
                                          <span class = "text-danger">No Date Set</span>
                                          @else
                                           {{Carbon\Carbon::parse($slider->created_at)->diffForHumans()}}
                                           @endif
                                       </td>
                                        <td>
                                            <a href="{{url('slider/edit/'.$slider->id) }}" class="btn btn-info">Edit</a>
                                            <a href="{{url('slider/delete/'.$slider->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure to delete?')">Delete</a>
                                        </td>
                                 </tr>
                                 @endforeach
                            </tbody>
                        </table>
                        {{$sliders->links()}}
                   </div>
              </div>
          </div> 
    
@endsection
