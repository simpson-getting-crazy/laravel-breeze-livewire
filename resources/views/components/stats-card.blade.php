<!-- stats-card.blade.php -->
@props([
    'title',
    'value',
    'change',
])

<div class="bg-white rounded-lg shadow-md p-6 border border-gray-100 transition-all duration-200 hover:shadow-lg">
    <div class="flex justify-between items-start">
        <div>
            <p class="text-gray-500 text-sm font-medium mb-1">{{ $title }}</p>
            <h3 class="text-2xl font-bold text-gray-800">{{ $value }}</h3>
            <div class="flex items-center mt-2">
                @if (!empty($change))
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-emerald-500 mr-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"></circle>
                        <polyline points="16 12 12 8 8 12"></polyline>
                        <line x1="12" y1="16" x2="12" y2="8"></line>
                    </svg>
                    <span class="text-emerald-500 text-sm font-medium">{{ $change }}% increase</span>
                @endif
            </div>
        </div>
        <div class="p-3 rounded-full bg-red-50">
            {{ $slot }}
        </div>
    </div>
</div>
