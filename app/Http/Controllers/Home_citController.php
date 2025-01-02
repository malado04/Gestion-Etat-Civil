<?php


namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class Home_citController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $citoyen = User::find(Auth::id());        $sexe_h = 'M';
        $sexe_f = 'F';
        $citoyen_h = User::where('sexe', 'LIKE', '%'.$sexe_h.'%')
        ->get();
        $citoyen_f = User::where('sexe', 'LIKE', '%'.$sexe_f.'%')
        ->get();

        return view('home_cit', [
            'citoyen' => $citoyen, 
            'citoyens_h' => $citoyen_h, 
            'citoyens_f' => $citoyen_f, 
        ]);
    }


    public function logoutt()
    {
        Auth::guard('citoyen')->logout();
         return redirect('/');

    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {  

        $sexe_h = 'M';
        $sexe_f = 'F';
        $citoyen_h = User::where('sexe', 'LIKE', '%'.$sexe_h.'%')
        ->get();
        $citoyen_f = User::where('sexe', 'LIKE', '%'.$sexe_f.'%')
        ->get();

         return view('citoyen.create', [
            'citoyens' => User::all(), 
            'citoyens_h' => $citoyen_h, 
            'citoyens_f' => $citoyen_f, 
        ]);

        // return view('citoyen.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // // $request->validate([
       // //      'cni_rgi' => 'required',
       // //      'nom' => 'required',
       // //      'prenom' => 'required',
       // //      'sexe' => 'required',
       // //      'tel' => 'required',
       // //      'email' => 'required',
       // //      'password' => 'required',
       // //      'date_naissance' => 'required',
       // //      'lieu_naissance' => 'required',
       // //      'quartier' => 'required',
       // //      'ville' => 'required',
       // //      'nationalite' => 'required',
       // //      'cni_pere' => 'required',
       // //      'cni_mere' => 'required',
       // //  ]);

        // $inWords = new \NumberFormatter('fr', \NumberFormatter::SPELLOUT);
        $citoyens= User::create([
            'code_agent' => random_int(0, 5000),
            'cni_rgi' => $request->cni_rgi,
            'name' => $request->nom,
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'sexe' => $request->sexe,
            'tel' => $request->tel,
            'email' => strtolower($request->prenom.'.'.$request->nom.'@etat-civil.sn'),
            'password' => '12345',
            'date_naissance' => $request->date_naissance,
            'lieu_naissance' => $request->lieu_naissance,
            'quartier' => $request->quartier,
            'ville' => $request->ville,
            'profession' => $request->profession,
            'age' =>0,
            'nationalite' => "Sénégalaise",
            // 'cni_pere' => $request->id_pere[0],
            // 'cni_mere' => $request->id_mere[0],
            'agent_id' => Auth::id(),
            'admin' =>1,
        ]);

        return redirect()->route('citoyens.index')
            ->with('success','Citoyen cré avec success.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Citoyen  $citoyen
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $citoyen = User::find($id);
        setlocale(LC_ALL,"FR");
        echo $citoyen->date_naissance;
        //convert date to month name
        // $month_name =  ucfirst(strftime("%B", strtotime($citoyen->date_naissance)));
        $inWords = new \NumberFormatter('fr', \NumberFormatter::SPELLOUT); 

        // if (!$citoyen) return redirect()->route('citoyens.index')
        //     ->with('error_message', 'citoyens  id'.$id.' n\nexiste pas');
        
        // return view('citoyen.show', [
        //     'citoyen' => $citoyen,
        //     'month_name' => $month_name,
        //     'inWords' => $inWords
        // ]);
    }

    // public function print($id)
    // {
    //     $citoyen = User::find($id);
    //     setlocale(LC_ALL,"FR");$date = '2016-08-07';

    //     //convert date to month name
    //     $month_name =  ucfirst(strftime("%B", strtotime($citoyen->date_naissance)));
      
    //     $inWords = new \NumberFormatter('fr', \NumberFormatter::SPELLOUT);
    //     // echo date('F', strtotime($citoyen->date_naissance));
    //     // echo $inWords->format(date('F'));
    //     // echo $monthName = date('F', mktime(0, 0, 0, $word, 10)); // March

    //     if (!$citoyen) return redirect()->route('citoyens.index')
    //         ->with('error_message', 'citoyens  id'.$id.' n\nexiste pas');
        
    //     return view('citoyen.print', [
    //         'citoyen' => $citoyen,
    //         'month_name' => $month_name,
    //         'inWords' => $inWords
    //     ]);
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Citoyen  $citoyen
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $citoyen = User::find($id);
        if (!$citoyen) return redirect()->route('citoyens.index')
            ->with('error_message', 'citoyens  id'.$id.' n\nexiste pas');
        return view('citoyen.edit', [
            'citoyen' => $citoyen
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Citoyen  $citoyen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $citoyen = User::find($id);
        $month_name =  ucfirst(strftime("%B", strtotime($citoyen->date_naissance)));
      
       $inWords = new \NumberFormatter('fr', \NumberFormatter::SPELLOUT);

        $citoyen->cni_rgi = $request->cni_rgi;
        $citoyen->nom = $request->nom;
        $citoyen->prenom = $request->prenom;
        $citoyen->sexe = $request->sexe;
        $citoyen->tel = $request->tel;
        $citoyen->email = $request->email;
        $citoyen->password = $request->password;
        $citoyen->date_naissance = $request->date_naissance;
        $citoyen->lieu_naissance = $request->lieu_naissance;
        $citoyen->quartier = $request->quartier;
        $citoyen->ville = $request->ville;
        $citoyen->cni_pere = $request->cni_pere;
        $citoyen->cni_mere = $request->cni_mere;
        // $citoyen->nationalite = $request->nationalite;
        $citoyen->agent_id = Auth::user()->id;

        $citoyen->save();
        // return redirect()->route('citoyens.index')
        //     ->with('success','Citoyen mise à jour avec success');
        if (!$citoyen) return redirect()->route('citoyens.index')
            ->with('error_message', 'citoyens  id'.$id.' n\nexiste pas');
        return view('citoyen.show', [
            'citoyen' => $citoyen,
            'month_name' => $month_name,
            'inWords' => $inWords
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Citoyen  $citoyen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Citoyen $citoyen)
    {

        $citoyen->delete();
        return redirect()->route('citoyens.index')
           ->with('success','Citoyen supprimé avec success');

    }

}
