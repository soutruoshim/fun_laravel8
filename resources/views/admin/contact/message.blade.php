@extends('admin.admin_master')
@section('admin')
          <div class="row">
            
              <div class="col-md-12">
                  
                  <div class="card">
                     <div class="card-header">All Message</div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">SL No</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Subject</th>
                                    <th scope="col">Message</th>
                                    <th scope="col">Crated At</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                 @php($i = 1)
                                 @foreach($messages AS $message)
                                 <tr>
                                      <td scope="row">{{$i++}}</td>
                                      <td>{{$message->name}}</td>
                                      <td>{{$message->email}}</td>
                                      <td>{{$message->subject}}</td>
                                      <td>{{$message->address}}</td>
                                       <td>
                                          @if($message->created_at == NULL)
                                          <span class = "text-danger">No Date Set</span>
                                          @else
                                           {{Carbon\Carbon::parse($message->created_at)->diffForHumans()}}
                                           @endif
                                       </td>
                                       <td>
                                            <a href="{{url('message/delete/'.$message->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure to delete?')">Delete</a>
                                       </td>
                                 </tr>
                                 @endforeach
                            </tbody>
                        </table>
                       
                   </div>
              </div>
          </div> 
    
@endsection
