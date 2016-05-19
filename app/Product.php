<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table='products';
    protected $fillable=['name','slug','description','extract','image','visible','price','category_id'];
    // Relación de uno a muchos con Categorias
    public function category(){
       return $this->belongsTo('App\Category');
    }

    // Relation with OrderItem
    public function order_item()
    {
        return $this->hasOne('App\OrderItem');
    }

    //Buscador de productos
    public function scopeSearch($query,$name)
    {
        return $query->where('name','LIKE',$name);
    }
    
}
