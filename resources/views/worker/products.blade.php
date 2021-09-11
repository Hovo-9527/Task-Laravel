@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Products</h3>
            </div>


            <table class="table">
                <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Add Cart</th>
                </tr>

                @foreach($products as $key)
                    <tr>
                        <td>{{ $key['id'] }}</td>
                        <td>{{ $key['title'] }}</td>
                        <td>{{ $key['price'] }} AMD</td>
                        <td>{{ $key['category']['name'] }}</td>
                        <td>
                            <a href="/cart/add/{{ $key['id'] }}" class=" btn btn-info">Add Cart</a>
                        </td>
                    </tr>
                @endforeach

            </table>
        </div>


    </div>

@endsection
