<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Shuttle;
use Illuminate\Http\Request;

class ShuttleApiController extends Controller
{
    public function index()
    {
        $data = Shuttle::all();

        return response()->json([
            'message' => 'berhasil mengambil data',
            'data' => $data
        ], 200);
    }

    public function show($id)
    {
        $data = Shuttle::find($id);

        if (!$data) {
            return response()->json([
                'message' => 'Data tidak ditemukan',
                'data' => null
            ], 404);
        }

        return response()->json([
            'message' => 'Detail data ditemukan',
            'data' => $data
        ], 200);
    }

    public function store(Request $request)
{
    // Tahap C: simulasi autentikasi Bearer Token
     if ($request->bearerToken() !== 'TOKEN-RAHASIA-123') {
        return response()->json(['message' => 'Unauthorized'], 401);
    }

    $validated = $request->validate([
        'nama_armada'      => 'required|string|max:255',
        'kapasitas'        => 'required|integer|min:1',
        'rute_operasional' => 'nullable|string|max:255',
        'status_aktif'     => 'boolean',
    ]);

    $shuttle = Shuttle::create($validated);

    return response()->json([
        'message' => 'Data shuttle berhasil disimpan',
        'data'    => $shuttle
    ], 201);
}
}