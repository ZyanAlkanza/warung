@push('css')
    <link rel="stylesheet" href="{{ url('assets/css/style-productsAction.css') }}">
@endpush

@extends('dashboard.template-accessibility')

@section('content')
    
    <div class="konten">

        <!-- Gambar Konten -->
        <div class="gambar-konten">
            <img src="{{ asset('storage/'. $products->image) }}" alt="">
        </div>

        <!-- Isi Konten -->
        <div class="isi-konten-detail">
            <h1>{{ $products->product_name }}</h1>
            <h5>{{ $products->categories->name }}</h5>
            
                @if ($products->stock > 10)
                    <span class="badge rounded-pill bg-primary">Stock : {{ $products->stock }} Pcs</span>
                @elseif($products->stock > 5 )
                    <span class="badge rounded-pill bg-success">Stock : {{ $products->stock }} Pcs</span>
                @elseif($products->stock > 0 )
                    <span class="badge rounded-pill bg-warning">Stock : {{ $products->stock }} Pcs</span>
                @else
                    <span class="badge rounded-pill bg-danger">Out of Stock</span>
                @endif

            <h2>Rp. {{ number_format( $products->price, 0) }}</h2>

            <h5>Description</h5>
            <p>{{ $products->product_desc }}</p>

            <a href="{{ url('products') }}">
                Back To Products
            </a>
        </div>
    </div>

@endsection