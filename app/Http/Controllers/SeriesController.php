<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use App\Http\Requests\SeriesRequest;
use App\Models\Episode;
use App\Models\Season;
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
        $serie = Serie::create($request->all());

        $seasons = [];
        for ($i = 1; $i <= $request->seasonsQtd; $i++) {
            $seasons[] = [
                'series_id' => $serie->id,
                'numero' => $i
            ];
        }

        Season::insert($seasons);

        dd($serie);

        $episodes = [];
        foreach ($serie->seasons as $season) {
            for ($j = 1; $j <= $request->episodesPerSeason; $j++) {
                $seasons[] = [
                    'season_id' => $season->id,
                    'numero' => $j
                ];
            }
        }

        Episode::insert($episodes);

        return redirect()
            ->route('series.index')
            ->with('msg.sucesso', "Série '{$serie->nome}' adicionada com sucesso");
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
