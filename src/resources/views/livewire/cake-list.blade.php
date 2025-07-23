<div class="py-16 px-6 bg-pink-100 min-h-screen">
    <h1 class="text-5xl font-bold text-center text-rose-700 mb-12">Daftar Kue Kami</h1>

    <div class="overflow-x-auto">
        <div class="flex gap-x-10 w-max px-4">
            @foreach($cakes as $cake)
                <div class="bg-white rounded-xl shadow-md w-60 flex-shrink-0 hover:shadow-lg transition duration-300 ease-in-out">
                    {{-- Gambar lebih kecil --}}
                    <div class="w-full h-32 bg-gray-100 overflow-hidden rounded-t-xl">
                        <img src="{{ asset('storage/' . $cake->image_path) }}"
                             alt="{{ $cake->name }}"
                             class="w-full h-full object-cover">
                    </div>

                    {{-- Konten --}}
                    <div class="p-4 flex flex-col justify-between h-44">
                        <div>
                            <h2 class="text-base font-semibold text-gray-800">{{ $cake->name }}</h2>
                            <p class="text-gray-600 text-sm mt-1 mb-2 line-clamp-2">{{ $cake->description }}</p>
                            <p class="text-sm font-bold text-rose-600">Rp {{ number_format($cake->price, 0, ',', '.') }}</p>
                        </div>
                        <div class="mt-4">
                            <a href="{{ route('order.form', $cake->id) }}"
                               class="block text-center bg-rose-600 text-white py-2 px-4 rounded hover:bg-rose-700 transition">
                                Pesan Sekarang
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
