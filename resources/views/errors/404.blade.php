@extends('dashboard.template-accessibility')

@push('css')
    <link rel="stylesheet" href="assets/css/style-home.css">
@endpush

@section('content')

    <!-- Halaman Tidak Ditemukan -->
    <div class="tidakDitemukan">
        <img src="{{ url('assets/img/notFound.svg') }}" alt="">
        <h3>Page Not Found</h3>
    </div>
    
@endsection