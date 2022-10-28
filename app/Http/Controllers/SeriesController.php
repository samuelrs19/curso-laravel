<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use App\Http\Requests\SeriesRequest;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index()
    {
        $series = Serie::all();
        $msgSucesso = session('msg.sucesso');

        return view('series.index')
            ->with('series', $series)->with('msgSucesso', $msgSucesso);
    }

    public  function create()
    {
        return view('series.create');
    }

    public function store(SeriesRequest $request)
    {
        $series = Serie::create($request->all());
        return redirect()
            ->route('series.index')
            ->with('msg.sucesso', "Série '{$series->nome}' adicionada com sucesso");
    }

    public function destroy(Serie $series)
    {
        $series->delete();
        return redirect()
            ->route('series.index')
            ->with('msg.sucesso', "Série '{$series->nome}' removida com sucesso");
    }

    public function edit(Serie $series)
    {
        return view('series.edit')->with('serie', $series);
    }

    public function update(Serie $series, SeriesRequest $request)
    {
        $series->fill($request->all());
        $series->save();

        return redirect()->route('series.index')
            ->with('msg.sucesso', "Série '{$series->nome}' atualizada com sucesso");
    }
}
