@extends('dashboard.template-accessibility')

@push('css')
    <link rel="stylesheet" href="assets/css/style-home.css">
@endpush

@section('content')
    
    <!-- Navigasi -->
    <nav>
        <div class="judul">
            <h1>
                <a href="login">Warung</a>
            </h1>
        </div>

        <form action="{{ route('search') }}" method="GET">
            <input type="text" placeholder="Search" autocomplete="off" name="search">
        </form>
    </nav>


    <!-- Konten -->
    <div class="konten">
        <div class="row">

            <!-- Kartu -->
            @forelse ($products as $item)
            <div class="kartu">
                <div class="gambar">
                    @if ($item->image)
                        <img src="{{ asset('storage/' .$item->image) }}">
                    @else
                        <img src="{{ asset('storage/product-images/default.png') }}">
                    @endif
                </div>
                <div class="teks">
                    <h3 class="nama-produk">{{ $item->product_name }}</h3>
                    <h5 class="kategori">{{ $item->categories->name }}</h5>
                    
                    @if ($item->stock > 10)
                        <span class="badge rounded-pill bg-primary">Stock : {{ $item->stock }} Pcs</span>
                    @elseif($item->stock > 5 )
                        <span class="badge rounded-pill bg-success">Stock : {{ $item->stock }} Pcs</span>
                    @elseif($item->stock > 0 )
                        <span class="badge rounded-pill bg-warning">Stock : {{ $item->stock }} Pcs</span>
                    @else
                        <span class="badge rounded-pill bg-danger">Out of Stock</span>
                    @endif
                    
                    <h3 class="harga">Rp. {{ number_format($item->price, 0, ',', '.'); }}</h3>
                </div>
                <div class="tombol">
                    <a href="#">Beli Sekarang</a>
                </div>
            </div>
            @empty
            <!-- Produk Tidak Ditemukan -->
            <div class="kosong">
                <img src="{{ url('assets/img/empty.svg') }}">
                <h3>Product Not Found</h3>
            </div>
            @endforelse
            
            {{-- @foreach ($products as $item)
            <div class="col-sm-6 col-lg-3">
                <div class="kartu">
                    <div class="gambar-produk">
                        @if ($item->image)
                            <img src="{{ asset('storage/' .$item->image) }}">
                        @else
                            <img src="{{ asset('storage/product-images/default.png') }}">
                        @endif
                    </div>
                    <h3 class="nama-produk">{{ $item->product_name }}</h3>
                    <h5 class="kategori">{{ $item->categories->name }}</h5>
                    
                    @if ($item->stock > 10)
                        <span class="badge rounded-pill bg-primary">Stock : {{ $item->stock }} Pcs</span>
                    @elseif($item->stock > 5 )
                        <span class="badge rounded-pill bg-success">Stock : {{ $item->stock }} Pcs</span>
                    @elseif($item->stock > 0 )
                        <span class="badge rounded-pill bg-warning">Stock : {{ $item->stock }} Pcs</span>
                    @else
                        <span class="badge rounded-pill bg-danger">Out of Stock</span>
                    @endif

                    <h3 class="harga">Rp. {{ number_format($item->price, 0, ',', '.'); }}</h3>
                    <a href="#">Beli Sekarang</a>
                </div>
            </div>
            @endforeach --}}
            
        </div>
    </div>
@endsection