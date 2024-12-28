@extends('layouts.main')

@section('main')
    {{-- articles --}}
    <section class="bg-black">
        <div class="mx-auto max-w-7xl">
            @include('components.navbar')
        </div>
        <section class="h-screen">
            <div class="max-w-7xl mx-auto py-16 px-10 sm:py-24 sm:px-6 lg:px-8 sm:text-center">
                <h2 class="text-base font-semibold text-white tracking-wide uppercase">Jika ingin informasi lebih lanjut bisa hubungi</h2>
                <p class="mt-1 text-4xl font-extrabold text-white sm:text-5xl sm:tracking-tight lg:text-6xl">+62 895 6325 06450</p>
                <p class="max-w-3xl mt-5 mx-auto text-xl text-gray-500">Mari berdiskusi bersama dan tanyakan apa yang ingin kamu tanyakan.
                </p>
            </div>
        </section>
    </section>
    <hr class="text-slate-200">
    {{-- footer --}}
    @include('components.footer')
@endsection
