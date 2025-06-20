<!-- filepath: c:\Users\Amran\Herd\TodoApp\resources\views\components\alert.blade.php -->
@props(['type' => 'success', 'message'])

@php
    $alertClasses = [
        'success' => 'bg-green-50 border-green-400 text-green-700',
        'error' => 'bg-red-50 border-red-400 text-red-700',
        'warning' => 'bg-yellow-50 border-yellow-400 text-yellow-700',
        'info' => 'bg-blue-50 border-blue-400 text-blue-700'
    ];

    $iconColors = [
        'success' => 'text-green-400',
        'error' => 'text-red-400',
        'warning' => 'text-yellow-400',
        'info' => 'text-blue-400'
    ];
@endphp

<div
    class="border-l-4 {{ $alertClasses[$type] }} p-4 mb-6 rounded-r-lg shadow-sm animate-slide-up relative overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-r from-transparent to-white opacity-20"></div>
    <div class="flex items-center relative z-10">
        <div class="flex-shrink-0">
            @if($type === 'success')
                <svg class="h-5 w-5 {{ $iconColors[$type] }}" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                        clip-rule="evenodd" />
                </svg>
            @elseif($type === 'error')
                <svg class="h-5 w-5 {{ $iconColors[$type] }}" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                        clip-rule="evenodd" />
                </svg>
            @endif
        </div>
        <div class="ml-3 flex-1">
            <p class="text-sm font-medium">{{ $message }}</p>
        </div>
        <div class="ml-auto pl-3">
            <button onclick="this.closest('.border-l-4').remove()"
                class="{{ $iconColors[$type] }} hover:opacity-75 transition-opacity">
                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd" />
                </svg>
            </button>
        </div>
    </div>
</div>