@extends('app')

@section('title', 'MusicKita | About Us')

@section('content')

    <div class="max-w-4xl mx-auto px-4 py-8">
        <!-- Header Intro -->
        <div class="bg-gray-50 rounded-xl shadow flex flex-col md:flex-row items-center text-center mb-10">
            <h3 class="text-base md:text-sm font-bold text-gray-900 mb-4 p-8">
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

        <div class="bg-gray-50 rounded-xl shadow px-8 pt-8 pb-12">
            <!-- Judul di dalam card -->
            <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">Team Member</h2>
            <p class="text-gray-700 mb-2 text-justify">
                Kami dari kelompok 3, Jurusan Administrasi Niaga Program Studi Bisnis Digital, kelas 4C, mengerjakan
                proyek ini sebagai tugas besar.
            </p>
            <!-- Isi utama: Gambar & Info -->
            <div class="flex flex-col md:flex-row items-center md:items-start gap-8">
                <!-- Gambar -->
                <div class="w-full max-w-sm">
                    <img src="{{ asset('img/about.jpg') }}" alt="Illustration"
                        class="w-full aspect-square object-cover rounded-xl shadow-sm" />
                </div>

                <!-- Informasi -->
                <div class="flex-1 w-full">


                    <!-- Card anggota -->
                    <div class="flex flex-col gap-4">
                        <div class="bg-white rounded-lg shadow p-4">
                            <div class="text-base font-medium text-gray-700 mb-1">Nursarmila</div>
                            <div class="flex ">
                                <!-- email -->
                                <a href="https://mail.google.com/mail/?view=cm&fs=1&to=nursarmila19@gmail.com"
                                    target="_blank" rel="noopener"
                                    class="inline-flex items-center justify-center w-10 h-10 border border-white rounded-full hover:bg-white hover:text-[#1A2235] transition"
                                    aria-label="Send Email">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M2 4a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v0.01L12 13 2 4.01V4zm0 2.236V20a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V6.236l-10 8.25-10-8.25z" />
                                    </svg>
                                </a>

                                <!-- Instagram -->
                                <a href="https://www.instagram.com/_ymla.als67_/?utm_source=ig_web_button_share_sheet"
                                    target="_blank" rel="noopener" aria-label="Instagram"
                                    class="inline-flex items-center justify-center w-10 h-10 border border-white rounded-full hover:bg-white hover:text-[#1A2235] transition">
                                    <!-- Instagram SVG -->
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <rect x="2" y="2" width="20" height="20" rx="5" stroke="currentColor"
                                            stroke-width="2" />
                                        <path d="M16 11.37a4 4 0 1 1-2.63-3.76A4 4 0 0 1 16 11.37z" stroke="currentColor"
                                            stroke-width="2" />
                                        <circle cx="17.5" cy="6.5" r="1.5" fill="currentColor" />
                                    </svg>
                                </a>
                                <!-- Facebook -->
                                <a href="https://facebook.com/" target="_blank" rel="noopener" aria-label="Facebook"
                                    class="inline-flex items-center justify-center w-10 h-10 border border-white rounded-full hover:bg-white hover:text-[#1A2235] transition">
                                    <!-- Facebook SVG -->
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M22.675 0h-21.35C.597 0 0 .597 0 1.326v21.348C0 23.403.597 24 1.326 24H12.82v-9.294H9.692V11.01h3.127V8.413c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.797.143v3.24l-1.918.001c-1.504 0-1.797.715-1.797 1.763v2.313h3.587l-.467 3.696h-3.12V24h6.116C23.403 24 24 23.403 24 22.674V1.326C24 .597 23.403 0 22.675 0" />
                                    </svg>
                                </a>
                                <!-- Twitter/X -->
                                <a href="https://twitter.com/" target="_blank" rel="noopener" aria-label="Twitter"
                                    class="inline-flex items-center justify-center w-10 h-10 border border-white rounded-full hover:bg-white hover:text-[#1A2235] transition">
                                    <!-- Twitter SVG -->
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M24 4.56c-.883.392-1.83.656-2.825.775a4.932 4.932 0 0 0 2.165-2.724c-.95.564-2.004.974-3.127 1.195A4.916 4.916 0 0 0 16.616 3c-2.732 0-4.946 2.21-4.946 4.932 0 .387.045.765.127 1.124C7.728 8.807 4.1 6.917 1.671 3.886A4.822 4.822 0 0 0 1 6.15c0 1.708.87 3.213 2.188 4.096a4.904 4.904 0 0 1-2.239-.616c-.054 2.281 1.581 4.415 3.949 4.89a4.935 4.935 0 0 1-2.224.083c.627 1.956 2.444 3.377 4.6 3.417A9.867 9.867 0 0 1 0 21.543a13.94 13.94 0 0 0 7.548 2.209c9.057 0 14.008-7.496 14.008-13.986 0-.213-.004-.425-.013-.636A9.936 9.936 0 0 0 24 4.56z" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <div class="bg-white rounded-lg shadow p-4">
                            <div class="text-base font-medium text-gray-700 mb-1">Amanda Ainul Fitri</div>
                            <div class="flex ">
                                <!-- email -->
                                <a href="https://mail.google.com/mail/?view=cm&fs=1&to=amandaainulfitri24@gmail.com"
                                    target="_blank" rel="noopener"
                                    class="inline-flex items-center justify-center w-10 h-10 border border-white rounded-full hover:bg-white hover:text-[#1A2235] transition"
                                    aria-label="Send Email">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M2 4a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v0.01L12 13 2 4.01V4zm0 2.236V20a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V6.236l-10 8.25-10-8.25z" />
                                    </svg>
                                </a>
                                <!-- Instagram -->
                                <a href="https://www.instagram.com/xincan_11?igsh=MXQ4bmYxanVsNGR1NQ==" target="_blank"
                                    rel="noopener" aria-label="Instagram"
                                    class="inline-flex items-center justify-center w-10 h-10 border border-white rounded-full hover:bg-white hover:text-[#1A2235] transition">
                                    <!-- Instagram SVG -->
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <rect x="2" y="2" width="20" height="20" rx="5" stroke="currentColor"
                                            stroke-width="2" />
                                        <path d="M16 11.37a4 4 0 1 1-2.63-3.76A4 4 0 0 1 16 11.37z" stroke="currentColor"
                                            stroke-width="2" />
                                        <circle cx="17.5" cy="6.5" r="1.5" fill="currentColor" />
                                    </svg>
                                </a>
                                <!-- Facebook -->
                                <a href="https://facebook.com/" target="_blank" rel="noopener" aria-label="Facebook"
                                    class="inline-flex items-center justify-center w-10 h-10 border border-white rounded-full hover:bg-white hover:text-[#1A2235] transition">
                                    <!-- Facebook SVG -->
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M22.675 0h-21.35C.597 0 0 .597 0 1.326v21.348C0 23.403.597 24 1.326 24H12.82v-9.294H9.692V11.01h3.127V8.413c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.797.143v3.24l-1.918.001c-1.504 0-1.797.715-1.797 1.763v2.313h3.587l-.467 3.696h-3.12V24h6.116C23.403 24 24 23.403 24 22.674V1.326C24 .597 23.403 0 22.675 0" />
                                    </svg>
                                </a>
                                <!-- Twitter/X -->
                                <a href="https://twitter.com/" target="_blank" rel="noopener" aria-label="Twitter"
                                    class="inline-flex items-center justify-center w-10 h-10 border border-white rounded-full hover:bg-white hover:text-[#1A2235] transition">
                                    <!-- Twitter SVG -->
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M24 4.56c-.883.392-1.83.656-2.825.775a4.932 4.932 0 0 0 2.165-2.724c-.95.564-2.004.974-3.127 1.195A4.916 4.916 0 0 0 16.616 3c-2.732 0-4.946 2.21-4.946 4.932 0 .387.045.765.127 1.124C7.728 8.807 4.1 6.917 1.671 3.886A4.822 4.822 0 0 0 1 6.15c0 1.708.87 3.213 2.188 4.096a4.904 4.904 0 0 1-2.239-.616c-.054 2.281 1.581 4.415 3.949 4.89a4.935 4.935 0 0 1-2.224.083c.627 1.956 2.444 3.377 4.6 3.417A9.867 9.867 0 0 1 0 21.543a13.94 13.94 0 0 0 7.548 2.209c9.057 0 14.008-7.496 14.008-13.986 0-.213-.004-.425-.013-.636A9.936 9.936 0 0 0 24 4.56z" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <div class="bg-white rounded-lg shadow p-4">
                            <div class="text-base font-medium text-gray-700 mb-1">Nurhidayah Dewi Amanda</div>
                            <div class="flex ">
                                <!-- email -->
                                <a href="https://mail.google.com/mail/?view=cm&fs=1&to=nurhidayahdewiamanda@gamail.com"
                                    target="_blank" rel="noopener"
                                    class="inline-flex items-center justify-center w-10 h-10 border border-white rounded-full hover:bg-white hover:text-[#1A2235] transition"
                                    aria-label="Send Email">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M2 4a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v0.01L12 13 2 4.01V4zm0 2.236V20a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V6.236l-10 8.25-10-8.25z" />
                                    </svg>
                                </a>
                                <!-- Instagram -->
                                <a href="https://www.instagram.com/luv_dewi03?igsh=MWZrZm1zMnlqNjhscw==" target="_blank"
                                    rel="noopener" aria-label="Instagram"
                                    class="inline-flex items-center justify-center w-10 h-10 border border-white rounded-full hover:bg-white hover:text-[#1A2235] transition">
                                    <!-- Instagram SVG -->
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <rect x="2" y="2" width="20" height="20" rx="5"
                                            stroke="currentColor" stroke-width="2" />
                                        <path d="M16 11.37a4 4 0 1 1-2.63-3.76A4 4 0 0 1 16 11.37z" stroke="currentColor"
                                            stroke-width="2" />
                                        <circle cx="17.5" cy="6.5" r="1.5" fill="currentColor" />
                                    </svg>
                                </a>
                                <!-- Facebook -->
                                <a href="https://facebook.com/" target="_blank" rel="noopener" aria-label="Facebook"
                                    class="inline-flex items-center justify-center w-10 h-10 border border-white rounded-full hover:bg-white hover:text-[#1A2235] transition">
                                    <!-- Facebook SVG -->
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M22.675 0h-21.35C.597 0 0 .597 0 1.326v21.348C0 23.403.597 24 1.326 24H12.82v-9.294H9.692V11.01h3.127V8.413c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.797.143v3.24l-1.918.001c-1.504 0-1.797.715-1.797 1.763v2.313h3.587l-.467 3.696h-3.12V24h6.116C23.403 24 24 23.403 24 22.674V1.326C24 .597 23.403 0 22.675 0" />
                                    </svg>
                                </a>
                                <!-- Twitter/X -->
                                <a href="https://twitter.com/" target="_blank" rel="noopener" aria-label="Twitter"
                                    class="inline-flex items-center justify-center w-10 h-10 border border-white rounded-full hover:bg-white hover:text-[#1A2235] transition">
                                    <!-- Twitter SVG -->
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M24 4.56c-.883.392-1.83.656-2.825.775a4.932 4.932 0 0 0 2.165-2.724c-.95.564-2.004.974-3.127 1.195A4.916 4.916 0 0 0 16.616 3c-2.732 0-4.946 2.21-4.946 4.932 0 .387.045.765.127 1.124C7.728 8.807 4.1 6.917 1.671 3.886A4.822 4.822 0 0 0 1 6.15c0 1.708.87 3.213 2.188 4.096a4.904 4.904 0 0 1-2.239-.616c-.054 2.281 1.581 4.415 3.949 4.89a4.935 4.935 0 0 1-2.224.083c.627 1.956 2.444 3.377 4.6 3.417A9.867 9.867 0 0 1 0 21.543a13.94 13.94 0 0 0 7.548 2.209c9.057 0 14.008-7.496 14.008-13.986 0-.213-.004-.425-.013-.636A9.936 9.936 0 0 0 24 4.56z" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

@endsection
