@extends('layouts.main')

@section('main')
    {{-- articles --}}
    <section class="bg-black">
        <div class="mx-auto max-w-7xl">
            @include('components.navbar')
        </div>
        <section class="mx-5 lg:mx-24 mt-10">
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
            <article class="pl-5 pb-5 lg:pb-10 lg:mt-10">
                <p class="max-w-3xl mt-5 text-xl text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Delectus iure dolore rem consectetur distinctio nesciunt libero nobis pariatur. Asperiores, commodi,
                    soluta architecto, rem nulla recusandae minus voluptatibus ad sapiente nisi est ullam ut numquam
                    exercitationem accusamus delectus? Nisi eveniet hic numquam ipsam eum necessitatibus, quos minima ipsa
                    corrupti blanditiis, voluptates ab. Asperiores autem nemo quisquam, dicta quo cupiditate nam consectetur
                    vero eveniet tempore. Libero eveniet repudiandae, placeat illo quod id doloribus inventore natus
                    deserunt tempore cum quibusdam consequatur maiores, cumque iure explicabo dolorem, sint dolorum quis
                    rerum quam nulla? Explicabo iure nemo sint repellat, architecto cupiditate nesciunt dicta error aut
                    molestias! Assumenda doloribus magnam ducimus mollitia molestiae aut nobis? Atque id corporis et nobis
                    corrupti consequatur. Assumenda incidunt sint quaerat nisi ex ipsum nemo a iusto, quasi voluptates quis,
                    alias praesentium ab tempora ea. Adipisci, dolores natus tempora id tempore commodi voluptates ullam
                    nihil voluptas reprehenderit repellendus laborum, quisquam nam dolorum soluta! Cupiditate delectus
                    labore dicta! Labore aliquid, exercitationem natus esse expedita quos architecto porro magni
                    perspiciatis facere temporibus aliquam at dolores sequi eligendi quia, enim dolorem, voluptates
                    doloremque? Amet, inventore reprehenderit? Soluta consectetur distinctio voluptatum nesciunt esse natus
                    quod eveniet dolores sed labore sequi itaque velit nam, officiis repellat.</p>
                <p class="max-w-3xl mt-5 text-xl text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Delectus iure dolore rem consectetur distinctio nesciunt libero nobis pariatur. Asperiores, commodi,
                    soluta architecto, rem nulla recusandae minus voluptatibus ad sapiente nisi est ullam ut numquam
                    exercitationem accusamus delectus? Nisi eveniet hic numquam ipsam eum necessitatibus, quos minima ipsa
                    corrupti blanditiis, voluptates ab. Asperiores autem nemo quisquam, dicta quo cupiditate nam consectetur
                    vero eveniet tempore. Libero eveniet repudiandae, placeat illo quod id doloribus inventore natus
                    deserunt tempore cum quibusdam consequatur maiores, cumque iure explicabo dolorem, sint dolorum quis
                    rerum quam nulla? Explicabo iure nemo sint repellat, architecto cupiditate nesciunt dicta error aut
                    molestias! Assumenda doloribus magnam ducimus mollitia molestiae aut nobis? Atque id corporis et nobis
                    corrupti consequatur. Assumenda incidunt sint quaerat nisi ex ipsum nemo a iusto, quasi voluptates quis,
                    alias praesentium ab tempora ea. Adipisci, dolores natus tempora id tempore commodi voluptates ullam
                    nihil voluptas reprehenderit repellendus laborum, quisquam nam dolorum soluta! Cupiditate delectus
                    labore dicta! Labore aliquid, exercitationem natus esse expedita quos architecto porro magni
                    perspiciatis facere temporibus aliquam at dolores sequi eligendi quia, enim dolorem, voluptates
                    doloremque? Amet, inventore reprehenderit? Soluta consectetur distinctio voluptatum nesciunt esse natus
                    quod eveniet dolores sed labore sequi itaque velit nam, officiis repellat.</p>
            </article>
        </section>
    </section>
    <hr class="text-slate-200">
    {{-- footer --}}
    @include('components.footer')
@endsection
