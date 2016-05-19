<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Product;
use App\Category;
class StoreController extends Controller
{
    public function index(Request $request){
        $categorias = Category::all();
    	$products= Product::Search($request->name)->paginate(8);
    	//dd($products);
    	return view('store.index',compact('products','categorias'));
    }

    public function show($slug){
        $product = Product::where('slug',$slug)->first();
        //dd($product);
        return view('store.show',compact('product'));
    }

    public function category($slug) { 
        $productos= \DB::table('products')
                    ->join('categories','products.category_id','=','categories.id')
                    ->where('categories.slug','=',$slug)
                    ->select('products.*')
                    ->paginate(4);
        $categoria  = Category::where('slug',$slug)->first();            
        return view('store.category', compact('productos','categoria')); 
    } 
}
