@extends('layout.template')
@section('content')
<div class="intro-y flex items-center mt-5 mb-5">
    <h1 class="font-bold text-lg">{{ $title }}</h1>
</div>
<div class="grid grid-cols-12">
    <div class="intro-y col-span-12 lg:col-span-12">
        @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                confirmButtonText: 'OK',
                timer: 5000
            });
        </script>
        @endif
        @if ($errors->any())
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                html: '<ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>',
                confirmButtonText: 'OK',
                timer: 5000
            });
        </script>
        @endif
        @endsection
