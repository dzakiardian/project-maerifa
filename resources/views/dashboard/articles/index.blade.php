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
            <button class="btn bg-green-500 text-white font-bold px-10 mb-5 hover:bg-green-400"
                onclick="document.location.href = '/dashboard/create-article'">Create Article</button>
            <div class="md:grid grid-rows-4 grid-cols-2 lg:grid-cols-3 gap-3">
                @foreach ([1, 2, 3, 4, 5, 6, 7, 8] as $item)
                    <div class="mb-3 md:mb-0 card bg-base-100 w-auto shadow-xl">
                        <div class="card-body">
                            <h2 class="card-title">Aku sedang belajar laravel</h2>
                            <p>Learn in 2/22/2024</p>
                            <div class="card-actions justify-end">
                                <button class="btn bg-green-500 text-white hover:bg-green-400"
                                    onclick="return document.location.href = '/dashboard/article/12345'">Show
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
    </script>
@endsection
