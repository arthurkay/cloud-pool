<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use  Illuminate\Support\Str;
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
    public function update(Request $request)
    {
        if ($request->type == "TXT") {
            Redis::hset(Str::lower($request->zone), Str::lower($request->host), json_encode([Str::lower($request->type) => [
                array('ttl' => (int)$request->ttl, 'text' => Str::lower($request->value))
            ]]));
        }

        if ($request->type == "A") {
            Redis::hset(Str::lower($request->zone), Str::lower($request->host), json_encode([Str::lower($request->type) => [
                array('ttl' => (int)$request->ttl, 'ip' => Str::lower($request->value))
            ]]));
        }

        if ($request->type == "AAAA") {
            Redis::hset(Str::lower($request->zone), Str::lower($request->host), json_encode([Str::lower($request->type) => [
                array('ttl' => (int)$request->ttl, 'ip' => Str::lower($request->value))
            ]]));
        }

        if ($request->type == "CNAME") {
            Redis::hset(Str::lower($request->zone), Str::lower($request->host), json_encode([Str::lower($request->type) => [
                array('ttl' => (int)$request->ttl, 'host' => Str::lower($request->value))
            ]]));
        }

        if ($request->type == "MX") {
            Redis::hset(Str::lower($request->zone), Str::lower($request->host), json_encode([Str::lower($request->type) => [
                array('ttl' => (int)$request->ttl, 'preference' => (int)$request->priority, 'host' => Str::lower($request->value))
            ]]));
        } 
        return redirect()->back()->with('success','Record updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        Redis::hdel($request->zone, $request->id);
        return redirect()->back()->with('success', 'Record successfully deleted');
    }

    public function zone(String $zone) {
        $params = [
            'zone' => $zone
        ];
        return view('zone', $params);
    }
}
