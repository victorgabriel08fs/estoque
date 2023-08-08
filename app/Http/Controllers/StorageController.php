<?php

namespace App\Http\Controllers;

use App\Models\Storage;
use App\Http\Requests\StoreStorageRequest;
use App\Http\Requests\UpdateStorageRequest;

class StorageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $storages = Storage::orderBy('name')->paginate(10);
        return view('storages.index', ['storages' => $storages]);
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
    public function store(StoreStorageRequest $request)
    {
        $data = $request->validated();

        $storage = Storage::create($data);

        return redirect()->back()->with('message', 'Storage created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Storage $storage)
    {
        return view('storages.show', ['storage' => $storage]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Storage $storage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStorageRequest $request, Storage $storage)
    {
        $data = $request->validated();

        $storage->update($data);

        return redirect()->back()->with('message', 'Storage updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Storage $storage)
    {
        $storage->delete();

        return redirect()->back()->with('message', 'Storage deleted');
    }
}
