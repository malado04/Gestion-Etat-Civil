<?php

namespace App\Http\Controllers;

use App\Models\Divorce;
use App\Models\User; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class DivorceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $divorces = Divorce::all();
        return view('divorce.index', [
            'divorces' => $divorces, 
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $divorces = Divorce::all();
        return view('divorce.create', [
            'divorces' => $divorces, 
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
        $divorce=new Divorce();
        // $divorce->certifica_divo=$request->certifica_divo;
        // $divorce->jugemen_divo=$request->jugemen_divo;
         if($request->certifica_divo) {

        $divorce->fk_homme_id=$request->homme_id;
        $divorce->fk_femme_id=$request->femme_id;
        $divorce->fk_agent_id=Auth::user()->id;
        
            
            $path = $request->file('certifica_divo')->store('uploads');
            $divorce->certifica_divo=$path;

            $path1 = $request->file('jugemen_divo')->store('uploads');
            $divorce->jugemen_divo=$path1;
           
             $divorce->save();
        }
        else{
            if (!$divorce) return redirect()->route('divorces.index')
            ->with('error_message', 'Vous devez joindre un  certificat et un jugement de divorce ');
        }
        try { 

       if (!$divorce) return redirect()->route('divorces.index')
            ->with('error_message', 'citoyens  id'.$id.' n\nexiste pas');
          return redirect()->route('divorces.index')
            ->with('success_message', 'Ajout éffectué avec success');

        } catch(\Illuminate\Database\QueryException $ex){ 

          return redirect()->route('divorces.index')
            ->with('error_message', 'Cette ace de mariage est déja archivé, il faut le désarchivé avant');
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Divorce  $divorce
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
        $divorce = Divorce::find($id);
        $citoyen = User::all();
        return view('divorce.show', [
            'divorce' => $divorce, 
            'citoyen' => $citoyen, 
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Divorce  $divorce
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $divorce = Divorce::find($id);
        return view('divorce.edit', [
            'divorce' => $divorce, 
            'citoyens' => User::all(), 
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Divorce  $divorce
     * @return \Illuminate\Http\Response
     */
   public function update(Request $request, $id)
    {
      $divorce = Divorce::find($id);
        $divorce->certifica_divo = $request->certifica_divo;
        $divorce->jugemen_divo = $request->jugemen_divo;
        $divorce->fk_homme_id = $request->homme_id;
        $divorce->fk_femme_id = $request->femme_id;
        $divorce->fk_agent_id = Auth::user()->id;
        if (isset($request->certifica_divo)) {

        if (file_exists(public_path($path =  $request->file('certifica_divo')->store('uploads')))) 
            {
                unlink(public_path($path));

            };
        if (file_exists(public_path($path1 =  $request->file('jugemen_divo')->store('uploads')))) 
            {
                unlink(public_path($path1));
            };
               $path = $request->file('certifica_divo')->store('uploads');
               $divorce->certifica_divo=$path;

               $path1 = $request->file('jugemen_divo')->store('uploads');
               $divorce->jugemen_divo=$path1;
        }
        else{
             $path = $divorce->certifica_divo;
        }

        try { 

          $divorce->save();
          return redirect()->route('divorces.index')
            ->with('success_message', 'Modification éffectué avec success');

        } catch(\Illuminate\Database\QueryException $ex){ 

            echo $ex;

          // return redirect()->route('divorces.edit')
          //   ->with('error_message', 'Cette ace de divorce est déja archivé, il faut le désarchivé avant');
        }

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Divorce  $divorce
     * @return \Illuminate\Http\Response
     */
    public function destroy(Divorce $divorce)
    {
        
        try { 

          $divorce->delete();
          return redirect()->route('divorces.index')
            ->with('success_message', 'Divorce supprimée avec succès');

        } catch(\Illuminate\Database\QueryException $ex){ 

          return redirect()->route('divorces.index')
            ->with('error_message', 'Cette divorce est déja utilisé, il faut suprimer tous ses liaisons avant');
        }
    }
}
