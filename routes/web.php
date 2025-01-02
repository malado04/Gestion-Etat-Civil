<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController; 
use App\Http\Controllers\CitoyenController;
use App\Http\Controllers\DeceController;
use App\Http\Controllers\DemandeController;
use App\Http\Controllers\MariageController;
use App\Http\Controllers\NaissanceController;
use App\Http\Controllers\Demande_citController;
use App\Http\Controllers\DivorceController;
use App\Http\Controllers\JugementController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Home_citController;
// use App\Models\Citoyen;
use App\Models\Mariage;
use App\Models\Naissance;
use App\Models\Divorce;
use App\Models\User;
use App\Models\Dece;
use App\Models\Jugement;
// use App\Http\Controllers\API\V1\DossiersController;
// use App\Http\Controllers\API\V1\DossiersController;
use App\Http\Controllers\ChartJSController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Clear application cache:
// Route::get('/clear-cache', function() {
//     Artisan::call('cache:clear');
//     return 'Application cache has been cleared';
// });

// //Clear route cache:
// Route::get('/route-cache', function() {
//     Artisan::call('route:cache');
//     return 'Routes cache has been cleared';
// });

// //Clear config cache:
// Route::get('/config-cache', function() {
//     Artisan::call('config:cache');
//     return 'Config cache has been cleared';
// }); 

// // Clear view cache:
// Route::get('/view-clear', function() {
//     Artisan::call('view:clear');
//     return 'View cache has been cleared';
// });
 

Route::get('/', function () {
    return view('auth.login');
});

// Route::resource('articulos','App\Http\Controllers\ArticuloController');

// Route::get('/articulos/destory/{id}','App\Http\Controllers\ArticuloController@destroy')->name('articulos.delete');


Auth::routes();
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// Route::get('/profile/{user}/show', [ProfileController::class, 'show'])->name('profile.show');

// Route::get('chart', function(){
//      $citoyens = User::groupBy('cni_rgi')
//       ->selectRaw('count(*) as total, cni_rgi')
//       ->get();

//       return view('chart', [
//             'citoyens' => $citoyens, 
//         ]);
// });

// Route::url('print', [App\Http\Controllers\CitoyenController::class, 'print'])->name('print');

      
Route::get('home', function() {
// //************************************************************************************* 
        $citoyens = User::All();
        $mariages = Mariage::All();
        $naissances = Naissance::All();
        $divorces = Divorce::All();
        $deces = Dece::All();
        $users = User::All();
        // $jugements = Jugement::All();
 
        return view('home', [
            'citoyens' => $citoyens,
            'mariages' => $mariages,
            'naissances' => $naissances,
            'divorces' => $divorces,
            'deces' => $deces,
            // 'jugements' => $jugements,
            'users' => $users,
        ]);

})->name('home')->middleware('auth');


      
Route::get('home_cit', function() {
// //************************************************************************************* 
 $citoyen = User::find(Auth::id());        $sexe_h = 'M';
        $sexe_f = 'F';
        $citoyen_h = User::where('sexe', 'LIKE', '%'.$sexe_h.'%')
        ->get();
        $citoyen_f = User::where('sexe', 'LIKE', '%'.$sexe_f.'%')
        ->get();
        $citoyen = User::find(Auth::id());
        return view('home_cit', [
            'citoyen' => $citoyen, 
            'citoyens_h' => $citoyen_h, 
            'citoyens_f' => $citoyen_f, 
        ]);
})->name('home_cit')->middleware('auth'); 
     
Route::post('home_cit.store', function() {
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

        return redirect()->route('home_cit.index')
            ->with('success','Citoyen cré avec success.');

})->name('home_cit.store')->middleware('auth');

Route::get('/dashboard', function() {
//************************************************************************************* 
   $citoyens = User::All();
        $mariages = Mariage::All();
        $naissances = Naissance::All();
        $divorces = Divorce::All();
        $deces = Dece::All();
        $users = User::All();
        // $jugements = Jugement::All();
        return view('home', [
            'citoyens' => $citoyens,
            'mariages' => $mariages,
            'naissances' => $naissances,
            'divorces' => $divorces,
            'deces' => $deces,
            // 'jugements' => $jugements,
            'users' => $users,
        ]);
})->name('dashboard')->middleware('auth');

// Route::get('profile', function() {
// //************************************************************************************* 
//    $user = Auth::id();
//     return view('profile', compact('user',$user));

// })->name('profile')->middleware('auth');

// // ---------------------------------------------------------------------------------------------------
// Route::resource('citoyens/profile', CitoyenController::class)
// Route::get('citoyens/profile', 'App\Http\Controllers\CitoyenController@index');
// Route::resource('home_cit', Home_citController::class)
//     ->middleware('auth');
// Route::get('/home_cit', 'App\Http\Controllers\Home_citController@index');
// // ---------------------------------------------------------------------------------------------------
Route::resource('jugements', JugementController::class)
    ->middleware('auth');

    // ---------------------------------------------------------------------------------------------------
Route::resource('demandes', DemandeController::class)
    ->middleware('auth');
   // ---------------------------------------------------------------------------------------------------
Route::resource('demandes_cit', Demande_citController::class)
    ->middleware('auth');

// ---------------------------------------------------------------------------------------------------
Route::resource('users', UserController::class)
    ->middleware('auth');

// ---------------------------------------------------------------------------------------------------
Route::resource('citoyens', CitoyenController::class)
    ->middleware('auth');

// ---------------------------------------------------------------------------------------------------
Route::resource('mariages', MariageController::class)
    ->middleware('auth');

// ---------------------------------------------------------------------------------------------------
Route::resource('divorces', DivorceController::class)
    ->middleware('auth');
// ---------------------------------------------------------------------------------------------------
Route::resource('deces', DeceController::class)
    ->middleware('auth');

// ---------------------------------------------------------------------------------------------------
Route::resource('naissances', NaissanceController::class)
    ->middleware('auth');

// Route::resource('agents/{id}/affect', AgentsController::class)
//     ->middleware('auth');
// Route::resource('agents', AgentsController::class)
//     ->middleware('auth');

// ---------------------------------------------------------------------------------------------------
// Route::resource('unites', UnitesController::class)
//     ->middleware('auth');

 
// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
