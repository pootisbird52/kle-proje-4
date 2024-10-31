<?php

namespace App\Http\Controllers;


use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class ProductController extends Controller
{   
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $products = Http::acceptJson()->withHeaders([
                'Authorization' => session('token'),
                'Referer' => 'kle.test/login',
                'X-Xsrf-Token' => ''
            ])->get('http://'.env('API_URL').'/api/v1/product')->collect();
            // $myval = collect($products['data']);
            $page = $products->paginate(3);
            $myval = $products;
            return view('home', [
            'product' => $page,
            'paginate' => $products
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
        Http::withHeaders([
            'Authorization' => session('token'),
        ])->post(env('API_URL').'/api/v1/product/' ,[
            'title' => $request->input('title'),
            'price' => $request->input('price'),
            'description' => $request->input('description'),
        ]);
    
        return redirect('/home');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

        $product = Http::acceptJson()->withHeaders([
            'Authorization' => session('token'),
            'Referer' => 'kle.test',
            'X-Xsrf-Token' => ''
        ])->get('http://'.env('API_URL').'/api/v1/product/'.$id)->json();
        return view('product', compact('product'));
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Http::acceptJson()->withHeaders([
            'Authorization' => session('token'),
            'Referer' => 'kle.test',
            'X-Xsrf-Token' => ''
        ],
        )->get('http://'.env('API_URL').'/api/v1/product/'.$id)->json();

        return view('products.edit' , compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request , $id)
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
        ]);
        Http::withHeaders([
            'Authorization' => session('token'),
        ])->patch('http://'.env('API_URL').'/api/v1/product/'.$id ,[
            'title' => $request->input('title'),
            'price' => $request->input('price'),
            'description' => $request->input('description')
        ]);
        return redirect('/home');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Http::withHeaders([
            'Authorization' => session('token'),
        ])->delete(('http://'.env('API_URL').'/api/v1/product/'.$id));

        return redirect('/home');
    }
}
