@extends('dashboard.template')

@push('css')
    <link rel="stylesheet" href="{{ url('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/style-products.css') }}">
@endpush

@section('content')
    
    <div class="konten">

        <!-- Judul Konten -->
        <div class="judul-konten">
            <h5>Products</h5>
        </div>

        <!-- Menu Aksesibilitas -->
        <div class="aksesibilitas">
            <form action="/products" method="GET">
                <input type="text" placeholder="Search" autocomplete="off" name="search">
            </form>
            
            @if (session('status'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    {{ session('status') }}
                    <button type="button" class="btn-close btn-alert" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="tombol">
                <a href="{{ url('products/create') }}">
                    <span>Add</span>
                    <i class="fa-solid fa-plus"></i>
                </a>
                <a href="{{ url('products/restore') }}">
                    <span>Restore</span>
                    <i class="fa-solid fa-arrow-rotate-right"></i>
                </a>
            </div>
            
        </div>

        <!-- Isi Konten -->
        <div class="isi-konten">
            <div class="tabel">
                <table>
                    <thead>
                        <th class="nomor">No</th>
                        <th class="nama-produk">Product</th>
                        <th class="kategori">Category</th>
                        <th class="stok">Stock</th>
                        <th class="harga">Price</th>
                        <th class="aksi">Action</th>
                    </thead>
        
                    <tbody>
                        
                        @forelse ($products as $prod)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $prod->product_name }}</td>
                            <td>{{ $prod->categories->name }}</td>
                            <td>
                        
                                @if ($prod->stock > 10)
                                    <span class="badge rounded-pill bg-primary">Stock : {{ $prod->stock }} Pcs</span>
                                @elseif($prod->stock > 5 )
                                    <span class="badge rounded-pill bg-success">Stock : {{ $prod->stock }} Pcs</span>
                                @elseif($prod->stock > 0 )
                                    <span class="badge rounded-pill bg-warning">Stock : {{ $prod->stock }} Pcs</span>
                                @else
                                    <span class="badge rounded-pill bg-danger">Out of Stock</span>
                                @endif

                            </td>
                            <td>Rp. {{ number_format( $prod->price, 0) }}</td>
                            <td class="aksi">
                                <a href="{{ url('products/'.$prod->id ) }}" class="detail">Detail</a>
                                <a href="{{ url('products/'.$prod->id.'/edit' ) }}" class="ubah">Edit</a>
                                <form action="{{ url('products/'.$prod->id ) }}" method="post" onsubmit="return confirm('Are you sure you want to delete this data?')">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="hapus" >Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                            <!-- Konten Tidak Ditemukan -->
                            <tr>
                                <td colspan="6" class="gambar-konten-kosong">
                                    <img src="{{ url('assets/img/empty.svg') }}" alt="">
                                </td>
                            </tr>  
                            <tr>
                                <td colspan="6" class="konten-kosong">Product Not Found</td>
                            </tr>  
                        @endforelse
                    </tbody>

                </table>
            </div>

            <!-- Pagination -->
            <div class="pagination">
                {{ $products->links() }}
            </div>
        </div>
    </div>

@endsection