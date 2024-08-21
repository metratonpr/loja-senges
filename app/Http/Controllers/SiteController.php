<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SiteController extends Controller
{
      /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // $produtos = Product::all(); Devolve todos

        $produtos = Product::paginate(4);

        return view('site.home',compact('produtos'));
    }

    public function details($slug){

        $produto = Product::where('slug', $slug)->first();

        return view('site.details', compact('produto'));
        
    }

}
