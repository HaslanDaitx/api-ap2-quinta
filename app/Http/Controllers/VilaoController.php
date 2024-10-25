<?php

namespace App\Http\Controllers;

use App\Models\Vilao;
use App\Responses\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VilaoController extends Controller
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

        $vilao = Vilao::create($request->all());
        return JsonResponse::success('Vilão criado com sucesso!', $vilao);
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

        $vilao = Vilao::findOrFail($id);
        $vilao->update($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Vilão atualizado com sucesso!',
            'data' => $vilao
        ], 200);
    }

    public function listarTodos()
    {
        $vilao = Vilao::all();
        return JsonResponse::success('Vilão listado com sucesso!', $vilao);
    }

    public function exibirPeloId($id)
    {
        $vilao = Vilao::findOrFail($id);
        return JsonResponse::success('Vilão localizado com sucesso!', $vilao);
    }

    public function excluir($id)
    {
        $vilao = Vilao::findOrFail($id);
        $vilao->delete();
        
        return JsonResponse::success('Vilão eliminado com sucesso!', $vilao);
    }
}