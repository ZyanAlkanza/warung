@push('css')
    <link rel="stylesheet" href="{{ url('assets/css/style-productsAction.css') }}">
@endpush

@extends('dashboard.template-accessibility')

@section('content')
    
    <div class="konten">

        <!-- Judul Konten -->
        <div class="judul-konten">
            <h5>Edit Product</h5>
        </div>

        <!-- Isi Konten -->
        <div class="isi-konten">
            <form action="{{ url('products/'.$products->id ) }}" method="post" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="nama-produk">
                    <label for="products">Product Name</label>
                    <input type="text" id="products" name="product_name" value="{{ old('product_name', $products->product_name) }}" autocomplete="off">
                </div>
    
                <div class="nama-kategori">
                    <label for="categories">Product Category</label>
                    <select class="form-select" name="categories_id">

                    @foreach ($categories as $item)
                        <option value="{{ $item->id }}" {{ old('categories_id', $products->categories_id) == $item->id ? 'selected' : null }}>{{ $item->name }}</option>
                    @endforeach

                    </select>
                </div>
    
                <div class="stokDanHarga">
                    <div class="harga">
                        <label for="price">Price</label>
                        <input type="text" id="price" name="price" value="{{ old('price', $products->price) }}" autocomplete="off">
                    </div>
    
                    <div class="stok">
                        <label for="stock">Qty</label>
                        <input type="text" id="stock" name="stock" value="{{ old('stock', $products->stock) }}" autocomplete="off">
                    </div>
                </div>
                
                <input type="hidden" id="oldImage" name="oldImage" value="{{ $products->image }}" autocomplete="off">

                <div class="gambar">
                    <label for="image">Image</label>
                    <input type="file" id="image" name="image" value="{{ $products->image }}" autocomplete="off">
                </div>
    
                <div class="deskripsi">
                    <label for="descriptions">Descriptions</label>
                    <textarea name="desc" id="" maxlength="150">{{ old('product_desc', $products->product_desc) }}</textarea>
                </div>
    
                <button type="submit" name="submit" class="submit">Save Change</button>
            </div>
        </form>    
    </div>

@endsection