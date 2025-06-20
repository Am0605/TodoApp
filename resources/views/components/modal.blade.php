<!-- filepath: c:\Users\Amran\Herd\TodoApp\resources\views\components\modal.blade.php -->
@props(['id', 'title', 'action' => null, 'method' => 'POST'])

<div id="{{ $id }}"
    class="fixed inset-0 bg-black bg-opacity-50 backdrop-blur-sm overflow-y-auto h-full w-full hidden z-50 transition-all duration-300">
    <div class="relative top-20 mx-auto p-5 border max-w-lg shadow-2xl rounded-2xl bg-white animate-bounce-in">
        <div class="relative">
            <!-- Decorative header -->
            <div
                class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-primary via-secondary to-pink-500 rounded-t-2xl">
            </div>

            <div class="mt-3">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-xl font-semibold text-gray-900 flex items-center gap-2">
                        <div
                            class="w-8 h-8 bg-gradient-to-br from-primary to-secondary rounded-lg flex items-center justify-center">
                            <svg class="h-4 w-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                        </div>
                        {{ $title }}
                    </h3>
                    <button onclick="closeModal('{{ $id }}')"
                        class="text-gray-400 hover:text-gray-600 transition-colors duration-200 p-2 hover:bg-gray-100 rounded-lg">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                @if($action)
                    <form method="post" action="{{ $action }}" {{ $attributes->merge(['id' => $id . 'Form']) }}>
                        @csrf
                        @if($method !== 'POST')
                            @method($method)
                        @endif
                        {{ $slot }}
                    </form>
                @else
                    {{ $slot }}
                @endif
            </div>
        </div>
    </div>
</div>