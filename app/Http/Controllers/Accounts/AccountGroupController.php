<?php

namespace App\Http\Controllers\Accounts;


use App\Models\AccountGroup;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AccountGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $groups = AccountGroup::all();
        return view('accounts.accountgroup.group',compact('groups'));
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
    public function show()
    {
        $groups = AccountGroup::all();
        return response()->json(['status' => '200', 'data' => $groups]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update()
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        //
    }
}
