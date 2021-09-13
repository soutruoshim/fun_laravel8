<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Hi..{{ Auth::user()->name}}
            <b style="float: right;"> Total User: 
           <span class="badge badge-danger">{{count($users)}}</span>
           </b>
        </h2>
    </x-slot>

    <div class="py-12">
       <div class="container">
          <div class="row">
          <table class="table">
            <thead>
            
                <th scope="col">SL No</th>
                <th scope="col">Full Name</th>
                <th scope="col">Email</th>
                <th scope="col">Crated At</th>
                </tr>
            </thead>
            <tbody>
                @php($i = 1)
                @foreach($users as $user)
                 <tr>
                     <td scope='row'>{{$i++}}</td>
                     <td>{{$user->name}}</td>
                     <td>{{$user->email}}</td> 
                     <td>{{Carbon\Carbon::parse($user->created_at)->diffForHumans()}}</td>
                 </tr>
                 @endforeach    
               
            </tbody>
            </table>
          </div> 
       </div>
    </div>
</x-app-layout>
