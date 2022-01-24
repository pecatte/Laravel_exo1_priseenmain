<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Livre;
use App\Models\User;
use App\Models\Categorie;
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

Route::get('/', function () {
    return view('index');
});
Route::get('accueil', function () {
    return view('accueil');
})->name('accueil');
Route::get('liste', function () {
    //$livres = DB::select('select * from ltp1livres', []);
    //dump($livres);
    //$livres = DB::table('livres')->get();
    //dump($livres);

    $livres = Livre::get();
    //dump($livres);
    // $livres = DB::select('select titre from ltp1livres where id=1', [1]);
    // $livres = DB::table('livres')->select('titre')->where('id','=',1)->get();
    //$livres = Livre::find(1);
    //dump($livres);
    // $livres = DB::select('select titre, prix from ltp1livres where titre like ?', ['%Tom%']);
    // $livres = DB::table('livres')->select('titre','prix')->where('titre','like','%Tom%')->get();
    //$livres = Livre::where('titre','like','%Tom%')->get();
    //dump($livres);
   $livres = Livre::get();
   // $livres = Livre::join('users', 'users.id', '=', 'livres.user_id')->get();	
    // dump($livres);
    return view('liste_livres',['livres'=>$livres]);
});
Route::get('livredetail', function (Request $request) {
    $livre = Livre::find($request->input('id'));
    return view('livre_detail',['livre'=>$livre]);
});
Route::get('meslivres', function () {
    $livres = Livre::where('user_id',Auth::user()->id)->get();
    return view('meslivres',['livres'=>$livres]);
});
Route::get('ajouter', function () {
    $categories = Categorie::orderby('libelle')->get();
    return view('ajout_livre',['categories'=>$categories]);
});
Route::post('ajout', function (Request $request) {
    $livre = new Livre;
    $livre->titre = $request->titre;
    $livre->resume = $request->resume;
    $livre->prix = $request->prix;
    $livre->categorie_id = $request->categorie_id ;
    // le user connecté
    $livre->user_id = Auth::user()->id;
    // transfert de l'image
    if ($request->hasFile('image')) {
        $request->image->move('uploads', 'livre_'.time().'.jpg');
    }
    // enregistrement dans la BD
    $livre->save();
    $livres = Livre::where('user_id',Auth::user()->id)->get();
    return view('meslivres',['livres'=>$livres,'message'=>'Le livre a été ajouté']);
});
Route::get('recherche', function (Request $request) {
    $livres = Livre::where('titre','like','%'.$request->input('search').'%')->get();
    return view('resultat_recherche',['livres'=>$livres]);
});
Route::get('modifier', function (Request $request) {
    $livre = Livre::find($request->input('idlivre'));
    $categories = Categorie::orderby('libelle')->get();

    return view('modif_livre',['livre'=>$livre,'categories'=>$categories]);
});

Route::get('modifier_valid', function (Request $request) {
    $livre = Livre::find($request->idlivre);
    $livre->titre = $request->titre;
    $livre->resume = $request->resume;
    $livre->prix = $request->prix;
    $livre->categorie_id = $request->categorie_id ;
    $livre->save();
    $livres = Livre::where('user_id',Auth::user()->id)->get();
    return view('meslivres',['livres'=>$livres,'message'=>'Le livre a été modifié']);
});
Route::get('supprimer', function (Request $request) {
    $livre = Livre::find($request->idlivre);
    $livre->delete();
    $livres = Livre::where('user_id',Auth::user()->id)->get();
    return view('meslivres',['livres'=>$livres,'message'=>'Le livre a été supprimé']);
});

Route::get('proposepar', function (Request $request) {
    $user = User::find($request->input('id'));
    //$livres = Livre::where('user_id',$user->id)->get();
    //return view('user_detail',['user'=>$user,'livres'=>$livres]);
    return view('user_detail',['user'=>$user]);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

