<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request as Psr7Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GuzzleTestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    public function authtest(Request $request)
    {


        $response = Http::withCookies($request->cookies->all(), config('session.cookie'))
            ->get(url('http://kle.test/sanctum/csrf-cookie'));
        $csrfToken = $response->header('Set-Cookie');

        // Set the CSRF token as a cookie
        return response()->json([
            'message' => 'CSRF cookie set',
            'csrf_token' => $csrfToken,
        ])->cookie('XSRF-TOKEN', $csrfToken, 60 * 24); // Cookie lasts for 1 day
        return response()->json([
            'message' => 'CSRF cookie set',
            'status' => $response->status(),
            'cookie req' => $request->cookies->all(),
            'cookie res' => $response->cookies,
            'csrftoken' => $csrfToken,
            'cookie value' => $csrfCookieValue
        ]);

        // // Make a GET request to the Sanctum CSRF cookie route
        // $response = Http::withHeaders([
        //     'Accept' => 'application/json',
        // ])->get(url('http://kle.test/sanctum/csrf-cookie'));
        // // Check for successful response
        // if ($response->successful()) {
        //     return response()->json(['message' => 'CSRF cookie set successfully'], 200);
        // }

        // return response()->json(['message' => 'Failed to set CSRF cookie'], $response->status());
    }
    public function testing()
    {

        $products = Http::get('http://kle.test/api/v1/testing');

        return view('home', [
            'product' => $products,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
