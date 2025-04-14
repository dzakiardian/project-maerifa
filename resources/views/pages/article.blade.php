@extends('layouts.main')

@section('main')
    {{-- articles --}}
    <section class="bg-black">
        <div class="mx-auto max-w-7xl">
            @include('components.navbar')
        </div>
        <div class="w-full px-5 py-6 mx-auto space-y-5 sm:py-8 md:py-12 sm:space-y-8 md:space-y-16 max-w-7xl">
            <div class="space-y-12 md:text-center">
                <div x-data="{ open: false }" class="max-w-3xl mb-20 space-y-5 sm:mx-auto sm:space-y-4">
                    <h2 class="relative text-center text-4xl font-extrabold tracking-tight sm:text-5xl text-slate-200">
                        <span><span class="text-green-600 xl:inline" data-primary="green-600">The</span> Articles
                    </h2>
                    <p class="text-xl text-center text-gray-500">Orang berilmu belajar dari orang yang berilmu pula.</p>
                    <div
                        class="relative flex items-center mx-auto mt-12 overflow-hidden text-left border border-gray-700 rounded-md md:max-w-md md:text-center">
                        <button type="button" @click="open = !open"
                            class="inline-flex justify-between items-center w-full h-12 px-8 text-base font-bold leading-6 text-white transition duration-150 ease-in-out bg-gray-800 border border-transparent focus:outline-none active:bg-gray-700"
                            data-primary="gray-600">
                            Ingin belajar apa hari ini ?

                            <svg class="w-4 h-4 mr-0 text-neutral-400 shrink-0" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="11" cy="11" r="8"></circle>
                                <line x1="21" x2="16.65" y1="21" y2="16.65"></line>
                            </svg>

                        </button>
                    </div>
                    <div x-show="open" x-transition.duration.500ms>
                        <input type="text" name="search" id="search" oninput="handleSearchArticle(this.value)" class="block w-full px-4 py-3 mb-4 border border-green-600 rounded-lg focus:ring focus:ring-green-500 focus:outline-none" data-rounded="rounded-lg" data-primary="blue-500" placeholder="Ketik disini" autocomplete="off">
                    </div>
                </div>
            </div>
            <div class="articles">
                <div id="first-article" class="flex flex-col items-center mb-8 md:mb-20 sm:px-5 md:flex-row">
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
                            <p class="pt-2 text-sm font-medium text-slate-200">by <a href="#_" class="mr-1 underline">{{ $firstArticle->user->username }}</a> ·
                                <span class="mx-1">{{ $firstArticle->created_at->diffForHumans() }}</span>
                            </p>
                        </div>
                    </div>
                </div>

                <div id="wrapper-article" class="flex grid grid-cols-12 pb-10 sm:px-5 gap-x-8 gap-y-16">
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
        </div>
    </section>
    <hr class="text-slate-200">
    {{-- footer --}}
    @include('components.footer')
    <script>
        // handle search articles
        function handleSearchArticle(keySearch) {
            const wrapperArticles = document.getElementById('wrapper-article');
            const firstArticle = document.getElementById('first-article');
            const url = `${document.location.origin}/articles?q=${encodeURIComponent(keySearch)}`;

            dayjs.extend(dayjs_plugin_relativeTime);
            dayjs.locale('id');

            firstArticle.classList.add('hidden');

            fetch(url)
                .then((result) => result.json())
                .then((data) => {
                    wrapperArticles.innerHTML = "";
                    let cardArticles = "";
                    if (data.articles.data.length > 0) {
                        data.articles.data.forEach((item) => {
                            cardArticles = `
                                    <div class="flex flex-col items-start col-span-12 space-y-3 sm:col-span-6 xl:col-span-4">
                                        <a href="/article/${item.slug}" class="block">
                                            <img class="object-cover w-full mb-2 overflow-hidden rounded-lg shadow-sm h-52"
                                                src="{{ asset('storage/thumbnails/${item.thumbnail}') }}">
                                        </a>
                                        <div class="flex gap-x-1">
                                            ${item.categories.map((item) => {
                                                return `<span class="bg-green-500 flex items-center px-3 py-1.5 leading-none rounded-full text-xs font-medium text-white inline-block">${item}</span>`

                                            })}
                                        </div>
                                        <h2 class="text-lg font-bold sm:text-xl md:text-2xl text-slate-200"><a href="/article/${item.slug}">${item.title}</a></h2>
                                        <p class="pt-2 text-xs font-medium text-slate-200"><a href="#_" class="mr-1 underline">${item.user.username}</a> · <span class="mx-1">${dayjs(item.created_at).fromNow()}</span>
                                    </div>
                            `;
                            wrapperArticles.innerHTML += cardArticles;
                        });
                    }
                });
        }
    </script>
@endsection
