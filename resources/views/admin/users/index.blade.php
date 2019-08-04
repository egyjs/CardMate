@extends('layouts.admin')

@section('content')
<div class="tile">
    <div class="card">
        <div class="card-header">
            <div class="caption">
                <h2 style="text-align: center">All Users</h2>
            </div>

        </div>
        <div class="card-body">
            <div class="table-scrollable table-responsive">
               
    <table class="table table-hover ">
        <thead>
            <tr>
                <th>
                    Name 
                </th>
                <th>
                    Email
                </th>
                <th>
                    Username
                </th>
                <th>
                    Phone
                </th>                       
                <th>
                    Details
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>
                    {{$user->name}}
                </td>
                <td>
                    {{$user->email}}      
                </td> 
                <td>
                    {{$user->username}}      
                </td>
                <td>
                    {{$user->mobile}}
                </td>
                <td>
                    <a href="{{route('admin.user-single', $user->id)}}" >
                        <button class="btn btn-info btn-sm">View</button> </a>
                    </td>
                </tr>
                @endforeach 
                <tbody>
                </table>
                {{$users->links()}}
                
            </div>
        </div>
    </div>
</div>

            @endsection