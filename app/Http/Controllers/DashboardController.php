<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Str;
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
        $subdomain = Redis::hget(Str::lower($request->zone), Str::lower($request->host));
        if ($request->type == "TXT") {
            if (!empty($subdomain)) {
                foreach(json_decode($subdomain) as $type => $details) {
                    foreach($details as $index => $attributes) {
                        if ($type == "txt") {
                            if ($attributes->text == Str::lower($request->oldValue)) {
                                $entry = array();
                                $newSubdomainRecord = json_decode($subdomain)->txt;
                                array_splice($newSubdomainRecord, $index, 1);
                                array_push($newSubdomainRecord, array('ttl' => (int)$request->ttl, 'text' => Str::lower($request->value)));
                                foreach(json_decode($subdomain) as $key => $value) {
                                    if ($key != "txt") {
                                        $entry[$key] = $value;
                                    }
                                }
                                $entry["txt"] = $newSubdomainRecord;
                                Redis::hset(Str::lower($request->zone), Str::lower($request->host), json_encode($entry));
                                return redirect()->back()->with('success','Record updated successfully');
                            }
                        }
                    }
                }
            } else {
                return redirect()->back()->with('error','Unable to update record');
            }
        }

        if ($request->type == "A") {
            if (!empty($subdomain)) {
                foreach(json_decode($subdomain) as $type => $details) {
                    foreach($details as $index => $attributes) {
                        if ($type == "a") {
                            if ($attributes->ip == Str::lower($request->oldValue)) {
                                $entry = array();
                                $newSubdomainRecord = json_decode($subdomain)->a;
                                array_splice($newSubdomainRecord, $index, 1);
                                array_push($newSubdomainRecord, array('ttl' => (int)$request->ttl, 'ip' => Str::lower($request->value)));
                                foreach(json_decode($subdomain) as $key => $value) {
                                    if ($key != "a") {
                                        $entry[$key] = $value;
                                    }
                                }
                                $entry["a"] = $newSubdomainRecord;
                                Redis::hset(Str::lower($request->zone), Str::lower($request->host), json_encode($entry));
                                return redirect()->back()->with('success','Record updated successfully');
                            }
                        }
                    }
                }
            } else {
                return redirect()->back()->with('error','Unable to update record');
            }
        }

        if ($request->type == "AAAA") {
            if (!empty($subdomain)) {
                foreach(json_decode($subdomain) as $type => $details) {
                    foreach($details as $index => $attributes) {
                        if ($type == "aaaa") {
                            if ($attributes->ip == Str::lower($request->oldValue)) {
                                $entry = array();
                                $newSubdomainRecord = json_decode($subdomain)->aaaa;
                                array_splice($newSubdomainRecord, $index, 1);
                                array_push($newSubdomainRecord, array('ttl' => (int)$request->ttl, 'ip' => Str::lower($request->value)));
                                foreach(json_decode($subdomain) as $key => $value) {
                                    if ($key != "aaaa") {
                                        $entry[$key] = $value;
                                    }
                                }
                                $entry["aaaa"] = $newSubdomainRecord;
                                Redis::hset(Str::lower($request->zone), Str::lower($request->host), json_encode($entry));
                                return redirect()->back()->with('success','Record updated successfully');
                            }
                        }
                    }
                }
            } else {
                return redirect()->back()->with('error','Unable to update record');
            }
        }

        if ($request->type == "CNAME") {
            if (!empty($subdomain)) {
                foreach(json_decode($subdomain) as $type => $details) {
                    foreach($details as $index => $attributes) {
                        if ($type == "cname") {
                            if ($attributes->host == Str::lower($request->oldValue)) {
                                $entry = array();
                                $newSubdomainRecord = json_decode($subdomain)->cname;
                                array_splice($newSubdomainRecord, $index, 1);
                                array_push($newSubdomainRecord, array('ttl' => (int)$request->ttl, 'host' => Str::lower($request->value)));
                                foreach(json_decode($subdomain) as $key => $value) {
                                    if ($key != "cname") {
                                        $entry[$key] = $value;
                                    }
                                }
                                $entry["cname"] = $newSubdomainRecord;
                                Redis::hset(Str::lower($request->zone), Str::lower($request->host), json_encode($entry));
                                return redirect()->back()->with('success','Record updated successfully');
                            }
                        }
                    }
                }
            } else {
                return redirect()->back()->with('error','Unable to update record');
            }
        }

        if ($request->type == "MX") {
            if (!empty($subdomain)) {
                foreach(json_decode($subdomain) as $type => $details) {
                    foreach($details as $index => $attributes) {
                        if ($type == "mx") {
                            if ($attributes->host == Str::lower($request->oldValue)) {
                                $entry = array();
                                $newSubdomainRecord = json_decode($subdomain)->mx;
                                array_splice($newSubdomainRecord, $index, 1);
                                array_push($newSubdomainRecord, array('ttl' => (int)$request->ttl, 'preference' => (int)$request->priority, 'host' => Str::lower($request->value)));
                                foreach(json_decode($subdomain) as $key => $value) {
                                    if ($key != "mx") {
                                        $entry[$key] = $value;
                                    }
                                }
                                $entry["mx"] = $newSubdomainRecord;
                                Redis::hset(Str::lower($request->zone), Str::lower($request->host), json_encode($entry));
                                return redirect()->back()->with('success','Record updated successfully');
                            }
                        }
                    }
                }
            } else {
                return redirect()->back()->with('error','Unable to update record');
            }
        } 
        return redirect()->back()->with('warning','Oops, record not found');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $subdomain = Redis::hget(Str::lower($request->zone), Str::lower($request->id));
        if (!empty($subdomain)) {
            foreach(json_decode($subdomain) as $type => $details) {
                foreach($details as $index => $attributes) {
                    $content = "";
                    switch($type) {
                        case 'a':
                            $content = 'ip';
                            break;
                        case 'aaaa':
                            $content = 'ip';
                            break;
                        case 'cname':
                            $content = 'host';
                            break;
                        case 'txt':
                            $content = 'text';
                            break;
                        case 'mx':
                            $content = 'host';
                            break;
                        default:
                            $content = 'ip';
                    }
                    if ($type == $request->deleteType) {
                        if ($attributes->$content == Str::lower($request->deleteValue)) {
                            $entry = array();
                            $newSubdomainRecord = json_decode($subdomain)->$type;
                            array_splice($newSubdomainRecord, $index, 1);
                            foreach(json_decode($subdomain) as $key => $value) {
                                if ($key != $request->deleteType) {
                                    $entry[$key] = $value;
                                }
                            }
                            $entry[$request->deleteType] = $newSubdomainRecord;
                            Redis::hset(Str::lower($request->zone), Str::lower($request->id), json_encode($entry));
                            return redirect()->back()->with('success','Record deleted successfully');
                        }
                    }
                }
            }
        } else {
            return redirect()->back()->with('error','Unable to delete record');
        }
    }

    public function zoneDestroy(Request $request)
    {
        Redis::del($request->id);
        return redirect()->back()->with('success', 'Zone successfully deleted');
    }

    public function zone(String $zone) {
        $params = [
            'zone' => $zone
        ];
        return view('zone', $params);
    }
}
