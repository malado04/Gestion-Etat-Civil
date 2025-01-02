<?php
  
namespace App\Http\Controllers;
    
use Illuminate\Http\Request;
use App\Models\Naissance;
use DB;
    
class ChartJSController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        $users = Naissance::select(DB::raw("COUNT(*) as count"));
 
        $labels = $users->keys();
        $data = $users->values();
              
        return view('chart', compact('labels', 'data'));
    }
}