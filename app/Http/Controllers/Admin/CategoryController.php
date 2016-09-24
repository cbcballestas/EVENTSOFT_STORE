<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(6);
        //dd($categories);
        return view('admin.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        if($request->description == ''){
           $request->description = 'Ninguna';  
        }

        $this->validate($request,[
            'name'  => 'required|unique:categories|max:255',
            'color' => 'required',
        ]);
        $category= Category::create([
            'name'        => $request->get('name'),
            'slug'        => str_slug($request->get('name')),
            'description' => $request->description,
            'color'       => $request->get('color'),
        ]);

        $message = $category ? 'Categoría agregada con éxito!' : 'Error al agregar categoría';
        return redirect()->route('admin.category.index')->with('message',$message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return $category;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $category->fill($request->all());
        $category->slug = str_slug($request->get('name'));

        $updated = $category->save();

        $message = $updated ? 'Categoría actualizada con éxito' : 'Error al actualizar categoría !';
        return redirect()->route('admin.category.index')->with('message',$message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $deleted = $category->delete();
        $message = $deleted ? 'Categoría eliminada con éxito!' : 'Error al eliminar categoría';
        return redirect()->route('admin.category.index')->with('message',$message);
    }
}