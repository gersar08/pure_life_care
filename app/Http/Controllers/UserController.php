<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', User::class);
        $users = User::all();
        return response()->json($users);
    }
    public function search($field, $query)
    {
        $user = User::where($field, $query)->first();

        if ($user) {
            return response()->json($user);
        } else {
            return response()->json(['message' => 'User not found'], 404);
        }
    }
    public function store(Request $request)
    {
        $this->authorize('create', User::class);

        // Validar los datos de la solicitud
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'user_name' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'role' => ['required', 'string'], // Agrega esta línea

        ]);
        // Crear el usuario
        $user = User::create([
            'name' => $validatedData['name'],
            'user_name' => $validatedData['user_name'],
            'password' => Hash::make($validatedData['password']),
            'role' => $validatedData['role'],
        ]);

        // Crear el rol si no existe
        if (array_key_exists('role', $validatedData)) {
            $roleName = $validatedData['role']; // Obtiene el rol de los datos validados
            $role = Role::firstOrCreate(['guard_name' => 'web', 'name' => $roleName]);

            // Asignar el rol al usuario
            $user->assignRole($role); // Asigna el rol al usuario
        } else {
            // Maneja el caso en que la clave 'role' no existe en $validatedData
            return response()->json(['error' => 'No se proporcionó un rol'], 400);
        }
        return response()->json(['message' => 'Usuario creado exitosamente'], 201);
    }


    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        $this->authorize('update', $user);

        // Actualizar los datos del usuario
        $user->update($request->all());

        // Si se proporcionó un rol en la solicitud, validar y actualizar el rol del usuario
        if ($request->input('role')) {
            // Validar el rol
            $validatedData = $request->validate([
                'role' => ['required', 'string', 'exists:roles,name'],
            ]);

            // Primero, revocar todos los roles actuales
            $user->roles()->detach();

            // Luego, asignar el nuevo rol
            $user->assignRole($validatedData['role']);
        }

        return response()->json($user);
    }


    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $this->authorize('delete', $user);
        $user->delete();
        return response()->json(['message' => 'User deleted successfully']);
    }
}
