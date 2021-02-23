@extends('layouts.app')
@section('title')
    ΕventWorld | Admin Panel
@endsection
@section('content')  
    <div class="container-lg" style="padding-top:190px;padding-bottom:190px;">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-8"><h2>Users <b style="color:#18d26e;">Details</b></h2></div>
                    </div>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Firstname</th>
                            <th>Lastname</th>
                            <th>City</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Verified</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->firstname }}</td>
                            <td>{{ $user->lastname }}</td>
                            <td>{{ $user->city }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>{{ $user->email }}</td>
                            @if($user->email_verified_at != null)            
                                <td>&#10004;</td>                   
                            @else 
                                <td>&#10007;</td>
                            @endif
                            <td>
                                <a data-token="{{  csrf_token() }}" href="/admin/{{ $user->id }}/update" class="add" title="Add" data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a>
                                <a class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                                <a class="delete" href="/admin/{{ $user->id }}/delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>     

@endsection