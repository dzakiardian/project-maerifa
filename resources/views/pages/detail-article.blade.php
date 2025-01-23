@extends('layouts.main')

@section('main')
    {{-- articles --}}
    <section class="bg-black">
        <div class="mx-auto max-w-7xl">
            @include('components.navbar')
        </div>
        <div class="md:flex justify-between">
            <section class="md:w-[70%] mx-5 lg:ml-24 mt-10 mb-5">
                <div class="border border-white md:p-5 rounded-lg box-border">
                    <div class="items-start justify-center w-full h-full py-6 mb-6 md:mb-0">
                        <div class="flex flex-col items-start justify-center h-full space-y-3 transform md:space-y-5">
                            <div
                                class="bg-pink-500 flex items-center pl-2 pr-3 py-1.5 leading-none rounded-full text-xs font-medium uppercase text-white inline-block">
                                <svg class="w-3.5 h-3.5 mr-1" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                    </path>
                                </svg>
                                <span>Featured</span>
                            </div>
                            <h1 class="text-4xl font-bold leading-none lg:text-5xl xl:text-6xl text-slate-200"><a
                                    >{{ $article->title }}</a></h1>
                            <p class="pt-2 text-sm font-medium text-slate-200">by <a href="#_" class="mr-1 underline">{{ $article->user->username }}</a> ·
                                <span class="mx-1">{{ $article->created_at->diffForHumans() }}</span>
                            </p>
                            </dib </div>
                            <div class="w-full">
                                <a class="block">
                                    <img class="object-cover w-full h-full rounded-lg max-h-64 sm:max-h-96"
                                        src="{{ asset('storage/thumbnails/' . $article->thumbnail) }}">
                                </a>
                            </div>
                        </div>
                        <article class="lg:pb-10 lg:mt-10 max-w-3xl mt-5 text-xl text-gray-500">

                            {!! $article->content !!}

                        </article>
            </section>
            <section class="md:w-[30%] mx-5 lg:mr-24 mt-10">
                <div class="border border-white p-5 rounded-lg box-border">
                    <h3 class="text-2xl font-semibold text-white mb-5">Mungkin kamu tertarik dengan artikel dibawah ini</h3>
                    <ul>
                        <li class="text-white my-3">Lorem ipsum dolor sit, amet consectetur adipisicing elit</li>
                        <li class="text-white my-3">Lorem ipsum dolor sit, amet consectetur adipisicing elit</li>
                        <li class="text-white my-3">Lorem ipsum dolor sit, amet consectetur adipisicing elit</li>
                        <li class="text-white my-3">Lorem ipsum dolor sit, amet consectetur adipisicing elit</li>
                        <li class="text-white my-3">Lorem ipsum dolor sit, amet consectetur adipisicing elit</li>
                    </ul>
                </div>
            </section>
        </div>
        <section id="comments" class="pb-5 px-3 lg:mx-24">
            <div class="card bg-base-100 w-full shadow-xl mx-auto mt-5 lg:w-2/3 lg:mx-0">
                <div class="card-body">
                    <h2 class="card-title">Creator Article</h2>
                    <div class="flex justify-start items-center gap-x-3">
                        <img src="{{ asset('assets/img/gebildet.png') }}" class="w-20 h-20 bg-slate-200 rounded-full" alt="profile">
                        <div class="text">
                            <h3 class="text-base md:text-xl font-semibold">{{ $article->user->username }}</h3>
                            <p class="text-sm md:font-medium">Junior Fullstack Developer | Founder & CEO Codeauthentic</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card bg-base-100 w-full lg:w-2/3 mt-5 shadow-xl mx-auto lg:mx-0">
                <div class="card-body">
                    <h2 class="card-title">Comments</h2>
                    <p>Berikan masukan kepada pembuat artikel</p>
                    <div class="card-actions justify-center mt-3">
                        <button class="btn px-8 bg-green-600 text-white hover:bg-green-400"
                            onclick="handleClickComment()">Comment</button>
                    </div>
                </div>
            </div>
            {{-- <div class="card bg-base-100 w-full shadow-xl mx-auto mt-5 lg:w-2/3 lg:mx-0">
                <div class="card-body">
                    <h2 class="card-title">All Comments</h2>
                    <div class="bg-slate-200 p-5 rounded-md flex items-center gap-3">
                        <img src="https://media.istockphoto.com/id/1495088043/vector/user-profile-icon-avatar-or-person-icon-profile-picture-portrait-symbol-default-portrait.jpg?s=612x612&w=0&k=20&c=dhV2p1JwmloBTOaGAtaA3AW1KSnjsdMt7-U_3EZElZ0="
                            alt="gambar" class="h-10 rounded-full">
                        <div class="text">
                            <h3 class="font-semibold">Username</h3>
                            <p class="text-sm font-normal">bismillah semoga c nya c bener lagi yaa c coba baca bismillah
                                semoga key c nya baugs caaaa</p>
                        </div>
                    </div>
                    <div class="bg-slate-200 p-5 rounded-md flex items-center gap-3">
                        <img src="https://media.istockphoto.com/id/1495088043/vector/user-profile-icon-avatar-or-person-icon-profile-picture-portrait-symbol-default-portrait.jpg?s=612x612&w=0&k=20&c=dhV2p1JwmloBTOaGAtaA3AW1KSnjsdMt7-U_3EZElZ0="
                            alt="gambar" class="h-10 rounded-full">
                        <div class="text">
                            <h3 class="font-semibold">Username</h3>
                            <p class="text-sm font-normal">bismillah semoga c nya c bener lagi yaa c coba baca bismillah
                                semoga key c nya baugs caaaa</p>
                        </div>
                    </div>
                    <div class="bg-slate-200 p-5 rounded-md flex items-center gap-3">
                        <img src="https://media.istockphoto.com/id/1495088043/vector/user-profile-icon-avatar-or-person-icon-profile-picture-portrait-symbol-default-portrait.jpg?s=612x612&w=0&k=20&c=dhV2p1JwmloBTOaGAtaA3AW1KSnjsdMt7-U_3EZElZ0="
                            alt="gambar" class="h-10 rounded-full">
                        <div class="text">
                            <h3 class="font-semibold">Username</h3>
                            <p class="text-sm font-normal">bismillah semoga c nya c bener lagi yaa c coba baca bismillah
                                semoga key c nya baugs caaaa</p>
                        </div>
                    </div>
                </div>
            </div> --}}
        </section>
    </section>
    <hr class="text-slate-200">
    {{-- footer --}}
    @include('components.footer')
    <script>
        function handleClickComment() {
            alert('Maaf ya fitur ini belum tersedia:(')
        }
    </script>
@endsection
