<?php

namespace App\Http\Controllers;

use App\Models\Heroi;
use App\Responses\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HeroiController extends Controller
{
    public function criar(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required|string|max:200',
            'universo' => 'required|string|max:100',
            'pontoDePoder' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        $heroi = Heroi::create($request->all());
        return JsonResponse::success('Herói criado com sucesso!', $heroi);
    }

    public function editar(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required|string|max:200',
            'universo' => 'required|string|max:100',
            'pontoDePoder' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        $heroi = Heroi::findOrFail($id);
        $heroi->update($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Herói atualizado com sucesso!',
            'data' => $heroi
        ], 200);
    }

    public function listarTodos()
    {
        $heroi = Heroi::all();
        return JsonResponse::success('Herói listado com sucesso!', $heroi);
    }

    public function exibirPeloId($id)
    {
        $heroi = Heroi::findOrFail($id);
        return JsonResponse::success('Herói localizado com sucesso!', $heroi);
    }
    
    public function excluir($id)
    {
        $heroi = Heroi::findOrFail($id);
        $heroi->delete();
        
        return JsonResponse::success('Herói eliminado com sucesso!', $heroi);
    }
}