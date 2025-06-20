<!-- filepath: c:\Users\Amran\Herd\TodoApp\resources\views\components\todo-row.blade.php -->
@props(['todo'])

<tr class="hover:bg-gradient-to-r hover:from-blue-50 hover:to-indigo-50 transition-all duration-200 group">
    <td class="px-6 py-4 whitespace-nowrap">
        <input type="checkbox"
            class="todo-checkbox h-4 w-4 text-primary focus:ring-primary border-gray-300 rounded transition-all duration-200"
            name="ids[]" value="{{ $todo->id }}">
    </td>
    <td class="px-6 py-4">
        <div class="flex items-center">
            <div class="flex-shrink-0 h-10 w-10">
                <div
                    class="h-10 w-10 rounded-lg bg-gradient-to-br from-primary to-secondary flex items-center justify-center">
                    <span class="text-white font-bold text-sm">{{ strtoupper(substr($todo->subject, 0, 2)) }}</span>
                </div>
            </div>
            <div class="ml-4">
                <div class="text-sm font-medium text-gray-900 group-hover:text-primary transition-colors duration-200">
                    {{ $todo->subject }}
                </div>
                <div class="text-xs text-gray-500">
                    Created {{ $todo->created_at->diffForHumans() }}
                </div>
            </div>
        </div>
    </td>
    <td class="px-6 py-4">
        <div class="text-sm text-gray-700 max-w-xs">
            <p class="line-clamp-2">{{ $todo->description }}</p>
        </div>
    </td>
    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
        <div class="flex gap-2">
            <button
                onclick="openUpdateModal({{ $todo->id }}, '{{ addslashes($todo->subject) }}', '{{ addslashes($todo->description) }}')"
                class="group bg-gradient-to-r from-warning to-yellow-500 hover:from-yellow-500 hover:to-yellow-600 text-white px-3 py-2 rounded-lg transition-all duration-200 flex items-center gap-1 shadow-sm hover:shadow-md transform hover:scale-105">
                <svg class="h-4 w-4 group-hover:rotate-12 transition-transform duration-200" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>
                <span class="hidden sm:inline">Edit</span>
            </button>

            <form method="POST" action="{{ url('delete/' . $todo->id) }}" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Are you sure you want to delete this todo?')"
                    class="group bg-gradient-to-r from-danger to-red-600 hover:from-red-600 hover:to-red-700 text-white px-3 py-2 rounded-lg transition-all duration-200 flex items-center gap-1 shadow-sm hover:shadow-md transform hover:scale-105">
                    <svg class="h-4 w-4 group-hover:scale-110 transition-transform duration-200" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                    <span class="hidden sm:inline">Delete</span>
                </button>
            </form>
        </div>
    </td>
</tr>