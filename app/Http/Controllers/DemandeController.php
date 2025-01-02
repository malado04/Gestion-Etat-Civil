<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Demande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DemandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $demandes = Demande::all();
        return view('demande.index', [
            'demandes' => $demandes, 
            'citoyens' => User::all(), 
        ]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('demande.create', [
            'demandes' => Demande::all(), 
            'citoyens' => User::all(), 
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        try {  

        $demande=new Demande();
        $demande->type=$request->type;
        $demande->nmb_copies=$request->nmb_copies;
        $demande->description=$request->description;
        $demande->fk_dem_id=$request->homme_id;
        $demande->fk_agent_id=Auth::user()->id;
        $demande->save();

       if (!$demande) return redirect()->route('demandes.index')
            ->with('error_message', 'demandes  id'.$id.' n\nexiste pas');
          return redirect()->route('demandes.index')
            ->with('success_message', 'Demande enregistrer avec success');

        } catch(\Illuminate\Database\QueryException $ex){ 

          return redirect()->route('demandes.index')
            ->with('error_message', 'Cette demande est déja archivé, il faut le désarchivé avant');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Demande  $demande
     * @return \Illuminate\Http\Response
     */
    public function show(Demande $demande)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Demande  $demande
     * @return \Illuminate\Http\Response
     */
    public function edit(Demande $demande)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Demande  $demande
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Demande $demande)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Demande  $demande
     * @return \Illuminate\Http\Response
     */
    public function destroy(Demande $demande)
    {
        //
    }
}
