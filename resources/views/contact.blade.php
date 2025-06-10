@extends('app')

@section('title', 'MusicKita | Contact Us')

@section('content')

    <div class="max-w-6xl mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Contact Form -->
            <div class="md:col-span-2 bg-white rounded-xl shadow p-8">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-3">Tinggalkan Pesan</h2>
                <p class="text-gray-500 mb-8">
                    Alamat email Anda tidak akan dipublikasikan. Kolom yang wajib diisi ditandai dengan <span
                        class="text-red-500">*</span>
                </p>
                <form>
                    <div class="mb-4">
                        <input type="text" placeholder="Name"
                            class="w-full px-5 py-3 rounded-lg border border-gray-200 bg-gray-50 text-gray-900 focus:outline-none focus:border-accent transition" />
                    </div>
                    <div class="mb-4">
                        <input type="email" placeholder="Email"
                            class="w-full px-5 py-3 rounded-lg border border-gray-200 bg-gray-50 text-gray-900 focus:outline-none focus:border-accent transition" />
                    </div>
                    <div class="mb-6">
                        <textarea placeholder="Write Comments" rows="5"
                            class="w-full px-5 py-3 rounded-lg border border-gray-200 bg-gray-50 text-gray-900 focus:outline-none focus:border-accent transition"></textarea>
                    </div>
                    <button type="submit"
                        class="bg-lime-400 text-gray-900 font-semibold px-8 py-3 rounded shadow hover:bg-lime-300 transition">
                        Submit Comment &rarr;
                    </button>
                </form>
            </div>
            <!-- Contact Info -->
            <div class="bg-white rounded-xl shadow p-8 flex flex-col gap-6">
                <h2 class="text-2xl md:text-2xl font-bold text-gray-900 mb-4">Feel Free To Contact Me Anytime</h2>
                <div class="bg-gray-50 rounded-lg p-4">
                    <div class="text-xs text-gray-500 mb-1">Email</div>
                    <div class="font-semibold text-gray-900">Davidmatias333@Gmail.Com</div>
                </div>
                <div class="bg-gray-50 rounded-lg p-4">
                    <div class="text-xs text-gray-500 mb-1">Phone</div>
                    <div class="font-semibold text-gray-900">+(2) 871 382 023</div>
                </div>
                <div class="bg-gray-50 rounded-lg p-4">
                    <div class="text-xs text-gray-500 mb-1">Address</div>
                    <div class="font-semibold text-gray-900">Victoria Street London</div>
                </div>
            </div>
        </div>
    </div>

@endsection
