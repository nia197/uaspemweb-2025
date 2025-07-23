<div class="max-w-4xl mx-auto p-6 bg-white shadow rounded">
    <h2 class="text-2xl font-bold mb-4">Daftar Layanan Kecantikan</h2>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
        @foreach ($layanans as $layanan)
            <div class="p-4 border rounded shadow-sm">
                <h3 class="text-lg font-semibold">{{ $layanan->nama }}</h3>
                <p class="text-sm text-gray-600 mb-1">Rp {{ number_format($layanan->harga) }}</p>
                <p class="text-sm">{{ $layanan->deskripsi }}</p>
                <button wire:click="$set('layanan_id', {{ $layanan->id }})" class="mt-2 bg-pink-500 text-white px-3 py-1 rounded">
                    Pilih Layanan Ini
                </button>
            </div>
        @endforeach
    </div>

    @if ($layanan_id)
        <div class="bg-gray-100 p-4 rounded shadow-inner">
            <h2 class="text-xl font-semibold mb-3">Form Reservasi</h2>

            @if (session()->has('message'))
                <div class="bg-green-100 text-green-800 p-2 mb-3">
                    {{ session('message') }}
                </div>
            @endif

            <form wire:submit.prevent="submit" class="grid grid-cols-1 gap-4">
                <input type="hidden" wire:model="layanan_id" />

                <div>
                    <label class="block text-sm font-medium">Nama Lengkap</label>
                    <input type="text" wire:model="nama_pelanggan" class="w-full border p-2 rounded" />
                    @error('nama_pelanggan') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium">Nomor HP</label>
                    <input type="text" wire:model="no_hp" class="w-full border p-2 rounded" />
                    @error('no_hp') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium">Tanggal Reservasi</label>
                    <input type="date" wire:model="tanggal" class="w-full border p-2 rounded" />
                    @error('tanggal') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium">Jam</label>
                    <input type="time" wire:model="jam" class="w-full border p-2 rounded" />
                    @error('jam') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>

                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">
                    Kirim Reservasi
                </button>
            </form>
        </div>
    @endif
</div>
