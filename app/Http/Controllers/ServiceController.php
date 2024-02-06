<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{

    public function __construct()
    {
        $this->middleware('User')->only('index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collection  = Service::paginate(10);
        return view('pages.services.main', compact('collection'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.services.input', ['data' => new Service]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'document' => 'required',
            'condition' => 'required',
            'cost' => 'required',
            'process' => 'required',
        ]);

        $service = new Service;
        $service->name = $request->name;
        $service->document = $request->document;
        $service->condition = $request->condition;
        $service->cost = $request->cost;
        $service->process = $request->process;
        $service->save();

        return redirect()->route('services.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        return view('pages.services.input', ['data' => $service]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        $this->validate($request, [
            'name' => 'required',
            'document' => 'required',
            'condition' => 'required',
            'cost' => 'required',
            'process' => 'required',
        ]);

        $service->name = $request->name;
        $service->document = $request->document;
        $service->condition = $request->condition;
        $service->cost = $request->cost;
        $service->process = $request->process;
        $service->update();

        return redirect()->route('services.index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $service->delete();
        return response()->json(['success' => 'Data berhasil dihapus']);
    }
}
