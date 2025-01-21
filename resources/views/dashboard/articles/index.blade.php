@extends('layouts.dashboardmain')

@section('main-dashboard')
    @include('components.sidebar')
    <main class="w-full md:w-[calc(100%-256px)] md:ml-64 bg-gray-200 min-h-screen transition-all main">
        <!-- navbar -->
        @include('components.navbar-admin')
        <!-- end navbar -->

        <!-- Content -->
        <div class="p-6">
            @session('success-message')
                <div class="flex items-center justify-between alert alert-success toast-incorret mb-5">
                    <span>{{ session('success-message') }}</span>
                    <button class="btn btn-sm btn-outline text-white" onclick="hiddenToast('toast-incorret')">X</button>
                </div>
            @endsession
            <div class="md:flex justify-between mb-5 md:mb-0">
                <button class="btn bg-green-500 text-white font-bold px-10 mb-5 hover:bg-green-400"
                    onclick="document.location.href = '/dashboard/create-article'">Create Article</button>
                <label class="input input-bordered flex items-center gap-2">
                    <input type="text" class="grow" oninput="handleSearchArticles(this.value)" placeholder="Search some article" />
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                        class="h-4 w-4 opacity-70">
                        <path fill-rule="evenodd"
                            d="M9.965 11.026a5 5 0 1 1 1.06-1.06l2.755 2.754a.75.75 0 1 1-1.06 1.06l-2.755-2.754ZM10.5 7a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Z"
                            clip-rule="evenodd" />
                    </svg>
                </label>
            </div>
            <div id="wrapper-articles" class="md:grid grid-rows-4 grid-cols-2 lg:grid-cols-3 gap-3">
                @foreach ($articles as $article)
                    <div class="mb-3 md:mb-0 card bg-base-100 w-auto shadow-xl">
                        <div class="card-body">
                            <h2 class="card-title">{{ $article->title }}</h2>
                            @if ($article->created_at == $article->updated_at)
                                <p>Dibuat {{ $article->created_at->diffForHumans() }}</p>
                            @else
                                <p>Diedit {{ $article->updated_at->diffForHumans() }}</p>
                            @endif
                            <div class="card-actions justify-end">
                                <button class="btn bg-green-500 text-white hover:bg-green-400"
                                    onclick="return document.location.href = '/dashboard/article/{{ $article->slug }}'">Show
                                    Detail</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <!-- End Content -->
    </main>
    <script>
        function hiddenToast(triger) {
            const toastMessage = document.querySelector(`.${triger}`);
            toastMessage.classList.add('hidden');
        }

        // handle search articles
        function handleSearchArticles(keySearch) {
            const wrapperArticles = document.getElementById('wrapper-articles');
            const url = `${document.location.origin}/dashboard/articles?q=${encodeURIComponent(keySearch)}`;

            dayjs.extend(dayjs_plugin_relativeTime);
            dayjs.locale('id');

            fetch(url)
                .then((result) => result.json())
                .then((data) => {
                    console.log(data);
                    wrapperArticles.innerHTML = "";
                    let cardArticles = "";
                    if (data.articles.length > 0) {
                        data.articles.forEach((item) => {
                            cardArticles = `
                            <div class="mb-3 md:mb-0 card bg-base-100 w-auto shadow-xl">
                                <div class="card-body">
                                    <h2 class="card-title">${item.title}</h2>
                                    ${item.created_at == item.updated_at ?
                                        `<p>Dibuat ${dayjs(item.created_at).fromNow()}</p>`
                                        :
                                        `<p>Diedit ${dayjs(item.updated_at).fromNow()}</p>`}
                                    <div class="card-actions justify-end">
                                        <button class="btn bg-green-500 text-white hover:bg-green-400"
                                            onclick="return document.location.href = '/dashboard/article/${item.slug}'">Show
                                            Detail</button>
                                    </div>
                                </div>
                            </div>
                            `;
                            wrapperArticles.innerHTML += cardArticles;
                        });
                    }
                });
        }
    </script>
@endsection
