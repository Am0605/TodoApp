<!-- filepath: c:\Users\Amran\Herd\TodoApp\resources\views\components\search-actions.blade.php -->
<div class="bg-white rounded-2xl shadow-lg p-6 mb-8 animate-slide-up relative overflow-hidden">
    <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-primary via-secondary to-pink-500"></div>

    <div class="flex flex-col lg:flex-row gap-6 items-center justify-between">
        <!-- Search Bar -->
        <div class="relative flex-1 max-w-md w-full">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
            <input type="text" id="search" placeholder="Search your todos..."
                class="block w-full pl-10 pr-10 py-3 border border-gray-300 rounded-xl bg-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all duration-200 shadow-sm">
            <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                <div id="searchLoader" class="hidden">
                    <div class="animate-spin h-4 w-4 border-2 border-primary border-t-transparent rounded-full"></div>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="flex gap-3 w-full lg:w-auto">
            <button onclick="openModal('todoInsertModal')"
                class="flex-1 lg:flex-none bg-gradient-to-r from-primary to-secondary hover:from-indigo-700 hover:to-purple-700 text-white px-6 py-3 rounded-xl font-medium transition-all duration-200 shadow-md hover:shadow-lg transform hover:scale-105 flex items-center justify-center gap-2">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                Add Todo
            </button>

            <form action="{{ url('deleteMultiple') }}" method="POST" class="flex-1 lg:flex-none">
                @csrf
                @method('DELETE')
                <button type="submit" id="deleteSelectedButton" disabled
                    class="w-full bg-gradient-to-r from-danger to-red-600 hover:from-red-600 hover:to-red-700 text-white px-6 py-3 rounded-xl font-medium transition-all duration-200 shadow-md hover:shadow-lg disabled:opacity-50 disabled:cursor-not-allowed flex items-center justify-center gap-2">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                    <span class="hidden sm:inline">Delete Selected</span>
                    <span class="sm:hidden">Delete</span>
                </button>
            </form>
        </div>
    </div>
</div>