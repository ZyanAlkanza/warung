@extends('dashboard.template')

@push('css')
    <link rel="stylesheet" href="{{ url('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/style-outOfStock.css') }}">
@endpush

@section('content')
    
<div class="konten">

    <!-- Judul Konten -->
    <div class="judul-konten">
        <h5>Out of Stock Products</h5>
    </div>

    <!-- Menu Aksesibilitas -->
    <div class="aksesibilitas">
        <input type="text" placeholder="Search" autocomplete="off">
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

                    @forelse ($outOfStock as $key => $item)
                        <tr>
                            <td>{{ $outOfStock->firstItem()+$key }}</td>
                            <td>{{ $item->product_name }}</td>
                            <td>{{ $item->categories->name }}</td>
                            <td>
                                @if ($item->stock > 10)
                                    <span class="badge rounded-pill bg-primary">Stock : {{ $item->stock }} Pcs</span>
                                @elseif($item->stock > 5 )
                                    <span class="badge rounded-pill bg-success">Stock : {{ $item->stock }} Pcs</span>
                                @elseif($item->stock > 0 )
                                    <span class="badge rounded-pill bg-warning">Stock : {{ $item->stock }} Pcs</span>
                                @else
                                    <span class="badge rounded-pill bg-danger">Out of Stock</span>
                                @endif
                            </td>
                            <td>Rp. {{ number_format( $item->price, 0) }}</td>
                            <td class="aksi">
                                <a href="{{ url('products/'.$item->id.'/edit' ) }}" class="ubah">Edit</a>
                                <form action="{{ url('products/'.$item->id ) }}" method="post" onsubmit="return confirm('Are you sure you want to delete this data?')">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="hapus" >Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <!-- Konten Tidak Ditemukan-->
                        <tr>
                            <td colspan="6" class="gambar-konten-kosong">
                                <img src="{{ url('assets/img/empty.svg') }}" alt="">
                            </td>
                        </tr>  
                        <tr>
                            <td colspan="6" class="konten-kosong">Empty</td>
                        </tr>  
                    @endforelse
                    
                </tbody>

            </table>
        </div>

        <!-- Pagination -->
        <div class="pagination">
            {{ $outOfStock->links() }}
        </div>
    </div>
</div>

@endsection