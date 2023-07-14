<?php

namespace App\Http\Controllers\Sales;

use App\Http\Controllers\Controller;
use App\Models\qoutes;
use Illuminate\Http\Request;

class QuotesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('sales.quotes');
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
    public function show(qoutes $qoutes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(qoutes $qoutes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, qoutes $qoutes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(qoutes $qoutes)
    {
        //
    }
}
