<?php
use Illuminate\Support\Facades\With;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\ClientController;

// Route::get('/', function () {
//     return view('login')
//                     ->with('name' , 'DIENG')
//                     ->with('firstName' , 'Ndongo junior');
//     //view('welcome',['name' => 'Dieng','firstName' => 'Ndongo Junior']);
// });


Route::get('/', [UserController::class , 'index']);
Route::post('/login',[UserController::class,'authentication'])->name('auth.login');
Route::get('/logout',[UserController::class,'logout'])->name('auth.logout');

//Route::get('/ajout',[UserController::class , 'ajouter']);
Route::get('/listSearch',[UserController::class ,'index']);
//touts les routes de Employee
Route::controller(EmployeeController::class)->group(function (){
    Route::get('/ajout','ajouter');
    Route::get('/list','liste')->name('employee.list')->middleware('auth');
    Route::get('/listSearch','index');
    Route::get('/update/{id}','update');
    Route::post('/update/request','update_request');
    Route::get('/delete/{id}','delete');
    //Route::post('/ajouter/request','ajouter_request');
});
Route::post('/ajouter/request',[EmployeeController::class,'ajouter_request']);
Route::get('/login' , [UserController::class ,'login']);

//touts les routes de Produit
Route::controller(ProduitController::class)->group(function (){
    Route::get('/listProduit','list_produit');
    Route::get('/searchProduit','index');
    Route::get('/ajoutProduit','ajout_produit');
    Route::post('/ajout/Produit/request','ajout_produit_request');
    Route::get('/update/Produit/{id}','update_produit');  
    Route::post('/update/Produit/request/{id}','update_produit_request')->name('produit.update');
    Route::delete('/delete/Produit/{id}','delete_produit')->name('produit.delete');
});

//les routes du model Client pour importer via excel
Route::controller(ClientController::class)->group(function (){
    Route::post("simple-excel/import", "import")->name('excel.import');
    Route::get("/client/import","index");
});