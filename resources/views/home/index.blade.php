@extends('layouts.layouts')
@section('title')
    DidarComputer
@endsection
@section('body')
    @foreach($brandProducts as $brandProduct)
        <div class="border-top">
            <div class="container-xl py-4">
                <div class="h5 mb-3">
                    <a href="{{ route('product.index', ['brand' => $brandProduct['brand']->id]) }}" class="link-danger text-decoration-none">
                        {{ $brandProduct['brand']->name }}
                    </a>
                </div>
                <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4 g-4">
                    @foreach($brandProduct['products'] as $product)
                        <div class="col">
                            @include('app.product')
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endforeach
@endsection