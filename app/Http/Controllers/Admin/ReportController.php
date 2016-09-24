<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\OrderItem;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ReportController extends Controller
{
    public function index(){
    	$products = DB::table('products')
    	            ->leftJoin('order_items','products.id','=','order_items.product_id')
    	            ->select('products.name',DB::raw('count(order_items.id) as NumCompras'))->groupBy('products.name')->paginate(12);
    	//dd($products);            
    	return view('admin.reports.index',compact('products'));            
    }
}
