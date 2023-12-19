@push('css')
    <link rel="stylesheet" href="{{ url('assets/css/style-productsAction.css') }}">
@endpush

@extends('dashboard.template-accessibility')

@section('content')
    
    <div class="konten">

        <!-- Judul Konten -->
        <div class="judul-konten">
            <h5>Add New Product</h5>
        </div>

        <!-- Isi Konten -->
        <div class="isi-konten">
            <form action="{{ url('products') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="nama-produk">
                    <label for="products">Product Name</label>
                    <input type="text" id="products" name="product_name" class="@error('product_name') is-invalid @enderror" value="{{ old('product_name') }}" autocomplete="off">
                    @error('product_name')
                        <div class="pesan-kesalahan">{{ $message }}</div>
                    @enderror
                </div>
    
                <div class="nama-kategori">
                    <label for="categories">Product Category</label>
                    <select class="form-select" name="categories_id" class="@error('categories_id') is-invalid @enderror">
                        <option value="">-Choose Category-</option>

                        @foreach ($categories as $item)
                            <option value="{{ $item->id }}" {{ old('categories_id') == $item->id ? 'selected' : null }}>{{ $item->name }}</option>
                        @endforeach
                        
                    </select>
                    @error('categories_id')
                        <div class="pesan-kesalahan">{{ $message }}</div>
                    @enderror
                </div>
    
                <div class="stokDanHarga">
                    <div class="harga">
                        <label for="price">Price</label>
                        <input type="text" id="price" name="price" class="@error('price') is-invalid @enderror" value="{{ old('price') }}" autocomplete="off">
                        @error('price')
                            <div class="pesan-kesalahan">{{ $message }}</div>
                        @enderror
                    </div>
    
                    <div class="stok">
                        <label for="stock">Qty</label>
                        <input type="text" id="stock" name="stock" value="{{ old('stock') }}" autocomplete="off">
                    </div>
                </div>
                
                <div class="gambar">
                    <label for="image">Image</label>
                    <input type="file" id="image" name="image" autocomplete="off" class="@error('image') is-invalid @enderror">
                    @error('image')
                        <div class="pesan-kesalahan">{{ $message }}</div>
                    @enderror
                </div>
    
                <div class="deskripsi">
                    <label for="descriptions">Descriptions</label>
                    <textarea name="product_desc" id="" maxlength="150">{{ old('product_desc') }}</textarea>
                </div>
    
                <button type="submit" name="submit" class="submit">Submit</button>
            </form>
            
        </div>
    </div>

@endsection