@extends('admin.admin_master')
@section('admin')
          <div class="row">
            <div class="col-md-12">
                <h2>Contact <a href="{{route('admin.create.contact')}}">&nbsp;<button class="btn btn-info">Add</button></a></h2>
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
                     <div class="card-header">All Contact</div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">SL No</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">phone</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Crated At</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                 @php($i = 1)
                                 @foreach($contacts AS $contact)
                                 <tr>
                                      <td scope="row">{{$i++}}</td>
                                      <td>{{$contact->email}}</td>
                                      <td>{{$contact->phone}}</td>
                                      <td>{{$contact->address}}</td>
                                       <td>
                                          @if($contact->created_at == NULL)
                                          <span class = "text-danger">No Date Set</span>
                                          @else
                                           {{Carbon\Carbon::parse($contact->created_at)->diffForHumans()}}
                                           @endif
                                       </td>
                                        <td>
                                            <a href="{{url('contact/edit/'.$contact->id) }}" class="btn btn-info">Edit</a>
                                            <a href="{{url('contact/delete/'.$contact->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure to delete?')">Delete</a>
                                        </td>
                                 </tr>
                                 @endforeach
                            </tbody>
                        </table>
                       
                   </div>
              </div>
          </div> 
    
@endsection
