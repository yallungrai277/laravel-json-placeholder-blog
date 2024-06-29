<main @class($containerClass)>

    <a href="{{ route('resource.landing') }}"
        class="flex items-center justify-center w-1/2 px-5 py-2 text-sm text-gray-700 transition-colors duration-200 bg-white border rounded-lg gap-x-2 sm:w-auto dark:hover:bg-gray-800 dark:bg-gray-900 hover:bg-gray-100 dark:text-gray-200 dark:border-gray-700">
        <svg class="w-5 h-5 rtl:rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
            stroke-width="1.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75L3 12m0 0l3.75-3.75M3 12h18" />
        </svg>
        <span>Back to resources</span>
    </a>

    <h2 class="inline-block mb-2 text-3xl font-extrabold tracking-tight text-gray-900 dark:text-white mt-2">
        {{ $resourceTitle ?? '' }}
    </h2>

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
