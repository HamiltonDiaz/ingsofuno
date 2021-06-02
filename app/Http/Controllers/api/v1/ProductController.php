<?php

namespace App\Http\Controllers\api\v1;
use App\Http\Controllers\Controller;


use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products=Product::all();
        return [
            'products'=>$products
        ];
    }

    public function store(Request $request ){
        
        $product= new Product();
        $product->nombre=$request->nombre;
        $product->img=$request->img;
        $product->precio_actual=$request->precio_actual;
        $product->precio_anterior=$request->precio_anterior;
        $product->cantidad=$request->cantidad;
        $product->active=$request->active;
        $product->eliminado=$request->eliminado;
        $product->save();
        return response()->json(['product'=>$product],200);
    }

    
    public function update(Request $request ){

        //dd($request->all());
        $product= Product::findOrFail($request->id);

        if($request->nombre) {
            $product->nombre=$request->nombre;
            $product->img=$request->img;
            $product->precio_actual=$request->precio_actual;
            $product->precio_anterior=$request->precio_anterior;
            $product->cantidad=$request->cantidad;
        }else{
            $product->active=$request->active;
        }
        $product->save();
        return response()->json(['product'=>$product,'message'=>"Actualizado"],200);
    }

 
}
