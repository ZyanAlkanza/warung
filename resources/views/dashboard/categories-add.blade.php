@extends('dashboard.template-accessibility')

@push('css')
    <link rel="stylesheet" href="{{ url('assets/css/style-categoriesAction.css') }}">
@endpush

@section('content')
    
    <div class="konten">

        <!-- Judul Konten -->
        <div class="judul-konten">
            <h5>Add New Category</h5>
        </div>

        <!-- Isi Konten -->
        <div class="isi-konten">
            <form action="{{ url('categories') }}" method="post">
                @csrf
                <div class="nama-kategori">
                    <label for="categories">Category Name</label>
                    <input type="text" class="@error('name') is-invalid @enderror" id="categories" name="name" autocomplete="off" value="{{ old('name') }}">
                    @error('name')
                        <div class="pesan-kesalahan">{{ $message }}</div>
                    @enderror
                </div>

                <div class="deskripsi">
                    <label for="descriptions">Descriptions</label>
                    <textarea name="desc" class="@error('desc') is-invalid @enderror" id="descriptions" maxlength="150">{{ old('desc') }}</textarea>
                    @error('desc')
                        <div class="pesan-kesalahan">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" name="submit" class="submit">Submit</button>
            </form>
        </div>
    </div>

@endsection