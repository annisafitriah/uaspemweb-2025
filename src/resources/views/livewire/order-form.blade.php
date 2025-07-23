<div>
    <x-layouts.app>
        <div class="max-w-xl mx-auto bg-white p-6 rounded shadow">
            <h2 class="text-2xl font-bold mb-4">Form Pemesanan</h2>

            <div class="mb-4">
                <p><strong>Kue:</strong> {{ $cake->name }}</p>
                <p><strong>Harga Satuan:</strong> Rp {{ number_format($cake->price, 0, ',', '.') }}</p>
            </div>

            <form wire:submit.prevent="placeOrder">
                <div class="mb-4">
                    <label class="block text-sm font-medium">Nama Pemesan</label>
                    <input type="text" wire:model="customer_name"
                           class="w-full border rounded px-3 py-2 mt-1">
                    @error('customer_name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium">Alamat Pemesan</label>
                    <textarea wire:model="customer_address"
                              class="w-full border rounded px-3 py-2 mt-1" rows="3"></textarea>
                    @error('customer_address') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium">Jumlah</label>
                    <input type="number" wire:model="quantity" min="1"
                           class="w-full border rounded px-3 py-2 mt-1">
                    @error('quantity') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <button type="submit"
                        class="bg-rose-600 hover:bg-rose-700 text-white px-4 py-2 rounded">
                    Buat Pesanan
                </button>
            </form>
        </div>
    </x-layouts.app>
</div>
