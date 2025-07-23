<?php
namespace App\Livewire;
use Livewire\Component;
use App\Models\Layanan;
use App\Models\Reservasi;

class LayananDanReservasi extends Component
{
    public $layanan_id;
    public $nama_pelanggan;
    public $no_hp;
    public $tanggal;
    public $jam;

    public function submit()
    {
        $this->validate([
            'layanan_id' => 'required|exists:layanans,id',
            'nama_pelanggan' => 'required|string|max:100',
            'no_hp' => 'required|string|max:20',
            'tanggal' => 'required|date',
            'jam' => 'required',
        ]);

        Reservasi::create([
            'layanan_id' => $this->layanan_id,
            'nama_pelanggan' => $this->nama_pelanggan,
            'no_hp' => $this->no_hp,
            'tanggal' => $this->tanggal,
            'jam' => $this->jam,
        ]);

        session()->flash('message', 'Reservasi berhasil dikirim!');
        $this->reset();
    }

    public function render()
    {
        return view('livewire.layanan-dan-reservasi', [
            'layanans' => Layanan::all(),
        ]);
    }
}
