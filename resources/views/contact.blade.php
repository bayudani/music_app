@extends('app')

@section('title', 'MusicKita | Contact Us')

@section('content')
    <div class="max-w-6xl mx-auto px-4 py-8 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Contact Form -->
            <div class="lg:col-span-2 bg-white rounded-xl shadow p-6 sm:p-8">
                <h2 class="text-xl sm:text-2xl md:text-3xl font-bold text-gray-900 mb-3">Tinggalkan Pesan</h2>
                <p class="text-sm sm:text-base text-gray-500 mb-6">
                    Alamat email Anda tidak akan dipublikasikan.
                </p>
                <form class="space-y-4">
                    <div>
                        <input type="text" placeholder="Nama"
                            class="w-full px-4 py-3 rounded-lg border border-gray-200 bg-gray-50 text-gray-900 focus:outline-none focus:border-accent transition" />
                    </div>
                    <div>
                        <input type="email" placeholder="Email"
                            class="w-full px-4 py-3 rounded-lg border border-gray-200 bg-gray-50 text-gray-900 focus:outline-none focus:border-accent transition" />
                    </div>
                    <div>
                        <textarea placeholder="Tulis Pesan" rows="5"
                            class="w-full px-4 py-3 rounded-lg border border-gray-200 bg-gray-50 text-gray-900 focus:outline-none focus:border-accent transition"></textarea>
                    </div>
                    <div>
                        <button type="submit"
                            class="w-full sm:w-auto bg-blue-500 text-gray-900 font-semibold px-6 py-3 rounded shadow hover:bg-blue-700 transition">
                            Submit Comment &rarr;
                        </button>
                    </div>
                </form>
            </div>

            <!-- Contact Info -->
            <div class="bg-white rounded-xl shadow p-6 sm:p-8 flex flex-col gap-6">
                <h2 class="text-xl sm:text-2xl font-bold text-gray-900 mb-4">Jangan Ragu Untuk Hubungi Kami Kapan Saja</h2>

                <div class="bg-gray-50 rounded-lg p-4">
                    <div class="text-xs text-gray-700 mb-1">Email</div>
                    <div class="font-semibold text-gray-700 break-words">musickita@gmail.com</div>
                </div>
                <div class="bg-gray-50 rounded-lg p-4">
                    <div class="text-xs text-gray-700 mb-1">Telepon</div>
                    <div class="font-semibold text-gray-700">+62 853 4455 6789</div>
                </div>
                <div class="bg-gray-50 rounded-lg p-4">
                    <div class="text-xs text-gray-700 mb-1">Alamat</div>
                    <div class="font-semibold text-gray-700">
                        Jl. Bathin Alam, Sungai Alam, Bengkalis - Riau 28712
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
