@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Add Category</h3>
            </div>

            <table class="table">
                <tr>
                    <th>Id</th>
                    <th>Products</th>
                    <th>User Name</th>
                </tr>

                @foreach($products as $key)
                    @php $item = json_decode($key['products']);
                         $itemIds = array_column($item, 'item_id');
                         $items = App\Models\Product::whereIn('id', $itemIds)->get();
                         $total=0;
                    @endphp
                    <tr>
                        <td>{{ $key['id'] }}</td>

                        <td>
                            <ul class="list-group">

                                @foreach($items as $keys)
                                    @php $total+=$keys['price'] @endphp
                                    <h2></h2>
                                    <li class="list-group-item">{{ $keys['title'] }}
                                        <span class="badge badge-primary badge-pill">{{ $keys['price'] }} AMD</span>
                                    </li>
                                @endforeach
                                <li  class="list-group-item list-group-item-primary">Total` {{ $total }} AMD</li>
                            </ul>

                        </td>

                        <td>{{ $key['user']['name'] }}</td>
                    </tr>
                @endforeach

            </table>
        </div>


    </div>

@endsection
