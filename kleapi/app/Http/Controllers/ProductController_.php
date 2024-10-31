<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreproductRequest;
use App\Http\Requests\UpdateproductRequest;
use App\Models\Product;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\File;

class ProductController extends Controller
{   
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::latest()->get();
        return view('home', [
            'product' => $products,
        ]);
    }

    public function indexproduct(Product $product)
    {
        return view('product', compact($product));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'title' => ['required'],
            'price' => ['required'],
            'description' => ['required'],
            'url' => ['nullable'],
        ],
        [
            'title.required'=>'Ürün Adı gerekli',
            'price.required'=>'Ürün Fiyatı gerekli',
            'description.required'=>'Ürün Açıklaması gerekli'
        ]
        );
       
        $user_id = Auth::user()->id;

         Product::create([
             'user_id' => $user_id,
             'title' => $request->title,
             'price' => $request->price,
             'logo' => "https://picsum.photos/seed/".(string)(rand(1,5000))."/200",
             'url' => 'test',
             'description' => $request->description,
            ]);
           
        
        return redirect('/home');
    }

    /**
     * Display the specified resource.
     */
    public function show(product $product)
    {
        return view('product', compact('product'));
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(product $product)
    {
        return view('products.edit' , compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, product $product)
    {
        $request->validate([
            'title' => ['required'],
            'price' => ['required'],
            'description' => ['required'],
            'url' => ['nullable'],
        ],[
            'title.required'=>'Ürün Adı gerekli',
            'price.required'=>'Ürün Fiyatı gerekli',
            'description.required'=>'Ürün Açıklaması gerekli'
        ]);
       
        $user_id = Auth::user()->id;
    
         $product->update([
             'user_id' => $user_id,
             'title' => $request->title,
             'price' => $request->price,
             'url' => 'test',
             'description' => $request->description,
            ]);
        return redirect('/product/'.$product->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(product $product)
    {
        $getproduct = Product::findorfail($product->id);

        $getproduct->delete();

        return redirect('/home');
    }
}
