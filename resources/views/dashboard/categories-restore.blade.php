@extends('dashboard.template')

@push('css')
    <link rel="stylesheet" href="{{ url('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/style-categories.css') }}">
@endpush

@section('content')
    
    <div class="konten">

        <!-- Judul Konten -->
        <div class="judul-konten">
            <h5>Restore Categories</h5>
        </div>

        <!-- Menu Aksesibilitas -->
        <div class="aksesibilitas">
            
            <form action="/categories" method="GET">
                <input type="text" placeholder="Search" autocomplete="off" name="search">
            </form>

            @if (session('status'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    {{ session('status') }}
                    <button type="button" class="btn-close btn-alert" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="tombol">
                <a href="{{ url('categories/recycle') }}">
                    <span>Restore All</span>
                    <i class="fa-solid fa-arrow-rotate-right"></i>
                </a>
                <a href="{{ url('categories/deletePermanent') }}">
                    <span>Delete All</span>
                    <i class="fa-solid fa-arrow-rotate-right"></i>
                </a>
                {{-- <form action="" method="post" onsubmit="return confirm('Are you sure you want to delete all data?')">
                    <button type="submit">
                        <span>Delete All</span>
                        <i class="fa-regular fa-trash-can"></i>
                    </button>
                </form> --}}
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
                            <a href="{{ url('categories/recycle/'.$cat->id) }}" class="ubah">Restore</a>
                            <a href="{{ url('categories/deletePermanent/'.$cat->id) }}" class="hapus">Delete</a>
                        </td>
                    </tr>
                    @empty
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
            </div>

        </div>
    </div>

@endsection