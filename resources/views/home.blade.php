@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>

            <div>
                <table class="table table-bordered table-responsive-lg">
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Email</th>
                        <th>Date Joined</th>
                        <th>Actions</th>
                    </tr>
                    @foreach ($users as $user)
                        <tr>
                            <td>#{{$loop->iteration}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->is_admin==0?"Employee":"Admin"}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->created_at}}</td>
                            <td>
                                <form action="{{route('users.destroy',$user)}}" method="POST">
            
                                    <a href="{{route('users.show',$user)}}" title="show">
                                        <i class="fas fa-eye text-success  fa-lg"></i>
                                    </a>
            
                                    <a href="{{route('users.edit',$user)}}" title="edit">
                                        <i class="fas fa-edit  fa-lg"></i>
                                    </a>
            
                                    @csrf
                                    @method('DELETE')
            
                                    <button type="submit" title="delete" style="border: none; background-color:transparent;">
                                        <i class="fas fa-trash fa-lg text-danger"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
