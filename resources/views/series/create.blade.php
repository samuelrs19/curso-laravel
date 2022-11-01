<x-layout title="Nova Série">
    <form action="{{ route('series.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="nome" class="form-label">Nome:</label>
            <input type="text" id="nome" name="nome" class="form-control" value="{{ old('nome') }}" />
        </div>
        <div class="mb-3">
            <label for="seasonsQtd" class="form-label">Nº Temporadas:</label>
            <input type="text" id="seasonsQtd" name="seasonsQtd" class="form-control"
                value="{{ old('seasonsQtd') }}" />
        </div>
        <div class="mb-3">
            <label for="episodesPerSeason" class="form-label">Nº Eps / Temporada::</label>
            <input type="text" id="episodesPerSeason" name="episodesPerSeason" class="form-control"
                value="{{ old('episodesPerSeason') }}" />
        </div>

        <button type="submit" class="btn btn-primary">Adicionar</button>
    </form>
</x-layout>
