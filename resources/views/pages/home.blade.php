@extends('layouts.main')

@section('main')
    {{-- header --}}
    <section class="w-full px-3 antialiased bg-black lg:px-6">
        <div class="mx-auto max-w-7xl">
            @include('components.navbar')
            <div class="container px-6 py-32 mx-auto md:text-center md:px-4">
                <h1
                    class="text-4xl font-extrabold leading-none leading-10 tracking-tight text-white sm:text-5xl md:text-6xl xl:text-7xl">
                    <span class="block"><span class="text-green-600 xl:inline" data-primary="green-600">Learning</span>
                        forum</span> <span class="relative inline-block mt-3 text-white">for mutual
                        education</span>
                </h1>
                <p
                    class="mx-auto mt-6 text-sm text-left text-gray-200 md:text-center md:mt-12 sm:text-base md:max-w-xl md:text-lg xl:text-xl">
                    Mari bersama sama membagikan ilmu yang kita punya, setidaknya itulah amal yang paling terbaik yang
                    pernah kita lakukan.</p>
                <div
                    class="relative flex items-center mx-auto mt-12 overflow-hidden text-left border border-gray-700 rounded-md md:max-w-md md:text-center">
                    <input type="text" name="email" onchange="handleRegister(this.value)" placeholder="Email Address"
                        class="w-full h-12 px-6 py-2 font-medium text-gray-800 focus:outline-none" required>
                    <span class="relative top-0 right-0 block">
                        <button type="button"
                            class="inline-flex items-center w-32 h-12 px-8 text-base font-bold leading-6 text-white transition duration-150 ease-in-out bg-gray-800 border border-transparent hover:bg-gray-700 focus:outline-none active:bg-gray-700"
                            data-primary="gray-600" onclick="return document.location.href = '/register'">
                            Sign Up
                        </button>
                    </span>
                </div>
                <div class="mt-8 text-sm text-gray-300">By signing up, you agree to our terms and services.</div>
            </div>
        </div>
    </section>
    {{-- hero --}}
    <section class="px-2 py-32 bg-black md:px-0">
        <div class="container items-center max-w-6xl px-8 mx-auto xl:px-5">
            <div class="flex flex-wrap items-center sm:-mx-3">
                <div class="w-full md:w-1/2 md:px-3">
                    <div
                        class="w-full pb-6 space-y-6 sm:max-w-md lg:max-w-lg md:space-y-4 lg:space-y-8 xl:space-y-9 sm:pr-5 lg:pr-0 md:pb-0">
                        <h1
                            class="text-4xl font-extrabold tracking-tight text-gray-200 sm:text-5xl md:text-4xl lg:text-5xl xl:text-6xl">
                            <span class="block xl:inline">Share your knowledge</span>
                            <span class="block text-green-600 xl:inline" data-primary="green-600">and brilliant
                                ideas!</span>
                        </h1>
                        <p class="mx-auto text-base text-gray-500 sm:max-w-md lg:text-xl md:max-w-3xl">Mungkin sedikit
                            pengetahuan dan ide cemerlangmu dapat memotivasi banyak orang.</p>
                        <div class="relative flex flex-col sm:flex-row sm:space-x-4">
                            <a href="/dashboard/articles"
                                class="flex items-center w-full px-6 py-3 mb-3 text-lg text-white bg-green-600 rounded-md sm:mb-0 hover:bg-green-700 sm:w-auto"
                                data-primary="indigo-600" data-rounded="rounded-md">
                                Buat artikel sekarang
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-1" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-arrow-right">
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                    <polyline points="12 5 19 12 12 19"></polyline>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/2">
                    <div class="w-full h-auto overflow-hidden rounded-md shadow-xl sm:rounded-xl" data-rounded="rounded-xl"
                        data-rounded-max="rounded-full">
                        <img src="https://cdn.devdojo.com/images/november2020/hero-image.jpeg">
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- team --}}
    <section class="w-full py-12 bg-black lg:py-24">
        <div class="max-w-6xl px-12 mx-auto text-center">
            <div class="space-y-12 md:text-center">
                <div class="max-w-3xl mb-20 space-y-5 sm:mx-auto sm:space-y-4">
                    <h2 class="relative text-4xl font-extrabold tracking-tight sm:text-5xl text-slate-200">Contribute
                        <span><span class="block text-green-600 xl:inline" data-primary="green-600">Ideas</span>
                    </h2>
                </div>
            </div>

            <div class="px-10 py-24 mx-auto max-w-7xl">
                <div class="w-full mx-auto text-left md:text-center">
                    <h1
                        class="text-white mb-6 text-5xl font-extrabold leading-none max-w-5xl mx-auto tracking-normal text-gray-900 sm:text-6xl md:text-6xl lg:text-7xl md:tracking-tight">
                        Who else if <span class="text-green-600">not you all!!</span></h1>
                    <p class="px-0 mb-6 text-lg text-gray-600 md:text-xl lg:px-24"> Maerifa dibangun oleh orang orang yang mau membagikan ilmunya disini. </p>
                </div>
            </div>

        </div>
    </section>
    {{-- articles --}}
    <section class="bg-black">
        <div class="w-full px-5 py-6 mx-auto space-y-5 sm:py-8 md:py-12 sm:space-y-8 md:space-y-16 max-w-7xl">
            <div class="space-y-12 md:text-center">
                <div class="max-w-3xl mb-20 space-y-5 sm:mx-auto sm:space-y-4">
                    <h2 class="relative text-center text-4xl font-extrabold tracking-tight sm:text-5xl text-slate-200">
                        <span><span class="text-green-600 xl:inline" data-primary="green-600">Some</span> Articles
                    </h2>
                    <p class="text-xl text-center text-gray-500">Buat atau cari artikel sebanyak mungkin disini.</p>
                </div>
            </div>
            <div class="flex flex-col items-center sm:px-5 md:flex-row">
                <div class="w-full md:w-1/2">
                    <a href="{{ $firstArticle->slug }}" class="block">
                        <img class="object-cover w-full h-full rounded-lg max-h-64 sm:max-h-96"
                            src="/storage/thumbnails/{{ $firstArticle->thumbnail }}">
                    </a>
                </div>
                <div class="flex flex-col items-start justify-center w-full h-full py-6 mb-6 md:mb-0 md:w-1/2">
                    <div
                        class="flex flex-col items-start justify-center h-full space-y-3 transform md:pl-10 lg:pl-16 md:space-y-5">
                        <div class="flex gap-x-1">
                            @foreach ($firstArticle->categories as $category)
                            <div
                                class="bg-green-500 flex items-center pl-2 pr-3 py-1.5 leading-none rounded-full text-xs font-medium text-white inline-block">
                                <span>{{ $category }}</span>
                            </div>
                            @endforeach
                        </div>
                        <h1 class="text-4xl font-bold leading-none lg:text-5xl xl:text-6xl text-slate-200"><a
                                href="{{ $firstArticle->slug }}">{{ $firstArticle->title }}</a></h1>
                        <p class="pt-2 text-sm font-medium text-slate-200">by <a href="#_" class="mr-1 underline">J{{ $firstArticle->user->username }}</a> ·
                            <span class="mx-1">{{ $firstArticle->created_at->diffForHumans() }}</span>
                        </p>
                    </div>
                </div>
            </div>

            <div class="flex grid grid-cols-12 pb-10 sm:px-5 gap-x-8 gap-y-16">
                @foreach ($articles as $article)
                    <div class="flex flex-col items-start col-span-12 space-y-3 sm:col-span-6 xl:col-span-4">
                        <a href="/article/{{ $article->slug }}" class="block">
                            <img class="object-cover w-full mb-2 overflow-hidden rounded-lg shadow-sm h-52"
                                src="{{ asset('storage/thumbnails/' . $article->thumbnail) }}">
                        </a>
                        <div class="flex gap-x-1">
                            @foreach ($article->categories as $category)
                            <span class="bg-green-500 flex items-center px-3 py-1.5 leading-none rounded-full text-xs font-medium text-white inline-block">{{ $category }}</span>
                            @endforeach
                        </div>
                        <h2 class="text-lg font-bold sm:text-xl md:text-2xl text-slate-200"><a href="/article/{{ $article->slug }}">{{ $article->title }}</a></h2>
                        <p class="pt-2 text-xs font-medium text-slate-200"><a href="#_" class="mr-1 underline">{{ $article->user->username }}</a> · <span class="mx-1">{{ $article->created_at->diffForHumans() }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <hr class="text-slate-200">
    {{-- footer --}}
    @include('components.footer')
    <script>
        function handleRegister(email) {
            sessionStorage.setItem('email', email);

            console.log(sessionStorage.getItem('email'))
        }
    </script>
@endsection
