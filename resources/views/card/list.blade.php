@extends('master')
@section('content')
    <div class="container">
        <h2>Danh Sach San Pham</h2>
        <p></p>
        <table class="table">
            <thead>
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Quanlity</th>
                <th>Total Price</th>
                <th></th>
            </tr>
            </thead>

            @foreach($carts->items as $product)
                <tr>
                    <td><img class='img-fluid' src="/images/{{$product['item']->image}}"></td>
                    <td>{{$product['price']}}</td>
                    <td data-th="Quantity">
                        <input type="number" class="form-control text-center" min="0" name="qty" value="{{ $product['qty'] }}">
                    </td>
                    <td>{{$product['price']* $product['qty']}}</td>
                    <td><a href="{{route('cart.delete',$product['item']->id)}}"> Update</a></td>
                    <td><a href="#"> Delete</a></td>
                </tr>

            @endforeach

        </table>
    </div>
@endsection
