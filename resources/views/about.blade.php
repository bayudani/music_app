@extends('app')

@section('title', 'MusicKita | About Us')

@section('content')

    <div class="min-h-screen bg-white py-12 rounded-xl mx-32 my-8">
        <div class="max-w-4xl mx-auto px-4 ">
            <!-- Header Intro -->
            <div class="text-center mb-10">
                <h3 class="text-base md:text-sm font-bold text-gray-900 mb-4">
                    <span class="block text-base md:text-sm lg:text-lg font-reguler text-gray-900 mb-2">
                        Nikmati Musik Tanpa Batas di Musickita!
                    </span>
                    <span class="block text-justify text-gray-600 font-medium">
                        Temukan jutaan lagu, album, dan artis favorit hanya dalam satu genggaman. Dengan Musickita, kamu
                        bisa streaming musik kapan saja dan di mana saja, menciptakan playlist pribadi, dan menemukan
                        rekomendasi lagu yang sesuai dengan seleramu.<br>
                        Rasakan pengalaman mendengarkan musik yang lebih personal dan interaktif—temukan hits terbaru,
                        genre unik, hingga karya musisi lokal yang inspiratif.<br>
                        Gabung sekarang di Musickita, jadikan setiap harimu lebih berwarna bersama irama pilihanmu!
                        Musickita – Musik, Cerita, Kita.
                    </span>
                </h3>
            </div>

            <!-- Personal Info Card -->
            <div class="bg-gray-50 rounded-xl shadow flex flex-col md:flex-row items-center md:items-start gap-8 p-8">
                <!-- Image -->
                <div class="flex-shrink-0 mb-6 md:mb-0">
                    <img src="{{ asset('stora/about-illustration.png') }}" alt="Illustration"
                        class="w-56 h-56 md:w-64 md:h-64 object-contain" />
                    <!-- Ganti src dengan path sesuai, misal 'storage/about-illustration.png' atau sesuaikan -->
                    <!-- Atau jika ingin memakai gambar user: -->
                    <!-- <img src="{{ asset('storage/your-image.png') }}" alt="..." class="..." /> -->
                    <!-- Atau gunakan referensi gambar yang sudah diupload -->
                    <!-- ![image1](image1) -->
                </div>
                <!-- Info -->
                <div class="flex-1 w-full">
                    <h2 class="text-2xl font-bold text-gray-900 mb-3">Team Member </h2>
                    <p class="text-gray-700 mb-6">
                        Kami dari kelompok 3, Jurusan Administrasi Niaga Program Studi Bisnis Digital, kelas 4a, mengerjakan
                        proyek ini sebagai tugas besar.
                    </p>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="bg-white rounded-lg shadow p-4">
                            <div class="text-xs text-gray-500 mb-1">a</div>
                            <div class="font-semibold text-gray-900">Matias999@Gmail.Com</div>                            <div class="font-semibold text-gray-900">Matias999@Gmail.Com</div>
                        </div>
                        <div class="bg-white rounded-lg shadow p-4">
                            <div class="text-xs text-gray-500 mb-1">b</div>
                            <div class="font-semibold text-gray-900">+(2) 871 382 023</div>                            <div class="font-semibold text-gray-900">+(2) 871 382 023</div>
                        </div>
                        <div class="bg-white rounded-lg shadow p-4">
                            <div class="text-xs text-gray-500 mb-1">c</div>
                            <div class="font-semibold text-gray-900">Victoria Street London,</div>
                            <div class="font-semibold text-gray-900">Victoria Street London,</div>
                        </div>
                        {{-- <div class="bg-white rounded-lg shadow p-4 flex items-center gap-3">
                            <div class="flex gap-3 text-gray-700 text-lg mt-1">
                                <a href="#"><i class="fab fa-facebook"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-linkedin"></i></a>
                                <a href="#"><i class="fab fa-github"></i></a>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
