<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;


class ProductController extends BaseController
{
    public function index(Request $request)
    {
        $products = Product::paginate(9);
        return $this->sendResponse($products->toArray(), 'Produtos recuperados com sucesso.');
        //    ->header('X-Total-Count', Product::all()->count());
    }

    public function store(Request $request)
    {
        $product = Product::create($request->all());
        return $this->sendResponse($product, 'Produto criado com sucesso.', 201);
    }


    public function show($id)
    {
        try{
            $product = Product::findOrFail($id);
            return $this->sendResponse($product, 'Produto recuperado com sucesso.');
        }catch(ModelNotFoundException $e){
            return $this->sendError('Produto não encontrado', $e, 404);  
        }
    }

    public function update($id, Request $request)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
