<?php

namespace App\Http\Controllers;

use App\Models\Mariage;
use App\Models\User; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MariageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mariages = Mariage::all();
        return view('mariage.index', [
            'mariages' => $mariages, 
        ]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mariage.create', [
            'mariages' => Mariage::all(), 
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
        $mariage=new Mariage();
        $mariage->date_mariage=$request->date_mariage;
        $mariage->lieu_mariage=$request->lieu_mariage;
        $mariage->homme_id=$request->homme_id;
        $mariage->femme_id=$request->femme_id;
        $mariage->poly_mono=$request->poly_mono;
        $mariage->agent_id=Auth::user()->id;
        
        if($request->acte_mariage) {
            
            $path = $request->file('acte_mariage')->store('uploads');
            $mariage->path=$path;
           
             $mariage->save();
        }
        else{
            $mariage->save();
        }
        try { 

       if (!$mariage) return redirect()->route('mariages.index')
            ->with('error_message', 'citoyens  id'.$id.' n\nexiste pas');
          return redirect()->route('mariages.index')
            ->with('success_message', 'Modification éffectué avec success');

        } catch(\Illuminate\Database\QueryException $ex){ 

          return redirect()->route('mariages.index')
            ->with('error_message', 'Cette ace de mariage est déja archivé, il faut le désarchivé avant');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mariage  $mariage
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $mariage = Mariage::find($id);
        return view('mariage.show', [
            'mariage' => $mariage, 
            'citoyen_h' => User::find($mariage->homme_id), 
            'citoyen_f' => User::find($mariage->femme_id), 

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mariage  $mariage
     * @return \Illuminate\Http\Response
     */
    // public function edit(Mariage $mariage)
    public function edit($id)
    {
       
        $mariage = Mariage::find($id);
        return view('mariage.edit', [
            'mariage' => $mariage, 
            'citoyens' => User::all(), 
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mariage  $mariage
     * @return \Illuminate\Http\Response
     */
   public function update(Request $request, $id)
    {
        $mariage = Mariage::find($id);
        $mariage->lieu_mariage = $request->lieu_mariage;
        $mariage->date_mariage = $request->date_mariage;
        $mariage->homme_id = $request->homme_id;
        $mariage->femme_id = $request->femme_id;
        $mariage->poly_mono=$request->poly_mono;
        $mariage->path = $request->acte_mariage;

        if (file_exists(public_path($path =  $request->file('acte_mariage')->store('uploads')))) 
            {
                unlink(public_path($path));
            };

        $path = $request->file('acte_mariage')->store('uploads');
        $mariage->path=$path;
        try { 
        $divorce->save();
          return redirect()->route('mariages.index')
            ->with('success_message', 'Cet atce de mariage enregistré avec success');

        } catch(\Illuminate\Database\QueryException $ex){ 

          return redirect()->route('mariages.index')
            ->with('error_message', 'Cet atce de mariage est déja archivé, il faut le désarchivé avant');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mariage  $mariage
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mariage $mariage)
    {
        
        try { 

          $mariage->delete();
          return redirect()->route('mariages.index')
            ->with('success_message', 'Supprimée');

        } catch(\Illuminate\Database\QueryException $ex){ 

          return redirect()->route('mariages.index')
            ->with('error_message', 'Cette mariage est déja utilisé, il faut suprimer tous ses liaisons avant');
        }
    }

}
