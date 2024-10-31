<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreproductRequest;
use App\Http\Requests\UpdateproductRequest;
use App\Http\Resources\ProductResource;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

use function Pest\Laravel\castAsJson;

class ProductController extends Controller
{   
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        // $products = Product::with(['user'])->get()->latest();
        // $products = Product::with('roles')->first();
        // $products = Product::with(['user','logo'])->latest()->get();

        // $products = Product::with(['user' , 'logo'])->get();
        // $products = Product::all()->collect(JSON_PRETTY_PRINT); //THIS WORKS !!
        // $products = Product::with('user')->get()->collect() ;// THIS WORKS ! ! !;  
        // $products = Product::with('user')->get();
        
        $products =(Product::with('user')->latest()->get()->collect()) ;// THIS WORKS ! ! !;  
        // $products = new ProductResource( Product::with('user')->paginate(3));
        return $products  ;
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
       
        $user_id = $request->user()->id; //Come back here after doing auth

        $createdproduct = Product::create([
             'user_id' => $user_id,
             'title' => $request->title,
             'price' => $request->price,
             'logo' => "https://picsum.photos/seed/".(string)(rand(1,5000))."/200",
             'url' => 'test',
             'description' => $request->description,
            ]);
           
        
        return [json_encode($createdproduct) , redirect('kle.test/home')];
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // $product = collect(Product::find(3)->with('user'));
        $product = Product::with('user')->find($id);
        return $product;

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
           
        $createdproduct = $product->update([
             'title' => $request->title,
             'price' => $request->price,
             'url' => 'test',
             'description' => $request->description,
            ]);
        return castAsJson($request) ;    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(product $product)
    {
        $getproduct = Product::findorfail($product->id);

        $getproduct->delete();

        return redirect('kle.test/home');
    }
}
