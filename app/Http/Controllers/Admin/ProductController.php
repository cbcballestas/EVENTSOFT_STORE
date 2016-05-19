<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Product;
use App\Category;
use App\Http\Requests\SaveProductRequest;
use App\Http\Requests\UpdateProductRequest;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $products= Product::Search($request->name)->orderBy('id','ASC')->paginate(4);
        return view('admin.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('id','DESC')->lists('name','id');
        //dd($categories);
        return view('admin.product.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveProductRequest $request)
    { 
        //Manipulación de imágenes
          if ($request->file('image')) 
          {
             $file = $request->file('image');
             $name = 'eventsoft_'. time() . '.' . $file->getClientOriginalExtension();
             $path = public_path() . '/image/products/';
             $file->move($path,$name);
             $dir = 'image/products/';
             $full_name=$dir.$name;  
          }
           $data = [
           'name'        => $request->get('name'),
           'slug'        => str_slug($request->get('name')),
           'description' => $request->get('description'),
           'extract'     => $request->get('extract'),
           'price'       => $request->get('price'),
           'image'       => $full_name,
           'visible'     => $request->has('visible') ? 1 : 0,
           'category_id' => $request->get('category_id')
           ];

        $product= Product::create($data);
        $message = $product ? 'Producto guardado con éxito' : 'Error al guardar producto';
        return redirect()->route('admin.product.index')->with('message',$message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return $product;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::orderBy('id','DESC')->lists('name','id');
        return view('admin.product.edit',compact('categories','product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $a=0;
        if ($request->file('image')) 
          {
             $file = $request->file('image');
             $name = 'eventsoft_'. time() . '.' . $file->getClientOriginalExtension();
             $path = public_path() . '/image/products/';
             $file->move($path,$name);
             $dir = '/image/products/';
             $full_name=$dir.$name;
             $a=1;
          }else{
            $full_name=$product->image;
            $a=2;
          }  

            $data = [
           'name'        => $request->get('name'),
           'slug'        => str_slug($request->get('name')),
           'description' => $request->get('description'),
           'extract'     => $request->get('extract'),
           'price'       => $request->get('price'),
           'image'       => $full_name,
           'visible'     => $request->has('visible') ? 1 : 0,
           'category_id' => $request->get('category_id')
           ]; 
            $product->fill($data);
            $product->slug = str_slug($request->get('name'));
            $product->visible = $request->has('visible') ? 1 : 0;
            $updated= $product->save();
            /*$updated= $product->where('id','=',$product->id)
            ->update(['image' => $product->image]);*/
            //dd($product,$updated,$request->visible ? 1: 0);
        $message = $updated ? 'Producto actualizado con éxito' : 'Error al actualizar producto';
        
        return redirect()->route('admin.product.index')->with('message',$message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $deleted= $product->delete();
        $message= $deleted ? 'Producto eliminado éxitosamente' : 'Error al eliminar producto';
        return redirect()->route('admin.product.index')->with('message',$message);
    }
}
