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
                        <input type="text" name="search" id="search" class="block w-full px-4 py-3 mb-4 border border-green-600 rounded-lg focus:ring focus:ring-green-500 focus:outline-none" data-rounded="rounded-lg" data-primary="blue-500" placeholder="Ketik disini" autocomplete="off">
                    </div>
                </div>
            </div>
            <div class="flex flex-col items-center sm:px-5 md:flex-row">
                <div class="w-full md:w-1/2">
                    <a href="#_" class="block">
                        <img class="object-cover w-full h-full rounded-lg max-h-64 sm:max-h-96"
                            src="https://cdn.devdojo.com/images/may2021/cupcakes.jpg">
                    </a>
                </div>
                <div class="flex flex-col items-start justify-center w-full h-full py-6 mb-6 md:mb-0 md:w-1/2">
                    <div
                        class="flex flex-col items-start justify-center h-full space-y-3 transform md:pl-10 lg:pl-16 md:space-y-5">
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
                                href="#_">Savory
                                Templates. Sweet Designs.</a></h1>
                        <p class="pt-2 text-sm font-medium text-slate-200">by <a href="#_" class="mr-1 underline">John
                                Doe</a> ·
                            <span class="mx-1">April 23rd, 2021</span> · <span class="mx-1 text-gray-600">5 min.
                                read</span>
                        </p>
                    </div>
                </div>
            </div>

            <div class="flex grid grid-cols-12 pb-10 sm:px-5 gap-x-8 gap-y-16">
                <div class="flex flex-col items-start col-span-12 space-y-3 sm:col-span-6 xl:col-span-4">
                    <a href="#_" class="block">
                        <img class="object-cover w-full mb-2 overflow-hidden rounded-lg shadow-sm max-h-56"
                            src="https://cdn.devdojo.com/images/may2021/fruit.jpg">
                    </a>
                    <div
                        class="bg-purple-500 flex items-center px-3 py-1.5 leading-none rounded-full text-xs font-medium uppercase text-white inline-block">
                        <span>Lifestyle</span>
                    </div>
                    <h2 class="text-lg font-bold sm:text-xl md:text-2xl text-slate-200"><a href="#_">Creating a
                            Future Worth
                            Living</a></h2>
                    <p class="text-sm text-gray-500">Learn the attributes you need to gain in order to build a future and
                        create a life that you are truly happy with.</p>
                    <p class="pt-2 text-xs font-medium text-slate-200"><a href="#_" class="mr-1 underline">Mary
                            Jane</a> · <span class="mx-1">April 17, 2021</span> · <span class="mx-1 text-gray-600">3
                            min. read</span></p>
                </div>

                <div class="flex flex-col items-start col-span-12 space-y-3 sm:col-span-6 xl:col-span-4">
                    <a href="#_" class="block">
                        <img class="object-cover w-full mb-2 overflow-hidden rounded-lg shadow-sm max-h-56"
                            src="https://cdn.devdojo.com/images/may2021/workout.jpg">
                    </a>
                    <div
                        class="bg-pink-500 flex items-center px-3 py-1.5 leading-none rounded-full text-xs font-medium uppercase text-white inline-block">
                        <span>Health</span>
                    </div>
                    <h2 class="text-lg font-bold sm:text-xl md:text-2xl text-slate-200">The Healther Version of Yourself
                    </h2>
                    <p class="text-sm text-gray-500">If you want to excel in life and become a better version of yourself,
                        you'll need to upgrade your life.</p>
                    <p class="pt-2 text-xs font-medium text-slate-200"><a href="#_" class="mr-1 underline">Fred
                            Jones</a> · <span class="mx-1">April 10, 2021</span> · <span class="mx-1 text-gray-600">3
                            min. read</span></p>
                </div>

                <div class="flex flex-col items-start col-span-12 space-y-3 sm:col-span-6 xl:col-span-4">
                    <a href="#_" class="block">
                        <img class="object-cover w-full mb-2 overflow-hidden rounded-lg shadow-sm max-h-56"
                            src="https://cdn.devdojo.com/images/may2021/food.jpg">
                    </a>
                    <div
                        class="bg-red-500 flex items-center px-3 py-1.5 leading-none rounded-full text-xs font-medium uppercase text-white inline-block">
                        <span>Food</span>
                    </div>
                    <h2 class="text-lg font-bold sm:text-xl md:text-2xl text-slate-200">Enjoy the Meals of the Kings</h2>
                    <p class="text-sm text-gray-500">Take the time to enjoy the life that you've created. It's totally fine
                        to live like kings and eat like royalty.</p>
                    <p class="pt-2 text-xs font-medium text-slate-200"><a href="#_" class="mr-1 underline">Mike
                            Roberts</a> · <span class="mx-1">April 6, 2021</span> · <span class="mx-1 text-gray-600">3
                            min. read</span></p>
                </div>

                <div class="flex flex-col items-start col-span-12 space-y-3 sm:col-span-6 xl:col-span-4">
                    <a href="#_" class="block">
                        <img class="object-cover w-full mb-2 overflow-hidden rounded-lg max-h-56"
                            src="https://cdn.devdojo.com/images/may2021/books.jpg">
                    </a>
                    <div
                        class="bg-blue-500 flex items-center px-3 py-1.5 leading-none rounded-full text-xs font-medium uppercase text-white inline-block">
                        <span>Motivation</span>
                    </div>
                    <h2 class="text-lg font-bold sm:text-xl md:text-2xl text-slate-200">Writing for Success</h2>
                    <p class="text-sm text-gray-500">Writing about your plans for success is extremely helpful for yourself
                        and it will allow you to share your story.</p>
                    <p class="pt-2 text-xs font-medium text-slate-200"><a href="#_" class="mr-1 underline">Tom
                            Johnson</a> · <span class="mx-1">May 25, 2021</span> · <span class="mx-1 text-gray-600">3
                            min. read</span></p>
                </div>

                <div class="flex flex-col items-start col-span-12 space-y-3 sm:col-span-6 xl:col-span-4">
                    <a href="#_" class="block">
                        <img class="object-cover w-full mb-2 overflow-hidden rounded-lg max-h-56"
                            src="https://cdn.devdojo.com/images/may2021/clock.jpg">
                    </a>
                    <div
                        class="bg-gray-800 flex items-center px-3 py-1.5 leading-none rounded-full text-xs font-medium uppercase text-white inline-block">
                        <span>Business</span>
                    </div>
                    <h2 class="text-lg font-bold sm:text-xl md:text-2xl text-slate-200">Simple Time Management</h2>
                    <p class="text-sm text-gray-500">Managing your time can make the difference between getting ahead in
                        life or staying exactly where you are.</p>
                    <p class="pt-2 text-xs font-medium text-slate-200"><a href="#_" class="mr-1 underline">Scott
                            Reedman</a> ·
                        <span class="mx-1">May 18, 2021</span> · <span class="mx-1 text-gray-600">3 min. read</span>
                    </p>
                </div>

                <div class="flex flex-col items-start col-span-12 space-y-3 sm:col-span-6 xl:col-span-4">
                    <a href="#_" class="block">
                        <img class="object-cover w-full mb-2 overflow-hidden rounded-lg max-h-56"
                            src="https://cdn.devdojo.com/images/may2021/lemons.jpg">
                    </a>
                    <div
                        class="bg-yellow-400 flex items-center px-3 py-1.5 leading-none rounded-full text-xs font-medium uppercase text-white inline-block">
                        <span>Nutrition</span>
                    </div>
                    <h2 class="text-lg font-bold sm:text-xl md:text-2xl text-slate-200">The Fruits Life</h2>
                    <p class="text-sm text-gray-500">Take a moment and enjoy to enjoy the many fruits of life. Relaxation
                        and a healthy diet can go a long way.</p>
                    <p class="pt-2 text-xs font-medium text-slate-200"><a href="#_" class="mr-1 underline">Jake
                            Caldwell</a> ·
                        <span class="mx-1">May 15, 2021</span> · <span class="mx-1 text-gray-600">3 min. read</span>
                    </p>
                </div>
                <div class="flex flex-col items-start col-span-12 space-y-3 sm:col-span-6 xl:col-span-4">
                    <a href="#_" class="block">
                        <img class="object-cover w-full mb-2 overflow-hidden rounded-lg max-h-56"
                            src="https://cdn.devdojo.com/images/may2021/lemons.jpg">
                    </a>
                    <div
                        class="bg-yellow-400 flex items-center px-3 py-1.5 leading-none rounded-full text-xs font-medium uppercase text-white inline-block">
                        <span>Nutrition</span>
                    </div>
                    <h2 class="text-lg font-bold sm:text-xl md:text-2xl text-slate-200">The Fruits Life</h2>
                    <p class="text-sm text-gray-500">Take a moment and enjoy to enjoy the many fruits of life. Relaxation
                        and a healthy diet can go a long way.</p>
                    <p class="pt-2 text-xs font-medium text-slate-200"><a href="#_" class="mr-1 underline">Jake
                            Caldwell</a> ·
                        <span class="mx-1">May 15, 2021</span> · <span class="mx-1 text-gray-600">3 min. read</span>
                    </p>
                </div>
                <div class="flex flex-col items-start col-span-12 space-y-3 sm:col-span-6 xl:col-span-4">
                    <a href="#_" class="block">
                        <img class="object-cover w-full mb-2 overflow-hidden rounded-lg max-h-56"
                            src="https://cdn.devdojo.com/images/may2021/lemons.jpg">
                    </a>
                    <div
                        class="bg-yellow-400 flex items-center px-3 py-1.5 leading-none rounded-full text-xs font-medium uppercase text-white inline-block">
                        <span>Nutrition</span>
                    </div>
                    <h2 class="text-lg font-bold sm:text-xl md:text-2xl text-slate-200">The Fruits Life</h2>
                    <p class="text-sm text-gray-500">Take a moment and enjoy to enjoy the many fruits of life. Relaxation
                        and a healthy diet can go a long way.</p>
                    <p class="pt-2 text-xs font-medium text-slate-200"><a href="#_" class="mr-1 underline">Jake
                            Caldwell</a> ·
                        <span class="mx-1">May 15, 2021</span> · <span class="mx-1 text-gray-600">3 min. read</span>
                    </p>
                </div>
                <div class="flex flex-col items-start col-span-12 space-y-3 sm:col-span-6 xl:col-span-4">
                    <a href="#_" class="block">
                        <img class="object-cover w-full mb-2 overflow-hidden rounded-lg max-h-56"
                            src="https://cdn.devdojo.com/images/may2021/lemons.jpg">
                    </a>
                    <div
                        class="bg-yellow-400 flex items-center px-3 py-1.5 leading-none rounded-full text-xs font-medium uppercase text-white inline-block">
                        <span>Nutrition</span>
                    </div>
                    <h2 class="text-lg font-bold sm:text-xl md:text-2xl text-slate-200">The Fruits Life</h2>
                    <p class="text-sm text-gray-500">Take a moment and enjoy to enjoy the many fruits of life. Relaxation
                        and a healthy diet can go a long way.</p>
                    <p class="pt-2 text-xs font-medium text-slate-200"><a href="#_" class="mr-1 underline">Jake
                            Caldwell</a> ·
                        <span class="mx-1">May 15, 2021</span> · <span class="mx-1 text-gray-600">3 min. read</span>
                    </p>
                </div>

            </div>
        </div>
    </section>
    <hr class="text-slate-200">
    {{-- footer --}}
    @include('components.footer')
@endsection
