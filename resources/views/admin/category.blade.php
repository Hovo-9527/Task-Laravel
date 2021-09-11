@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Add Category</h3>
            </div>

            <form action="add/category" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">NAME</label>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <input type="text" class="form-control" name="name" placeholder="NAME" >
                    </div>
                    <div class="card-footer">
                        <button type="submit"  class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>

            <table class="table">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Delete</th>
                    <th>Edit</th>
                </tr>

                @foreach($category as $key)
                    <tr>
                        <td>{{ $key['id'] }}</td>
                        <td>{{ $key['name'] }}</td>
                        <td>
                            <a href="/admin/category/delete/{{ $key['id'] }}" class=" btn btn-danger">Delete</a>
                        </td>
                        <td>
                            <a href="/admin/category/edit/{{ $key['id'] }}" class="btn btn-info">Edit</a>
                        </td>
                    </tr>
                @endforeach

            </table>
        </div>


    </div>

@endsection
