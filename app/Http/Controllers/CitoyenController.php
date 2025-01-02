<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use \NumberFormatter;
use Carbon\Carbon;

class CitoyenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       $citoyens = User::where('admin', 1)
        ->get();
    
        return view('citoyen.index',compact('citoyens'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
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
            'cni_pere' => $request->id_pere[0],
            'cni_mere' => $request->id_mere[0],
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
        if ($citoyen==null) {        

            $citoyen = User::find(Auth::id());
                if (!$citoyen) return redirect()->route('citoyens.index')
                    ->with('error_message', 'citoyens  id'.$id.' n\nexiste pas');
                return view('citoyen.profile', [
                    'citoyen' => $citoyen
                ]);

        } else {
            //convert date to month name
            $month_name =  ucfirst(strftime("%B", strtotime($citoyen->date_naissance)));
           $inWords = new \NumberFormatter('fr', \NumberFormatter::SPELLOUT); 

            if (!$citoyen) return redirect()->route('citoyens.index')
                ->with('error_message', 'citoyens  id'.$id.' n\nexiste pas');
            
            return view('citoyen.show', [
                'citoyen' => $citoyen,
                'month_name' => $month_name,
               'inWords' => $inWords
            ]);
        }
        
     
    }



    public function profile($id)
    {
            echo "profile";
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
        public function numberToWord($num = '')
    {
        $num    = ( string ) ( ( int ) $num );
        
        if( ( int ) ( $num ) && ctype_digit( $num ) )
        {
            $words  = array( );
             
            $num    = str_replace( array( ',' , ' ' ) , '' , trim( $num ) );
             
            $list1  = array('','Un', 'deux', 'trois', 'quatre', 'cinq', 'six', 'sept', 'huit', 'neuf', 'dix', 'onze', 'douze', 'treize', 'quatorze', 'quinze', 'seize', 'dix-sept', 'dix-huit', 'dix-neuf');
             
            $list2  = array('','dix', 'vingt', 'trente', 'quarante', 'cinquante', 'soixante', 'soixante-dix', 'quatre-vingts', 'quatre-vingt-dix', 'cent');
             
            $list3  = array('','mille','million','milliard','billion',
                'quadrillion','quintillion','sextillion','septillion',
                'octillion','nonillion','décillion','undécillion',
                'duodecillion','tredécillion','quattuordécillion',
                'quindécillion','sexdécillion','septendécillion',
                'octodecillion','novemdecillion','vigintillion');
             
            $num_length = strlen( $num );
            $levels = ( int ) ( ( $num_length + 2 ) / 3 );
            $max_length = $levels * 3;
            $num    = substr( '00'.$num , -$max_length );
            $num_levels = str_split( $num , 3 );
             
            foreach( $num_levels as $num_part )
            {
                $levels--;
                $hundreds   = ( int ) ( $num_part / 100 );
                $hundreds   = ( $hundreds ? ' ' . $list1[$hundreds] . ' Hundred' . ( $hundreds == 1 ? '' : 's' ) . ' ' : '' );
                $tens       = ( int ) ( $num_part % 100 );
                $singles    = '';
                 
                if( $tens < 20 ) { $tens = ( $tens ? ' ' . $list1[$tens] . ' ' : '' ); } else { $tens = ( int ) ( $tens / 10 ); $tens = ' ' . $list2[$tens] . ' '; $singles = ( int ) ( $num_part % 10 ); $singles = ' ' . $list1[$singles] . ' '; } $words[] = $hundreds . $tens . $singles . ( ( $levels && ( int ) ( $num_part ) ) ? ' ' . $list3[$levels] . ' ' : '' ); } $commas = count( $words ); if( $commas > 1 )
            {
                $commas = $commas - 1;
            }
             
            $words  = implode( ', ' , $words );
             
            $words  = trim( str_replace( ' ,' , ',' , ucwords( $words ) )  , ', ' );
            if( $commas )
            {
                $words  = str_replace( ',' , ' ' , $words );
            }
             
            return $words;
        }
        else if( ! ( ( int ) $num ) )
        {
            return 'Zero';
        }
        return '';
    }

}
