<?php

namespace App\Http\Controllers\API;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Log;

class UsuarioController extends BaseController
{
    // LISTAR TODOS
    public function index()
    {
        try {
            // Verificamos si hay usuarios y cargamos sus roles
            $usuarios = Usuario::with('roles')->get();
            return response()->json($usuarios, 200);
        } catch (\Exception $e) {
            Log::error("Error en UsuarioController@index: " . $e->getMessage());
            return response()->json([
                'error' => 'Error al conectar con la base de datos',
                'detalle' => $e->getMessage()
            ], 500);
        }
    }

    // CREAR
    public function store(Request $request)
    {
        $usuario = Usuario::create($request->all());
        return response()->json([
            'message' => 'Usuario creado',
            'data' => $usuario
        ], 201);
    }

    // MOSTRAR UNO
    public function show($id)
    {
        return response()->json(
            Usuario::with('roles')->findOrFail($id)
        );
    }

    // ACTUALIZAR
    public function update(Request $request, $id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->update($request->all());

        return response()->json([
            'message' => 'Usuario actualizado'
        ]);
    }

    // ELIMINAR
    public function destroy($id)
    {
        Usuario::destroy($id);
        return response()->json([
            'message' => 'Usuario eliminado'
        ]);
    }
}