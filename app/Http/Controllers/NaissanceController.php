<?php

namespace App\Http\Controllers;

use App\Models\Naissance; 
use App\Models\User; 
use App\Models\Citoyen; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class NaissanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $agents=array();
        $naissances = Naissance::all();
        return view('naissances.index', [
            'naissances' => $naissances, 
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
       
    //     return view('naissances.create', [
    //         'naissances' => Naissance::all(), 
    //     ]);
    // }
    public function create(Request $request)
    {
        $sexe_h = 'M';
        $sexe_f = 'F';
        $citoyen_h = User::where('sexe', 'LIKE', '%'.$sexe_h.'%')
        ->get();
        $citoyen_f = User::where('sexe', 'LIKE', '%'.$sexe_f.'%')
        ->get(); 

         return view('naissances.create', [
            'naissances' => Naissance::all(), 
            'citoyens' => User::all(), 
            'citoyens_h' => $citoyen_h, 
            'citoyens_f' => $citoyen_f, 
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
        

        $citoyens= User::create([
            'cni_rgi' => $request->cni_rgi,
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'sexe' => $request->sexe,
            'tel' => 221,
            'email' => strtolower($request->prenom.'.'.$request->nom.'@etat-civil.sn'),
            'password' => '12345',
            'date_naissance' => $request->date_naissance,
            'heure_naissance' => $request->heure_naissance,
            'date_trans_regis' => $request->date_trans_regis,
            'lieu_naissance' => $request->lieu_naissance,
            'quartier' => $request->quartier,
            'ville' => $request->ville,
            'cni_pere' => $request->id_pere[0],
            'cni_mere' => $request->id_mere[0],
            'age' => 0,
            // 'cni_pere' => $request->file('cni_pere')->store('uploads'),
            // 'cni_mere' => $request->file('cni_mere')->store('uploads'),
            // 'age' => $diffYears,
            'nationalite' => "Sénégalaise",
            'agent_id' => Auth::user()->id,
        ]);

        //var_dump($request->certificat_non);
        $naissance=new Naissance();
        $naissance->agent_id=Auth::user()->id;
        $naissance->cni_pere=$request->file('cni_pere')->store('uploads');
        $naissance->cni_mere=$request->file('cni_mere')->store('uploads');
        $naissance->citoyen_id=$citoyens->id;
        // $naissance->domicile_pere   = $request->n_domicile_pere;
        // $naissance->profession_pere = $request->n_profession_pere;
        // $naissance->domicile_mere   = $request->n_domicile_mere;
        // $naissance->profession_mere = $request->n_profession_mere;
        $naissance->pere_id = $request->id_pere[0];
        $naissance->mere_id = $request->id_mere[0];
 
         if($request->hasFile('cni_pere')) {
      
            $cni_pere = $request->file('cni_pere')->store('uploads');
            $naissance->cni_pere=$cni_pere;

            $cni_mere = $request->file('cni_mere')->store('uploads');
            $naissance->cni_mere=$cni_mere;
            
            $naissance->save();
            $naissance->id;
        // return view('citoyen.show'); 
        if (!$naissance) return redirect()->route('naissances.index')
            ->with('error_message', 'citoyens  id'.$id.' n\nexiste pas');
        // return view('naissances.show', [
        //     'naissance' => $naissance->id,
        // ]);
          return redirect()->route('naissances.index')
            ->with('success_message', 'Ace de naissance est crée avec success');
        }
        else{
             $naissance->save();
        }
       
        return redirect()->back();
        if (!$naissance) return redirect()->route('naissances.create')
            ->with('error_message', ''.$naissance.' ');
        
    }

    // public function show($id){

    //     return view('naissances.show', [
    //       'naissances' => Naissance::find($id)
    //       ]);
    // } 

    public function show($id)
    {
       //  $citoyen = User::find($id);
       //  setlocale(LC_ALL,"FR");$date = '2016-08-07';

       //  //convert date to month name
       //  $month_name =  ucfirst(strftime("%B", strtotime($citoyen->date_naissance)));
      
       // $inWords = new \NumberFormatter('fr', \NumberFormatter::SPELLOUT);
       //  // echo date('F', strtotime($citoyen->date_naissance));
       //  // echo $inWords->format(date('F'));
       //  // echo $monthName = date('F', mktime(0, 0, 0, $word, 10)); // March

       //  if (!$citoyen) return redirect()->route('citoyens.index')
       //      ->with('error_message', 'citoyens  id'.$id.' n\nexiste pas');
        
       //  return view('citoyen.show', [
       //      'citoyen' => $citoyen,
       //      'month_name' => $month_name,
       //      'inWords' => $inWords
       //  ]);


        $naissance = Naissance::find($id);
        $citoyen = $naissance->citoyens;
        setlocale(LC_ALL,"FR");$date = '2016-08-07';
        $month_name =  ucfirst(strftime("%B", strtotime(optional($naissance->citoyens)->lieu_naissance )));
        $inWords = new \NumberFormatter('fr', \NumberFormatter::SPELLOUT);

        // return view('citoyen.show'); 
        if (!$naissance) return redirect()->route('naissances.index')
            ->with('error_message', 'citoyens  id'.$id.' n\nexiste pas');
        return view('naissances.show', [
            'naissance' => $naissance,
            'citoyen' => $citoyen,
            'month_name' => $month_name,
            'inWords' => $inWords
        ]);
    }


 
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function edit($id)
    {
        
        $sexe_h = 'M';
        $sexe_f = 'F';
        $citoyen_h = User::where('sexe', 'LIKE', '%'.$sexe_h.'%')
        ->get();
        $citoyen_f = User::where('sexe', 'LIKE', '%'.$sexe_f.'%')
        ->get(); 

        $naissance = Naissance::find($id);
        if (!$naissance) return redirect()->route('naissances.index')
            ->with('error_message', 'naissances  id'.$id.' n\nexiste pas');
        return view('naissances.edit', [
            'naissance' => $naissance,
            'citoyens_h' => $citoyen_h, 
            'citoyens_f' => $citoyen_f, 
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function update(Request $request, $id)
    {

        $citoyen = User::find($request->id_citoyen);
        $naissance = Naissance::find($id);

        $citoyen->cni_rgi = $request->cni_rgi;
        $citoyen->nom = $request->nom;
        $citoyen->prenom = $request->prenom;
        $citoyen->sexe = $request->sexe;
        $citoyen->tel = 221;
        $citoyen->email = $request->email;
        $citoyen->password = $request->password;
        $citoyen->date_naissance = $request->date_naissance;
        $citoyen->lieu_naissance = $request->lieu_naissance;
        $citoyen->quartier = $request->quartier;
        $citoyen->ville = $request->ville;
        $citoyen->nationalite = "Sénégalaise";
        $citoyen->agent_id = Auth::user()->id;
        // echo $request->id_pere[0]
        $naissance->pere_id = $request->id_pere[0];
        $naissance->mere_id = $request->id_mere[0];


        // $naissance=new Naissance::find($id);
        // $naissance->agent_id=Auth::user()->id;
        // $naissance->cni_pere=$request->file('cni_pere')->store('uploads');
        // $naissance->cni_mere=$request->file('cni_mere')->store('uploads');
        // $naissance->citoyen_id=$citoyens->id;
        // $naissance->pere_id = $request->id_pere[0];
        // $naissance->mere_id = $request->id_mere[0];


        $citoyen->save();
        $naissance->save();
        // return redirect()->route('citoyens.index')
        //     ->with('success','Citoyen mise à jour avec success');
         $citoyen = User::find($id);
        if (!$citoyen) return redirect()->route('citoyens.index')
            ->with('error_message', 'citoyens  id'.$id.' n\nexiste pas');
        // return view('citoyen.show', [
        //     'citoyen' => $citoyen
        // ]);
          return redirect()->route('naissances.index')
            ->with('success_message', 'Ace de naissance est modifié avec success');

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy(Agent $naissance)
    {
        
        try { 

          $naissance->delete();
          return redirect()->route('naissances.index')
            ->with('success_message', 'Supprimée');

        } catch(\Illuminate\Database\QueryException $ex){ 

          return redirect()->route('naissances.index')
            ->with('error_message', 'Cette naissance est déja utilisé, il faut suprimer tous ses liaisons avant');
        }
    }

}
