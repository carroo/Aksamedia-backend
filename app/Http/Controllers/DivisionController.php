<?php

namespace App\Http\Controllers;

use App\Models\Division;
use Illuminate\Http\Request;

class DivisionController extends Controller
{
    public function index(Request $request)
{
    // Mengambil data berdasarkan filter jika ada
    $query = Division::query();

    if ($request->name) {
        $query->where('name', 'LIKE', '%' . $request->name . '%');
    }

    $divisions = $query->select('id', 'name')->paginate(5);

    return response()->json([
        'status' => 'success',
        'message' => 'Data retrieved successfully',
        'name' => $request->name ?? 'gaada',
        'data' => [
            'divisions' => $divisions->items(), 
            'pagination' => [
                'current_page' => $divisions->currentPage(),
                'per_page' => $divisions->perPage(),
                'total' => $divisions->total(),
                'last_page' => $divisions->lastPage(),
            ],
        ],
    ]);
}

}
