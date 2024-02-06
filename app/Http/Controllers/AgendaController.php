<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use Illuminate\Http\Request;

class AgendaController extends Controller
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
        $collection = Agenda::paginate(10);
        return view('pages.agendas.main', compact('collection'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.agendas.input', ['data' => new Agenda]);
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
            'date_of_agenda' => 'required',
            'number_of_agenda' => 'required',
            'number_of_letter' => 'required',
            'date_of_letter' => 'required',
            'summary' => 'required',
            'from' => 'required',
            'to' => 'required',
            'description' => 'required',
        ]);

        $agenda = new Agenda;
        $agenda->date_of_agenda = $request->date_of_agenda;
        $agenda->number_of_agenda = $request->number_of_agenda;
        $agenda->number_of_letter = $request->number_of_letter;
        $agenda->date_of_letter = $request->date_of_letter;
        $agenda->summary = $request->summary;
        $agenda->from = $request->from;
        $agenda->to = $request->to;
        $agenda->description = $request->description;
        $agenda->save();

        return redirect()->route('agendas.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function show(Agenda $agenda)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function edit(Agenda $agenda)
    {
        return view('pages.agendas.input', ['data' => $agenda]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Agenda $agenda)
    {
        $this->validate($request, [
            'date_of_agenda' => 'required',
            'number_of_agenda' => 'required',
            'number_of_letter' => 'required',
            'date_of_letter' => 'required',
            'summary' => 'required',
            'from' => 'required',
            'to' => 'required',
            'description' => 'required',
        ]);

        $agenda->date_of_agenda = $request->date_of_agenda;
        $agenda->number_of_agenda = $request->number_of_agenda;
        $agenda->number_of_letter = $request->number_of_letter;
        $agenda->date_of_letter = $request->date_of_letter;
        $agenda->summary = $request->summary;
        $agenda->from = $request->from;
        $agenda->to = $request->to;
        $agenda->description = $request->description;
        $agenda->update();

        return redirect()->route('agendas.index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agenda $agenda)
    {
        $agenda->delete();
        return response()->json(['success' => 'Data berhasil dihapus']);
    }
}
