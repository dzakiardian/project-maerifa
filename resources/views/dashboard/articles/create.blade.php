@extends('layouts.dashboardmain')

@section('main-dashboard')
    @include('components.sidebar')
    <main class="w-full md:w-[calc(100%-256px)] md:ml-64 bg-gray-200 min-h-screen transition-all main">
        <!-- navbar -->
        @include('components.navbar-admin')
        <!-- end navbar -->

        <!-- Content -->
        <div class="p-3 md:p-6">
            <div class="card bg-base-100 md:w-2/3 shadow-xl">
                <div class="card-body">
                    <h2 class="card-title">Create Article</h2>
                    <p>Curahkan apa yang ada di dalam pikiranmu disini</p>
                    <form action="{{ route('articles-create-article') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text">Title</span>
                            </div>
                            <input type="text" placeholder="Type here" id="title" name="title"
                                class="input input-bordered w-full" />
                            <div class="label">
                                @error('title')
                                    <span class="label-text-alt text-red-700">{{ $message }}</span>
                                @enderror
                            </div>
                        </label>
                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text">Slug</span>
                            </div>
                            <input type="text" placeholder="Type here" id="slug" name="slug"
                                class="input input-bordered w-full" />
                            <div class="label">
                                @error('slug')
                                <span class="label-text-alt text-red-700">{{ $message }}</span>
                                @enderror
                            </div>
                        </label>
                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text">Pick Category</span>
                            </div>
                            <input type="hidden" name="categories" id="categories-input-hidden">
                            <select class="select select-bordered" id="categories" multiple>
                                @foreach ($categories as $category)
                                    <option>{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                            <div class="label">
                                @error('categories')
                                <span class="label-text-alt text-red-700">{{ $message }}</span>
                                @enderror
                            </div>
                        </label>
                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text">Thumbnail</span>
                            </div>
                            <input type="file" name="thumbnail" id="thumbnail" class="file-input file-input-bordered w-full" onchange="previewThumbnail()" />
                            <img alt="thumbnail" class="rounded-xl mt-5 hidden" id="frame">
                            <div class="label">
                                @error('thumbnail')
                                <span class="label-text-alt text-red-700">{{ $message }}</span>
                                @enderror
                            </div>
                        </label>
                        <div class="label">
                            <span class="label-text">Content</span>
                        </div>
                        <textarea name="content" id="content" name="content" cols="30" rows="10"></textarea>
                        <div class="label">
                            @error('content')
                            <span class="label-text-alt text-red-700">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mt-5 card-actions justify-end">
                            <button class="btn bg-green-500 hover:bg-green-300 text-white">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End Content -->
    </main>
    <script>
        // generate slug
        const inputTitle = document.getElementById('title');
        const inputSlug = document.getElementById('slug');

        inputTitle.addEventListener('change', () => {
            inputSlug.value = inputTitle.value.split(' ').join('-').toLowerCase();
        });

        // multi select tag
        const inputCategories = document.getElementById('categories-input-hidden');
        new MultiSelectTag('categories', {
            rounded: true,
            shadow: true,
            placeholder: 'Search',
            tagColor: {
                textColor: '#327b2c',
                borderColor: '#92e681',
                bgColor: '#eaffe6',
            },
            onChange: function(values) {
                const itemValue = values.map((item) => item.value);

                inputCategories.value = itemValue.join(',');
            }
        });

        // preview thumbnail
        function previewThumbnail() {
            const inputThumbnail =  document.getElementById('thumbnail');
            const frame = document.getElementById('frame');

            frame.classList.remove('hidden');

            const oFReader = new FileReader();
            oFReader.readAsDataURL(inputThumbnail.files[0]);

            oFReader.onload = (oFEvent) => {
                frame.src = oFEvent.target.result;
            }
        }
    </script>
@endsection
