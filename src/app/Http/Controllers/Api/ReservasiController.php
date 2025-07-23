<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Reservasi;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

class ReservasiController extends Controller
{
    /**
     * Menyimpan reservasi baru (POST /api/reservasi)
     */
    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'layanan_id'      => 'required|exists:layanans,id',
            'nama_pelanggan'  => 'required|string|max:100',
            'no_hp'           => 'required|string|max:20',
            'tanggal'         => 'required|date',
            'jam'             => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors'  => $validator->errors()
            ], 422);
        }

        $reservasi = Reservasi::create([
            'layanan_id'     => $request->layanan_id,
            'nama_pelanggan' => $request->nama_pelanggan,
            'no_hp'          => $request->no_hp,
            'tanggal'        => $request->tanggal,
            'jam'            => $request->jam,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Reservasi berhasil dibuat.',
            'data'    => $reservasi->load('layanan')
        ]);
    }

    /**
     * Menampilkan semua reservasi (GET /api/reservasi)
     */
    public function index(): JsonResponse
    {
        $reservasis = Reservasi::with('layanan')->latest()->get();

        return response()->json([
            'success' => true,
            'data'    => $reservasis
        ]);
    }
}
    