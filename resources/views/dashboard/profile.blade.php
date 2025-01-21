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
            <div class="card bg-base-100 w-auto lg:w-1/2 shadow-xl">
                <div class="card-body">
                    <h2 class="card-title">Your Data</h2>
                    <table class="mt-5">
                        <tr>
                            <td>username</td>
                            <td>:</td>
                            <td>{{ $userLogin->username }}</td>
                        </tr>
                        <tr>
                            <td>email</td>
                            <td>:</td>
                            <td>{{ $userLogin->email }}</td>
                        </tr>
                    </table>
                    <div class="card-actions justify-end">
                        <button class="btn btn-primary" onclick="showCardEditProfile()" id="btn-edit">Edit</button>
                    </div>
                </div>
            </div>
            <div id="card-edit-profile" class="hidden mt-5 card bg-base-100 w-auto lg:w-1/2 shadow-xl">
                <div class="card-body">
                    <h2 class="card-title">Edit Data</h2>
                    <form action="{{ route('dashboard.update-profile', ['id' => $userLogin->id]) }}" method="post">
                        @csrf
                        <div class="mb-2">
                            <label class="form-control w-full max-w-xs">
                                <div class="label">
                                    <span class="label-text font-semibold">username</span>
                                </div>
                                <input type="text" name="username" placeholder="Type here"
                                    class="input input-bordered input-accent w-full max-w-xs" value="{{ $userLogin->username }}" />
                                <div class="label">
                                    @error('username')
                                    <span class="label-text-alt">{{ $message }}</span>
                                    @enderror
                                </div>
                            </label>
                        </div>
                        <div class="mb-2">
                            <label class="form-control w-full max-w-xs">
                                <div class="label">
                                    <span class="label-text font-semibold">email</span>
                                </div>
                                <input type="email" name="email" placeholder="Type here"
                                    class="input input-bordered input-accent w-full max-w-xs" value="{{ $userLogin->email }}" />
                                <div class="label">
                                    @error('email')
                                    <span class="label-text-alt">{{ $message }}</span>
                                    @enderror
                                </div>
                            </label>
                        </div>
                        <div class="card-actions justify-end">
                            <button type="submit" class="btn btn-primary">Save Change</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="mt-5 card bg-base-100 w-auto lg:w-1/2 shadow-xl">
                <div class="card-body">
                    <h2 class="card-title">Change Password</h2>
                    <form action="{{ route('dashboard.change-password', ['id' => $userLogin->id]) }}" method="post">
                        @csrf
                        <div class="mb-2">
                            <label class="form-control w-full max-w-xs">
                                <div class="label">
                                    <span class="label-text font-semibold">Password Current</span>
                                </div>
                                <input type="password" name="password_current" placeholder="Type here"
                                    class="input input-bordered input-accent w-full max-w-xs" />
                                <div class="label">
                                    @error('password_current')
                                        <span class="label-text-alt text-red-600">{{ $message }}</span>
                                    @enderror
                                </div>
                            </label>
                        </div>
                        <div class="mb-2">
                            <label class="form-control w-full max-w-xs">
                                <div class="label">
                                    <span class="label-text font-semibold">Password New</span>
                                </div>
                                <input type="password" name="password_new" placeholder="Type here"
                                    class="input input-bordered input-accent w-full max-w-xs" />
                                <div class="label">
                                    @error('password_new')
                                        <span class="label-text-alt text-red-600">{{ $message }}</span>
                                    @enderror
                                </div>
                            </label>
                        </div>
                        <div class="card-actions justify-end">
                            <button type="submit" class="btn btn-primary">Save Change</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="mt-5 border border-red-500 card bg-base-100 w-auto lg:w-1/2 shadow-xl">
                <div class="card-body">
                    <h2 class="card-title">Danger Zone</h2>
                    <p>Delete your account</p>
                    <div class="card-actions justify-end">
                        <form action="{{ route('dashboard.delete-user', ['id' => $userLogin->id]) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-error text-white" onclick="return confirm('Sure delete this  account? \nEvery article also deleted')" type="submit">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Content -->
    </main>

    <script>
        const cardEditProfile = document.getElementById('card-edit-profile');
        const btnEdit = document.getElementById('btn-edit');

        function showCardEditProfile() {
            cardEditProfile.classList.toggle('hidden');

            if(btnEdit.innerText == 'Edit') {
                btnEdit.innerText = 'Close';
            } else {
                btnEdit.innerText = 'Edit'
            }
        }

        // handle toast
        function hiddenToast(triger) {
            const toastMessage = document.querySelector(`.${triger}`);
            toastMessage.classList.add('hidden');
        }
    </script>
@endsection
