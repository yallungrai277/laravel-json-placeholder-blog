<div class="m-2">
    <a href="{{ !empty($user['url']) ? $user['url'] : '' }}"
        class="max-w-sm bg-white shadow-lg rounded-lg overflow-hidden my-4">
        <div class="flex items-center px-6 py-3 bg-gray-900">
            <h1 class="mx-3 text-white font-semibold text-lg">{{ $user['name'] ?? '' }}</h1>
        </div>
        <div class="py-4 px-6 bg-white">
            <div class="flex items-center mt-4 text-gray-700">
                <svg class="h-6 w-6 fill-current" viewBox="0 0 512 512">
                    <path
                        d="M437.332 80H74.668C51.199 80 32 99.198 32 122.667v266.666C32 412.802 51.199 432 74.668 432h362.664C460.801 432 480 412.802 480 389.333V122.667C480 99.198 460.801 80 437.332 80zM432 170.667L256 288 80 170.667V128l176 117.333L432 128v42.667z" />
                </svg>
                <h1 class="px-2 text-sm">{{ $user['email'] }}</h1>
            </div>
        </div>
    </a>
</div>
