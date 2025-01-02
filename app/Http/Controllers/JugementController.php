<?php

namespace App\Http\Controllers;

use App\Models\Jugement;
use App\Models\User; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class JugementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jugements = Jugement::all();
        return view('jugement.index', [
            'jugements' => $jugements, 
        ]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $citoyens =User::all();
        return view('jugement.create', [
            'jugements' => Jugement::all(), 
            'citoyens' => $citoyens, 
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
        $jugement=new Jugement();
        // $jugement->certificat_non=$request->certificat_non ;
        // $jugement->certificat_daccouchement=$request->certificat_daccouchement ;
        // $jugement->certificat_temoin=$request->certificat_temoin ;
        $jugement->fk_jum_id=$request->fk_jum_id ;
        $jugement->quit_paiem=$request->quit_paiem ;
        $jugement->fk_user_id=Auth::user()->id;
       
         if($request->certificat_non) {
            
            $cn = $request->file('certificat_non')->store('uploads');
            $jugement->certificat_non=$cn ?? "Aucune";

            $ca = $request->file('certificat_daccouchement')->store('uploads');
            $jugement->certificat_daccouchement=$ca ?? "Aucune";

            $ct = $request->file('certificat_temoin1')->store('uploads');
            $jugement->certificat_temoin1=$ct ?? "Aucune";

            $ct1 = $request->file('certificat_temoin2')->store('uploads');
            $jugement->certificat_temoin2=$ct1 ?? "Aucune";

            $fv = $request->file('fiche_vacc')->store('uploads');
            $jugement->fiche_vacc=$fv ?? "Aucune";
           

            // var_dump($jugement->fiche_vacc=$fv ?? "Aucune");
           
             $jugement->save();
        }
        else{
            // $jugement->save();
        }
        try { 

       if (!$jugement) return redirect()->route('jugements.index')
            ->with('error_message', 'citoyens  id'.$id.' n\nexiste pas');
          return redirect()->route('jugements.index')
            ->with('success_message', 'Jugement éffectué avec success');

        } catch(\Illuminate\Database\QueryException $ex){ 

          return redirect()->route('jugements.index')
            ->with('error_message', 'Ce jugement est déja archivé, il faut le désarchivé avant');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jugement  $jugement
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


        $jugement = Jugement::find($id);
        return view('jugement.show', [
            'jugement' => $jugement, 
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\jugement  $jugement
     * @return \Illuminate\Http\Response
     */
    // public function edit(jugement $jugement)
    public function edit($id)
    {
       
        $jugement = Jugement::find($id);
        return view('jugement.edit', [
            'jugement' => $jugement, 
            'citoyens' => User::all(), 
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\jugement  $jugement
     * @return \Illuminate\Http\Response
     */
   public function update(Request $request, $id)
    {
        $jugement = Jugement::find($id);
        $jugement->lieu_jugement = $request->lieu_jugement;
        $jugement->date_jugement = $request->date_jugement;
        $jugement->homme_id = $request->homme_id;
        $jugement->femme_id = $request->femme_id;
        $jugement->path = $request->acte_jugement;

        if (file_exists(public_path($path =  $request->file('acte_jugement')->store('uploads')))) 
            {
                unlink(public_path($path));
            };

        $path = $request->file('acte_jugement')->store('uploads');
        $jugement->path=$path;
        try { 
        $divorce->save();
          return redirect()->route('jugements.index')
            ->with('success_message', 'Modification éffectué avec success');

        } catch(\Illuminate\Database\QueryException $ex){ 

          return redirect()->route('jugements.index')
            ->with('error_message', 'Cette ace de jugement est déja archivé, il faut le désarchivé avant');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\jugement  $jugement
     * @return \Illuminate\Http\Response
     */
    public function destroy(jugement $jugement)
    {
        
        try { 

          $jugement->delete();
          return redirect()->route('jugements.index')
            ->with('success_message', 'Supprimée');

        } catch(\Illuminate\Database\QueryException $ex){ 

          return redirect()->route('jugements.index')
            ->with('error_message', 'Cette jugement est déja utilisé, il faut suprimer tous ses liaisons avant');
        }
    }

}
