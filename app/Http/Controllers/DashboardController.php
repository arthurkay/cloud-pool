<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Record;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard');
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
        $record = Record::create([
            'name' => $request->host,
            'ttl' => $request->ttl,
            'type' => $request->type,
            'content' => $request->value,
            'disabled' => 0
        ]);

        if ($record->save()) {
            return redirect()->back()->with('success', 'Record added successfully');
        } else {
            return redirect()->back()->with('error', 'Unable to add record');
        }
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
