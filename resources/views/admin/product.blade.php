@extends('layouts.app')
@section('content')

    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Add Product</h3>
            </div>

            <form action="product/add" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Title</label>
                        <input type="text" class="form-control" name="title" placeholder="Title">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Cost</label>
                        <input type="text" class="form-control" name="cost" placeholder="Cost">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Price</label>
                        <input type="text" class="form-control" name="price" placeholder="Price">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Category_ID</label>
                        <select name="category_id" class="form-control">
                            @foreach($categories as $key)
                            <option value="{{$key->id}}"> {{$key->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>


            </form>

            <table class="table">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Cost</th>
                    <th>Price</th>
                    <th>Category_ID</th>
                    <th>Delete</th>
                    <th>Edit</th>
                </tr>

                @foreach($product as $key)
                    <tr>
                        <td>{{ $key['id'] }} </td>
                        <td>{{ $key['title'] }}</td>
                        <td>{{ $key['cost'] }}</td>
                        <td>{{ $key['price'] }}</td>
                        <td>{{ $key['category_id']}} </td>
                        <td>
                            <a href="/admin/product/delete/{{ $key['id'] }}" class="btn btn-danger">Delete</a>
                        </td>

                        <td>
                            <a href="/admin/product/edit/{{$key['id']}}" class="btn btn-info">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

@endsection
