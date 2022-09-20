<x-layout title="Series">

    <a href="series/criar" class="btn btn-dark mb-2"> Add series</a>

    <ul class="list-group">
        @foreach ($series as $key => $value)
            <li class="list-group-item">{{ $value->nome }}</li>
        @endforeach
    </ul>
    <script>
        const series = {{ Js::from($series) }};
        console.log(series);
    </script>
</x-layout>
