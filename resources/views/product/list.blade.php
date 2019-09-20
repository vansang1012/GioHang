@extends('master')

@section('content')
    <div class="container-fluid-padding">
        <h2>Danh Sach San Pham</h2>
        <div class="row text-center-padding">
            @foreach($products as $item)
                <div class="col-4">
                    <div class="card">
                        <div class="card-body">
                            <img class='img-fluid' src="/images/{{$item->image}}">
                        </div>
                        <div class="card-footer">
                            {{$item->name}}<br>
                            {{$item->description}}
                        </div>
                        <div class="btn btn-lg btn-outline-primary"><a href="{{route('cart.add',$item->id)}}"> Mua Hang</a></div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
