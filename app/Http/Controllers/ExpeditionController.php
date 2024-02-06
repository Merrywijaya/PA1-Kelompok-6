<?php

namespace App\Http\Controllers;

use App\Models\Expedition;
use Illuminate\Http\Request;

class ExpeditionController extends Controller
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
        $collection = Expedition::paginate(10);
        return view('pages.expeditions.main', compact('collection'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.expeditions.input', ['data' => new Expedition]);
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
            'date' => 'required',
            'number' => 'required',
            'subject' => 'required',
            'from' => 'required',
            'to' => 'required',
            'description' => 'required',
        ]);

        $expedition = new Expedition;
        $expedition->date = $request->date;
        $expedition->number = $request->number;
        $expedition->subject = $request->subject;
        $expedition->from = $request->from;
        $expedition->to = $request->to;
        $expedition->description = $request->description;
        $expedition->save();

        return redirect()->route('expeditions.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Expedition  $expedition
     * @return \Illuminate\Http\Response
     */
    public function show(Expedition $expedition)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Expedition  $expedition
     * @return \Illuminate\Http\Response
     */
    public function edit(Expedition $expedition)
    {
        return view('pages.expeditions.input', ['data' => $expedition]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Expedition  $expedition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Expedition $expedition)
    {
        $this->validate($request, [
            'date' => 'required',
            'number' => 'required',
            'subject' => 'required',
            'from' => 'required',
            'to' => 'required',
            'description' => 'required',
        ]);

        $expedition->date = $request->date;
        $expedition->number = $request->number;
        $expedition->subject = $request->subject;
        $expedition->from = $request->from;
        $expedition->to = $request->to;
        $expedition->description = $request->description;
        $expedition->update();

        return redirect()->route('expeditions.index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Expedition  $expedition
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expedition $expedition)
    {
        $expedition->delete();
        return response()->json(['success' => 'Data berhasil dihapus']);
    }
}
