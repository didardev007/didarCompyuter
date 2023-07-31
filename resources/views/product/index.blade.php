@extends('layouts.layouts')
@section('title')
    DidarComputers
@endsection
@section('body')
    <div class="container-xl py-4">
        <div class="row g-4">
            <div class="col-md-4 col-xl-3">
                @include('app.filter')
            </div>
            <div class="col">
                <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-4 mb-4">
                    @foreach($products as $product)
                        <div class="col">
                            @include('app.product')
                        </div>
                    @endforeach
                </div>
                {{ $products->links() }}
            </div>
        </div>
    </div>
@endsection