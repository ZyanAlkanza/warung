@extends('dashboard.template')

@push('css')
    <link rel="stylesheet" href="{{ url('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/style-dashboard.css') }}">
@endpush

@section('content')
    
    <div class="konten">

        <!-- Judul Konten -->
        <div class="judul-konten">
            <h5>Dashboard</h5>
        </div>

        <!-- Isi Konten -->
        <div class="isi-konten">
            <div class="kolom">
                <div class="kartu">
                    <a href="{{ url('categories') }}">
                        <h4>Total Categories</h4>
                        <h1>{{ $categories->count() }}</h1>
                        <h5>View More Detail</h5>
                    </a>
                </div>
                <div class="kartu">
                    <a href="{{ url('products') }}">
                        <h4>Total Products</h4>
                        <h1>{{ $products->count() }}</h1>
                        <h5>View More Detail</h5>
                    </a>
                </div>
                <div class="kartu">
                    <a href="{{ url('outofstocks') }}">
                        <h4>Total Out of Stocks</h4>
                        <h1>{{ $outOfStock->count() }}</h1>
                        <h5>View More Detail</h5>
                    </a>
                </div>
            </div>
        </div>
    </div>

@endsection