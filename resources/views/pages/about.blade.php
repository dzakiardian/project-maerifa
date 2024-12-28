@extends('layouts.main')

@section('main')
    {{-- articles --}}
    <section class="bg-black">
        <div class="mx-auto max-w-7xl">
            @include('components.navbar')
        </div>
        <div class="h-screen about p-5">
            <h1 class="text-white text-3xl font-semibold text-center">What is Maerifa?</h1>
            <p class="max-w-3xl mt-5 mx-auto text-xl text-gray-500">Maerifa merupakan forum untuk belajar bersama dengan membuat atau membaca artikel. dalam forum ini tidak membahas ilmu spesifik atau hanya mendalami satu bidang ilmu saja, akan tetapi forum ini membahas banyak ilmu apapun sesuai dengan ilmu yang sudah banyak orang bagikan dalam forum ini.</p>
            <p class="max-w-3xl mt-5 mx-auto text-xl text-gray-500">jika kamu mempunyai ilmu jangan sungkan untuk membagikan nya kepada orang lain melalui forum maerifa ini. jangan merasa malu ataupun minder, semua karya artikel disini akan sangat dihargai tanpa terkecuali. bagikanlah pengetahuanmu sebanyak mungkin dalam forum ini karena siapa tau dengan ilmu yang kamu bagikan dapat membantu atau mengubah hidup seseorang jauh lebih baik lagi.</p>
            <p class="max-w-3xl mt-5 mx-auto text-xl text-gray-500">Dalam forum ini memang bebas kamu bisa membuat artikel seperti apapun tapi <span class="text-red-500">jangan sampai mengclaim/plagiasi/mencomot karya milik orang lain tanpa izin!!</span></p>
        </div>
    </section>
    <hr class="text-slate-200">
    {{-- footer --}}
    @include('components.footer')
@endsection
