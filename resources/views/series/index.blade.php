<x-layout title="{{ __('messages.app_name') }}">

    <a href="{{ route('series.create') }}" class="btn btn-dark mb-2"> Add series</a>

    @isset($msgSucesso)
        <div class="alert alert-success">
            {{ $msgSucesso }}
        </div>
    @endisset

    <ul class="list-group">
        @foreach ($series as $key => $value)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="{{ route('seasons.index', $value->id) }}">
                    {{ $value->nome }}
                </a>
                <span class="d-flex">

                    <a href="{{ route('series.edit', $value->id) }}" class="btn btn-primary btn-sm">
                        E
                    </a>

                    <form class="ms-2" action="{{ route('series.destroy', $value->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">
                            X
                        </button>
                    </form>
                </span>
            </li>
        @endforeach
    </ul>
    <script>
        const series = {{ Js::from($series) }};
        console.log(series);
    </script>
</x-layout>
