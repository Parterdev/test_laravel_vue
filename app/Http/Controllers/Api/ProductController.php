<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
//Request validado
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    //Variable
    protected $product;

    public function __construct(Product $product)
    {
        //Asignamos la entidad a una variable
        $this->product = $product;
    }

    public function index()
    {
        //Devolvemos la data de nuestros productos
        return $this->product->get()->all();
        
    }

    
    public function store(ProductRequest $request)
    {
        //Salvamos los datos una vez validados
        $product = $this->product->create($request->validated());
        $product->save();

        return $product;
    }

    
    public function show(Product $product)
    {
        //
    }

    
    public function update(ProductRequest $request, Product $product)
    {
        //Actualizamos el record validado
        $this->product->update($request->validated());
        $product->save();

        return $product;

    }

    
    public function destroy(Product $product)
    {
        //Eliminado fisico
        $product->delete();
    }
}
