@extends('dashboard.template-accessibility')

@push('css')
    <link rel="stylesheet" href="{{ url('assets/css/style-categoriesAction.css') }}">
@endpush

@section('content')
    
    <div class="konten">

        <!-- Judul Konten -->
        <div class="judul-konten">
            <h5>Edit Category</h5>
        </div>

        <!-- Isi Konten -->
        <div class="isi-konten">
            <form action="{{ url('categories/' .$categories->id) }}" method="post">
                @method('patch')
                @csrf
                <div class="nama-kategori">
                    <label for="categories">Category Name</label>
                    <input type="text" id="categories" name="name" autocomplete="off" value="{{ $categories->name }}">
                </div>
    
                <div class="deskripsi">
                    <label for="descriptions">Descriptions</label>
                    <textarea name="desc" id="descriptions" maxlength="150">{{ $categories->desc }}</textarea>
                </div>
    
                <button type="submit" name="submit" class="submit">Save Change</button>
            </form>
        </div>
    </div>

@endsection