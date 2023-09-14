<?php

namespace App\Http\Controllers;
use App\Models\Soldados;
use App\Models\Combate;
use Illuminate\Http\Request;
use Inertia\Inertia;
use PDF;
use Carbon\Carbon;

class CombateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $combates= Combate::select('combates.*','soldados.foto','soldados.nomcompleto')
        ->join("soldados","soldados.idsol","=","combates.idsol")
        ->where('combates.activo',1); 
        if(!empty($request->search)){ 
            $combates= $combates->where('soldados.nomcompleto','like',"%$request->search%") ; 
        }
        $combates=$combates->orderBy('combates.idsol')
        ->orderBy('combates.no')->paginate(5);

        $soldadosin= Soldados::where('activo',1) 
        ->get();  
        return Inertia::render('Combate', [ 
            'combates' => $combates, 
            'soldadosin' => $soldadosin
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
            'idsol' => 'required', 
            'municiongas' => 'required',
            'municionsob' => 'required',
            'vida' => 'required',
            'tiempo' => 'required'
        ]);
        $suma = Combate::where('idsol', $request->idsol)->where('activo',1)->count();
        $Combate = new Combate();  
        $Combate->no = $suma+1; 
        $Combate->idsol = $request->idsol; 
        $Combate->municiongas = $request->municiongas; 
        $Combate->municionsob = $request->municionsob; 
        $Combate->vida = $request->vida; 
        $Combate->tiempo = $request->tiempo; 
        $Combate->save();
        return redirect('combate');
    }

    /**
     * Display the specified resource.
     */
    public function show(Combate $combate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Combate $combate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Combate $combate)
    {
        //
    }
    public function reporte(Request $request)
    {
        $combates= Combate::select('combates.*','soldados.foto','soldados.nomcompleto')
        ->join("soldados","soldados.idsol","=","combates.idsol")
        ->where('combates.activo',1)
        ->where('combates.idco',$request->id)
        ->latest()->first();  
        $date = Carbon::now();

        $pdf = PDF::loadView('reporte', ['combates'=>$combates,'date'=>$date->translatedFormat('j \de F \de Y')]); 
        return base64_encode($pdf->output());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Combate $combate)
    {
        //
    }
}
