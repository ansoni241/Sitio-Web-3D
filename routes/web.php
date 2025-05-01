<?php

use App\Models\News;
use App\Models\Video;
use App\Models\Contact;
use App\Models\Product;
use App\Models\Entrevista;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\VistaController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\InterviewsController;
use App\Http\Controllers\Admin\ChartController;
use App\Http\Controllers\Admin\SocialController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\NetworksController;
use App\Http\Controllers\Admin\RedsocialController;
use App\Http\Controllers\Admin\ReportageController;
use App\Http\Controllers\Admin\VideofileController;
use App\Http\Controllers\Admin\AuditarlogController;
use App\Http\Controllers\Admin\EntrevistaController;
use App\Http\Controllers\Admin\ContactanosController;
use App\Http\Controllers\Admin\AuditarsesionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\AuthenticatedSesionController;
use App\Http\Controllers\EmailVerificationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// *********************PAGINA DE INICIO*****************************
Route::view('/','welcome')->name('home');

Route::get('/store',[StoreController::class,'index'])->name('store');
Route::post('/store/{store}', [StoreController::class, 'agregarAlCarrito'])->name('stores.cart');
Route::get('/store/{store}',[StoreController::class,'show'])->name('stores.show');

Route::view('/contact','contact')->name('contact');
Route::post('/contact',[ContactController::class,'store']);

Route::get('/news',[NewsController::class,'index'])->name('news');

Route::view('/about','about')->name('about');

Route::get('/video',[VideoController::class,'index'])->name('video');
Route::get('/interviews',[InterviewsController::class,'index'])->name('interviews');

Route::get('/verify-email/{token}', [EmailVerificationController::class, 'verify'])->name('verify-email');

// *********************END PAGINA DE INICIO*****************************

//**************PARA LA PARTE DE INICIO********** */
Route::get('/dashboard', function () {
    // ***************INFORMACIÓN***************************************
    $cantidadVideos = Video::count();
    $cantidadMensajes = Contact::where('online_sino', 1)->count();
    $cantidadNoticias = News::count();
    $cantidadProductosActivos = Product::where('estado', 1)->count();
    // **************END INFORMACIÓN************************************
    // *************************GRAFICOS********************************
    $noticiasgrafico = News::select(DB::raw('YEAR(fecha) AS año'), DB::raw('MONTH(fecha) AS mes'), DB::raw('COUNT(*) AS total'))
                    ->groupBy('año', 'mes')
                    ->orderBy('año')
                    ->orderBy('mes')
                    ->get();
    $mensajesgrafico = Contact::select(DB::raw('YEAR(created_at) AS año'), DB::raw('MONTH(created_at) AS mes'), DB::raw('COUNT(*) AS total'))
                    ->groupBy('año', 'mes')
                    ->orderBy('año')
                    ->orderBy('mes')
                    ->get();
    // *************************END GRAFICOS****************************
    return view('dashboard', [
        'cantidadVideos' => $cantidadVideos,
        'cantidadProductosActivos' => $cantidadProductosActivos,
        'cantidadMensajes' => $cantidadMensajes,
        'cantidadNoticias' => $cantidadNoticias,
        'noticiasgrafico' => $noticiasgrafico,
        'mensajesgrafico' => $mensajesgrafico,

    ]);
})->middleware(['auth', 'verified'])->name('dashboard');
//***************FIN DE INICIO****************** */

// *******************Admin LTE***************************************
Route::resource('product',ProductController::class)->names('admin.product');
Route::resource('videofile',VideofileController::class)->names('admin.videofile');
Route::resource('entrevista',EntrevistaController::class)->names('admin.entrevista');
Route::resource('reportage',ReportageController::class)->names('admin.reportage');
Route::resource('chart',ChartController::class)->names('admin.chart');
Route::resource('social',SocialController::class)->names('admin.social');
Route::resource('contactanos',ContactanosController::class)->names('admin.contactanos');
Route::resource('user',UserController::class)->only(['index','create','store','edit','update'])->names('admin.user');
// ++++++++++++++++++++AUDITAR+++++++++++++++++++++++++++
Route::resource('auditarsesion',AuditarsesionController::class)->names('admin.auditarsesion');
Route::resource('auditarlog',AuditarlogController::class)->names('admin.auditarlog');
// ++++++++++++++++++++END AUDITAR+++++++++++++++++++++++
//*******************End Admin LTE************************************

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
