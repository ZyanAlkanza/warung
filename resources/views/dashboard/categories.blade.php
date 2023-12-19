@extends('dashboard.template')

@push('css')
    <link rel="stylesheet" href="{{ url('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/style-categories.css') }}">
@endpush

@section('content')
    
    <div class="konten">

        <!-- Judul Konten -->
        <div class="judul-konten">
            <h5>Categories</h5>
        </div>

        <!-- Menu Aksesibilitas -->
        <div class="aksesibilitas">
            
            <form action="/categories" method="GET">
                <input type="text" placeholder="Search" autocomplete="off" name="search">
            </form>

            @if (session('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('status') }}
                    <button type="button" class="btn-close btn-alert" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="tombol">
                <a href="{{ url('categories/add') }}">
                    <span>Add</span>
                    <i class="fa-solid fa-plus"></i>
                </a>
                <a href="{{ url('categories/restore') }}">
                    <span>Restore</span>
                    <i class="fa-solid fa-arrow-rotate-right"></i>
                </a>
            </div>
            
        </div>

        <!-- Isi Konten -->
        <div class="isi-konten">
            <table>
                <thead>
                    <th class="nomor">No</th>
                    <th class="kategori">Category</th>
                    <th class="deskripsi">Descriptions</th>
                    <th class="aksi">Action</th>
                </thead>
    
                <tbody>

                    @forelse ($categories as $cat)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $cat->name }}</td>
                        <td>{{ $cat->desc }}</td>
                        <td class="aksi">
                            <a href="{{ url('categories/edit/'.$cat->id) }}" class="ubah">Edit</a>
                            <form action="{{ url('categories/'.$cat->id) }}" method="post" onsubmit="return confirm('Are you sure you want to delete this data?')">
                                @method('delete')
                                @csrf
                                <button type="submit" class="hapus">Delete</button>
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
                            <td colspan="6" class="konten-kosong">Categories Not Found</td>
                        </tr>
                    @endforelse
                </tbody>

            </table>

            <!-- Pagination -->
            <div class="pagination">
                {{ $categories->links() }}
            </div>
        </div>
    </div>

@endsection