@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit Product</h3>
            </div>

            <form action="" method="POST">
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
                        <div class="form-group">
                            <label for="exampleInputEmail1">NAME</label>
                            <input type="text" class="form-control" name="title" value="{{$data->title}}" >
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Cost</label>
                            <input type="text" class="form-control" name="cost" value="{{$data->cost}}" >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Count</label>
                            <input type="text" class="form-control" name="count" value="{{$data->count}}" >
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Price</label>
                            <input type="text" class="form-control" name="price" value="{{$data->price}}" >
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Category_ID</label>
                            <input type="text" class="form-control" name="category_id" value="{{$data->category_id}}" >
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit"  class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
