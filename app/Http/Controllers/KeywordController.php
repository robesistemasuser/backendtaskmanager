<?php

namespace App\Http\Controllers;

use App\Models\Keyword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class KeywordController extends Controller
{
    public function index()
    {
        return Keyword::select('id', 'name')->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:keywords,name',
        ]);

        $keyword = Keyword::create([
            'name' => $request->name
        ]);

        return response()->json([
            'id' => $keyword->id,
            'name' => $keyword->name
        ], 201);
    }

    public function destroy($id)
    {
        $keyword = Keyword::find($id);

        if (!$keyword) {
            Log::warning("❌ Palabra clave no encontrada para eliminar. ID: $id");
            return response()->json(['message' => 'Palabra clave no encontrada.'], 404);
        }

        $keyword->delete();

        Log::info("✅ Palabra clave eliminada correctamente. ID: $id");

        return response()->json(['message' => 'Palabra clave eliminada.']);
    }
}
