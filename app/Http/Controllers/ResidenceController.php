<?php

namespace App\Http\Controllers;
 
use App\Models\Residence; 
use App\Models\Citoyen; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class ResidenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $residences=array();
        $residences = Residence::all();
        return view('deces.index', [
            'deces' => $residences, 
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 

        return view('deces.create', [
            'deces' => Residence::all(), 
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
 
        if($request->certifica_dece) {
        
        $residence=new Residence();
        $residence->date_dece=$request->date_dece;
        $residence->lieu_dece=$request->lieu_dece;
        $residence->certifica_dece=$request->certifica_dece;
        $residence->cni_def=$request->cni_def;
        $residence->cni_temoin=$request->cni_temoin;
        $residence->cni_temoin=$request->cni_temoin;
        $residence->fk_defun_id=$request->def_id['0'];
        $residence->fk_temoin_id=$request->tem_id['0'];
        $residence->fk_agent_id=Auth::user()->id;
 
        $path = $request->file('certifica_dece')->store('uploads');
        $residence->certifica_dece=$path;

        $path1 = $request->file('cni_def')->store('uploads');
        $residence->cni_def=$path1;
        $path2 = $request->file('cni_temoin')->store('uploads');
        $residence->cni_temoin=$path2;
        $residence->save();
        }
        else{
            if (!$residence) return redirect()->route('deces.index')
            ->with('error_message', 'Vous devez joindre les certificats réquis ');
        }
        try { 

           if (!$residence) return redirect()->route('deces.index')
                ->with('error_message', 'citoyens  id'.$id.' n\nexiste pas');
            return redirect()->route('deces.index')
                ->with('success_message', 'Ajout éffectué avec success');

        } catch(\Illuminate\Database\QueryException $ex){ 

            return redirect()->route('deces.index')
            ->with('error_message', 'Cette ace de dece est déja archivé, il faut le désarchivé avant');
        }
    }

    public function show($id)
    {

        $residence = Residence::find($id);
        setlocale(LC_ALL,"FR");
        // dd(optional($residence->citoyens_tem)->cni_rgi);
        //convert date to month name
        $month_name =  ucfirst(strftime("%B", strtotime($residence->date_dece)));

        $citoyen =  User::find($id); 
      
       $inWords = new \NumberFormatter('fr', \NumberFormatter::SPELLOUT);
        return view('deces.show', [
          'dece' => Residence::find($id),
            'citoyens' => User::all(), 
            'citoyens' => User::all(), 
            'citoyen' => $citoyen,
            'month_name' => $month_name,
            'inWords' => $inWords
        ]);
    }

    public function show1($id)
    {
        return view('deces.show', [
          'dece' => Residence::find($id),
            'citoyens' => User::all(), 
        ]);
    }


      public function affi(Request $request){

      
    }
      public function go(Request $request){
        
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
        return view('deces.edit', [
          'dece' => Residence::find($id),
            'citoyens' => User::all(), 
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
        
        $residence = Residence::find($id);
        $residence->date_dece = $request->date_dece;
        $residence->lieu_dece = $request->lieu_dece;
        // $residence->certifica_dece = $request->certifica_dece;
        $residence->fk_defun_id = $request->def_id['0'];
        $residence->fk_temoin_id = $request->tem_id['0'];
        $residence->fk_agent_id = Auth::user()->id;
        if (isset($request->certifica_divo)) {

        if (file_exists(public_path($path =  $request->file('certifica_dece')->store('uploads')))) 
            {
                unlink(public_path($path));

            };
        if (file_exists(public_path($path1 =  $request->file('cni_def')->store('uploads')))) 
            {
                unlink(public_path($path1));
            };
        if (file_exists(public_path($path1 =  $request->file('cni_temoin')->store('uploads')))) 
            {
                unlink(public_path($path1));
            };
               $path = $request->file('certifica_dece')->store('uploads');
               $residence->certifica_dece=$path;

               $path = $request->file('cni_def')->store('uploads');
               $residence->cni_def=$path;

               $path1 = $request->file('cni_temoin')->store('uploads');
               $residence->cni_temoin=$path1;
        }
        else{
             // $path = $residence->certifica_divo;
        }

        try { 

          $residence->save();
          return redirect()->route('deces.index')
            ->with('success_message', 'Décé modifié éffectué avec success');

        } catch(\Illuminate\Database\QueryException $ex){ 

            echo $ex;

          // return redirect()->route('deces.edit')
          //   ->with('error_message', 'Cette ace de dece est déja archivé, il faut le désarchivé avant');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy(Dece $residence)
    {
        
        try { 

          $residence->delete();
          return redirect()->route('deces.index')
            ->with('success_message', 'Décé Supprimé avec succés');

        } catch(\Illuminate\Database\QueryException $ex){ 

          return redirect()->route('agent.index')
            ->with('error_message', 'Cette agent est déja utilisé, il faut suprimer tous ses liaisons avant');
        }
    }

}
