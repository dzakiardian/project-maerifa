@extends('layouts.main')

@section('main')
<section class="md:h-screen flex items-center px-8 py-16 bg-black xl:px-8">
    <div class="max-w-5xl mx-auto border border-white p-5 rounded-lg">
        <div class="flex flex-col items-center md:flex-row">

            <div class="w-full space-y-5 mb-5 md:md-0 md:w-3/5 md:pr-16">
                <p class="font-medium text-white uppercase">Maerifa</p>
                <h2 class="text-2xl font-extrabold leading-none text-white sm:text-3xl md:text-5xl">
                    The best article forum of all time.
                </h2>
                <p class="text-xl text-gray-600 md:pr-16">Mari belajar dan berkembang bersama maerifa.</p>
            </div>
            <div class="w-full mt-16 md:mt-0 md:w-2/5">
                <form action="{{ route('register') }}" method="post">
                    @csrf
                    <div class="relative z-10 h-auto p-8 py-10 overflow-hidden bg-white border-b-2 border-gray-300 rounded-lg shadow-2xl px-7 p-5" data-rounded="rounded-lg" data-rounded-max="rounded-full">
                        <h3 class="mb-6 text-2xl font-medium text-center">Sign up your Account</h3>
                        <input type="text" name="username" id="username" class="block w-full px-4 py-3 mb-4 border border-2 border-transparent border-gray-200 rounded-lg focus:ring focus:ring-blue-500 focus:outline-none" data-rounded="rounded-lg" data-primary="blue-500" placeholder="Username">
                        <input type="email" name="email" id="email" class="block w-full px-4 py-3 mb-4 border border-2 border-transparent border-gray-200 rounded-lg focus:ring focus:ring-blue-500 focus:outline-none" data-rounded="rounded-lg" data-primary="blue-500" placeholder="Email address">
                        <input type="password" name="password" id="password" class="block w-full px-4 py-3 mb-4 border border-2 border-transparent border-gray-200 rounded-lg focus:ring focus:ring-blue-500 focus:outline-none" data-rounded="rounded-lg" data-primary="blue-500" placeholder="Password">
                        <div class="block">
                            <button type="submit" class="w-full px-3 py-4 font-medium text-white bg-green-500 rounded-lg mb-3" data-primary="blue-600" data-rounded="rounded-lg">Sign Up</button>
                            {{-- <button class="w-full px-3 py-4 font-medium text-white bg-blue-600 rounded-lg" data-primary="blue-600" data-rounded="rounded-lg">Sign Up with Google</button> --}}
                        </div>
                        <p class="w-full mt-4 text-sm text-center text-gray-500">Have an account? <a href="/login" class="text-blue-500 underline">Sign in here</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="toast toast-top toast-end z-10">
        @error('username')
        <div class="flex alert alert-error toast-username">
            <span>{{ $message }}</span>
            <button class="btn btn-sm btn-outline" onclick="hiddenToast('toast-username')">X</button>
        </div>
        @enderror
        @error('email')
        <div class="flex alert alert-error toast-email">
            <span>{{ $message }}</span>
            <button class="btn btn-sm btn-outline" onclick="hiddenToast('toast-email')">X</button>
        </div>
        @enderror
        @error('password')
        <div class="flex alert alert-error toast-password">
            <span>{{ $message }}</span>
            <button class="btn btn-sm btn-outline" onclick="hiddenToast('toast-password')">X</button>
        </div>
        @enderror
        @session('error-message')
        <div class="flex alert alert-error toast-incorret">
            <span>{{ session('error-message') }}</span>
            <button class="btn btn-sm btn-outline" onclick="hiddenToast('toast-incorret')">X</button>
        </div>
        @endsession
    </div>
    <script>
        function hiddenToast(triger) {
            const toastMessage = document.querySelector(`.${triger}`);
            toastMessage.classList.add('hidden');
        }

        const inputEmail = document.getElementById('email');
        const emailInSession = sessionStorage.getItem('email');
        if(emailInSession) {
            inputEmail.value = emailInSession;
        }
    </script>
</section>
@endsection
