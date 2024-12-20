<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class EmployeeController extends Controller implements HasMiddleware
{
    /**
     * Display a listing of the resource.
     */

     //Permite o token apenas no index
     public static function middleware(): array{
        return [
            new Middleware('checkToken:general-token', only: ['index']),
        ];
    }

    public function index()
    {
        return 'list of employees';
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return 'creating employee';
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
        return 'test show method';
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
