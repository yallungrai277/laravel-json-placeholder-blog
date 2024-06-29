<main class="flex items-center justify-center min-h-full h-auto bg-indigo-400 flex-col overflow-y-scroll py-10">
    <h1 class="inline-block mb-2 text-3xl font-extrabold tracking-tight text-gray-900 dark:text-white">
        {{ $resourceTitle ?? '' }} </h1>

    {{ $slot }}
    <nav aria-label="Page navigation example">
        <ul class="inline-flex -space-x-px text-sm">
            @foreach ($items['links'] as $link)
                @php
                    $shouldNavigate = !empty($link['url']);
                @endphp
                <li>
                    <a href="{{ $shouldNavigate ? $link['url'] : '' }}"
                        @if (!$shouldNavigate) style = "pointer-events:none;" @endif
                        @if ($link['active']) aria-current="page" @endif
                        class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                        {!! $link['label'] !!}
                    </a>
                </li>
            @endforeach
        </ul>
    </nav>
</main>
