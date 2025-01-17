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
                <div class="flex items-center justify-between alert alert-success toast-success mb-5">
                    <span>{{ session('success-message') }}</span>
                    <button class="btn btn-sm btn-outline text-white" onclick="hiddenToast('toast-success')">X</button>
                </div>
            @endsession
            <div class="md:flex justify-between mb-5 md:mb-0">
                <button class="btn bg-green-500 text-white font-bold px-10 mb-5 hover:bg-green-400"
                    onclick="handleCreateCategory()" id="btn-create-category">Create Category</button>
                <label class="input input-bordered flex items-center gap-2">
                    <input type="text" class="grow" placeholder="Search some category" />
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                        class="h-4 w-4 opacity-70">
                        <path fill-rule="evenodd"
                            d="M9.965 11.026a5 5 0 1 1 1.06-1.06l2.755 2.754a.75.75 0 1 1-1.06 1.06l-2.755-2.754ZM10.5 7a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Z"
                            clip-rule="evenodd" />
                    </svg>
                </label>
            </div>
            <div id="card-create-category" class="hidden my-5 card bg-base-100 w-auto lg:w-1/2 shadow-xl">
                <div class="card-body">
                    <h2 class="card-title">Create Category</h2>
                    <form action="{{ route('categories.create-category') }}" method="post">
                        @csrf
                        <div class="mb-2">
                            <label class="form-control w-full">
                                <div class="label">
                                    <span class="label-text font-semibold">Category Name</span>
                                </div>
                                <input type="text" name="category_name" placeholder="Type here"
                                    class="input input-bordered w-full @error('category_name') input-error create-category-error @enderror input-accent "
                                    value="{{ old('category_name') }}" />
                                <div class="label">
                                    @error('category_name')
                                        <span class="label-text-alt text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>
                            </label>
                        </div>
                        <div class="card-actions justify-end">
                            <button type="submit" class="btn bg-green-500 hover:bg-green-400 text-white">Create</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="md:grid grid-rows-4 grid-cols-2 lg:grid-cols-3 gap-3">
                @foreach ($categories as $category)
                    <div class="mb-3 md:mb-0 card bg-base-100 w-auto shadow-xl">
                        <div class="card-body">
                            <h2 class="card-title">{{ $category->category_name }}</h2>
                            <p>{{ $category->created_at->diffForHumans() }}</p>
                            <div class="card-actions justify-end">
                                <form action="{{ route('categories.delete-category', ['id' => $category->id]) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn bg-red-500 text-white hover:bg-red-400"
                                    onclick="return confirm('Sure deleted this category?')">Delete</button>
                                </form>
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

        const cardCreateCategory = document.getElementById('card-create-category');
        const btnCreateCategory = document.getElementById('btn-create-category');
        const createCategoryError = document.querySelector('.create-category-error');

        // condition create category error
        if (createCategoryError) {
            cardCreateCategory.classList.remove('hidden');
            btnCreateCategory.innerText == 'Create Category' ? btnCreateCategory.innerText = 'Close' : btnCreateCategory
                .innerText = 'Create Category';
        }

        // create category
        function handleCreateCategory() {
            cardCreateCategory.classList.toggle('hidden');
            btnCreateCategory.innerText == 'Create Category' ? btnCreateCategory.innerText = 'Close' : btnCreateCategory
                .innerText = 'Create Category';
        }
    </script>
@endsection
