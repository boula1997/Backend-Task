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
                        <th>description</th>
                        <th>Price</th>
                        <th>Date Created</th>
                        <th>Actions</th>
                    </tr>
                    @foreach ($products as $product)
                        <tr>
                            <td>#{{$loop->iteration}}</td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->description}}</td>
                            <td>{{$product->price}}</td>
                            <td>{{$product->created_at}}</td>
                            <td>
                                <form action="{{route('products.destroy',$product)}}" method="POST">
            
                                    <a href="{{route('products.show',$product)}}" title="show">
                                        <i class="fas fa-eye text-success  fa-lg"></i>
                                    </a>
            
                                    <a href="{{route('products.edit',$product)}}" title="edit">
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
