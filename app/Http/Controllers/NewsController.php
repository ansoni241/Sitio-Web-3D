<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    public function index(){

        // $news = DB::table('news')->get();
        $news = DB::table('news')
            ->where('online_sino', 1)
            ->orderBy('fecha') // Ordenar por fecha en orden descendente
            ->get();
        return view('news',['news'=>$news, 'allNews' => $news]);
    }
}
