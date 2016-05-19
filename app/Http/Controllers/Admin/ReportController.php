<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Product;
use App\OrderItem;
class ReportController extends Controller
{
    public function index(){
    	$products = \DB::table('products')
    	            ->leftJoin('order_items','products.id','=','order_items.product_id')
    	            ->select('products.name',\DB::raw('count(order_items.id) as NumCompras'))->groupBy('products.name')->paginate(12);
    	//dd($products);            
    	return view('admin.reports.index',compact('products'));            
    }
}
