<?php

namespace App\Http\Controllers;

use App\Models\Soldados;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SoldadosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $soldado= Soldados::where('activo',1)
        ->orderBy('idsol')
        ->paginate(5);  

        return Inertia::render('Soldados', [ 
            'soldados' => $soldado, 
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([  
            'nom' => 'required|string|max:255',
            'ap' => 'required|string|max:255',
            'am' => 'required|string|max:255',
            'foto' => 'required|string' 
        ]);
        $Soldados = Soldados::create($request->input());   
        $Soldados->save();
        return redirect('soldado');
    }

    /**
     * Display the specified resource.
     */
    public function show(Soldados $soldados)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Soldados $soldados)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Soldados $soldados)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Soldados $soldados)
    {
        //
    }
}
