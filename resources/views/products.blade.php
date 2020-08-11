@extends('layout')
 
@section('title', 'Products')
 
@section('content')
 
    <div class="container products">
 
        <div class="row">
 
            @foreach($products as $product)
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <div class="img-holder">
                        <img src="{{ $product->photo }}" class="img-thumbnail">
                        </div>
                        <div class="caption">
                            <h4>{{ $product->name }}</h4>
                            <p class="description">{{ strtolower($product->description) }}</p>
                            <p><strong>Caffeine: </strong> {{ $product->caffine }} mg</p>
                            <p class="btn-holder"><a href="{{ url('add-to-cart/'.$product->id) }}" class="btn btn-warning btn-block text-center" role="button">Add to cart</a> </p>
                        </div>
                    </div>
                </div>
            @endforeach
 
        </div><!-- End row -->
 
    </div>
 
@endsection