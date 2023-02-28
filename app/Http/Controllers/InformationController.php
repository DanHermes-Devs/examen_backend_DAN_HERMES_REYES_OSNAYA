<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Information;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with(['userInfo'])->paginate(10);
        return response()->json([
            'data' => $users
        ]);eeee
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        
        $user->save();
        
        $id_user = $user->id;

        $userInfo = new Information([
            'direccion' => $request->direccion,
            'telefono' => $request->telefono,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'user_id' => $id_user,
        ]);

        $userInfo->save();

        return response()->json([
            "data" => $user
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Information  $information
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::with(['userInfo'])->where('id', $id)->first();
        $fecha_nacimiento = $user->userInfo->fecha_nacimiento;
        $fecha_nacimiento = Carbon::createFromFormat('Y-m-d', $fecha_nacimiento); 
        $edad = $fecha_nacimiento->diffInYears(Carbon::now());
        return response()->json([
            'status' => 200,
            'message' => 'La siguiente información fue encontrada con éxito.',
            'data' => $user,
            'edad' => $edad
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Information  $information
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::with(['userInfo'])->find($id);

        return response()->json([
            'data' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Information  $information
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        
        $user->save();

        $userInfo = Information::where('user_id', $id)->first();
        $userInfo->direccion = $request->direccion;
        $userInfo->telefono = $request->telefono;
        $userInfo->fecha_nacimiento = $request->fecha_nacimiento;

        $userInfo->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Information  $information
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }

        $user->delete();

        return response()->json(['message' => 'Usuario eliminado con éxito']);
    }
}
