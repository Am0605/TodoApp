<!-- filepath: c:\Users\Amran\Herd\TodoApp\resources\views\displayTodo.blade.php -->
@extends('layouts.app')

@section('title', 'Todo Manager - Organize Your Tasks')

@section('content')
    <div class="container mx-auto px-4 py-8 max-w-7xl">
        <!-- Header Component -->
        @include('components.header')

        <!-- Alert Messages -->
        @if (session('success'))
            <x-alert type="success" :message="session('success')" />
        @endif

        @if (session('error'))
            <x-alert type="error" :message="session('error')" />
        @endif

        <!-- Search and Actions Component -->
        @include('components.search-actions')

        <!-- Todo Table Component -->
        <x-todo-table :todos="$data" />

        <!-- Statistics Card -->
        <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-6">
            <div
                class="bg-white rounded-xl shadow-lg p-6 border-l-4 border-blue-500 transform hover:scale-105 transition-all duration-200">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="w-8 h-8 bg-blue-500 rounded-lg flex items-center justify-center">
                            <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                            </svg>
                        </div>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 truncate">Total Tasks</dt>
                            <dd class="text-3xl font-semibold text-gray-900">{{ $data->total() }}</dd>
                        </dl>
                    </div>
                </div>
            </div>

            <div
                class="bg-white rounded-xl shadow-lg p-6 border-l-4 border-green-500 transform hover:scale-105 transition-all duration-200">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="w-8 h-8 bg-green-500 rounded-lg flex items-center justify-center">
                            <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 truncate">Current Task in Page</dt>
                            <dd class="text-3xl font-semibold text-gray-900">{{ $data->count() }}</dd>
                        </dl>
                    </div>
                </div>
            </div>

            <div
                class="bg-white rounded-xl shadow-lg p-6 border-l-4 border-purple-500 transform hover:scale-105 transition-all duration-200">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="w-8 h-8 bg-purple-500 rounded-lg flex items-center justify-center">
                            <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                            </svg>
                        </div>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 truncate">Total Pages</dt>
                            <dd class="text-3xl font-semibold text-gray-900">{{ $data->lastPage() }}</dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Insert Modal -->
    <x-modal id="todoInsertModal" title="Add New Todo" :action="url('insert')">
        <div class="space-y-6">
            <div>
                <label for="insertSubject" class="block text-sm font-medium text-gray-700 mb-2">
                    <span class="flex items-center gap-2">
                        <svg class="h-4 w-4 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                        </svg>
                        Subject
                    </span>
                </label>
                <input type="text" name="subject" id="insertSubject" required placeholder="Enter todo subject..."
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all duration-200 placeholder-gray-400">
            </div>
            <div>
                <label for="insertDescription" class="block text-sm font-medium text-gray-700 mb-2">
                    <span class="flex items-center gap-2">
                        <svg class="h-4 w-4 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        Description
                    </span>
                </label>
                <textarea name="description" id="insertDescription" required rows="4"
                    placeholder="Describe your todo in detail..."
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all duration-200 placeholder-gray-400 resize-none"></textarea>
            </div>
            <div class="flex gap-3 justify-end pt-4 border-t border-gray-200">
                <button type="button" onclick="closeModal('todoInsertModal')"
                    class="px-6 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400 transition-colors duration-200 font-medium">
                    Cancel
                </button>
                <button type="submit"
                    class="px-6 py-2 bg-gradient-to-r from-primary to-secondary text-white rounded-lg hover:from-indigo-700 hover:to-purple-700 transition-all duration-200 shadow-md hover:shadow-lg font-medium">
                    <span class="flex items-center gap-2">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        Add Todo
                    </span>
                </button>
            </div>
        </div>
    </x-modal>

    <!-- Update Modal -->
    <x-modal id="todoUpdateModal" title="Update Todo" :action="url('update')" id="updateForm">
        <div class="space-y-6">
            <div>
                <label for="updateSubject" class="block text-sm font-medium text-gray-700 mb-2">
                    <span class="flex items-center gap-2">
                        <svg class="h-4 w-4 text-warning" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                        </svg>
                        Subject
                    </span>
                </label>
                <input type="text" name="subject" id="updateSubject" required
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-warning focus:border-transparent transition-all duration-200">
            </div>
            <div>
                <label for="updateDescription" class="block text-sm font-medium text-gray-700 mb-2">
                    <span class="flex items-center gap-2">
                        <svg class="h-4 w-4 text-warning" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        Description
                    </span>
                </label>
                <textarea name="description" id="updateDescription" required rows="4"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-warning focus:border-transparent transition-all duration-200 resize-none"></textarea>
            </div>
            <div class="flex gap-3 justify-end pt-4 border-t border-gray-200">
                <button type="button" onclick="closeModal('todoUpdateModal')"
                    class="px-6 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400 transition-colors duration-200 font-medium">
                    Cancel
                </button>
                <button type="submit"
                    class="px-6 py-2 bg-gradient-to-r from-warning to-yellow-500 text-white rounded-lg hover:from-yellow-500 hover:to-yellow-600 transition-all duration-200 shadow-md hover:shadow-lg font-medium">
                    <span class="flex items-center gap-2">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                        Update Todo
                    </span>
                </button>
            </div>
        </div>
    </x-modal>
@endsection

@push('scripts')
    <script>
        $(document).ready(function () {
            // Select All functionality
            $('#selectAll').on('change', function () {
                $('.todo-checkbox').prop('checked', $(this).is(':checked'));
                updateDeleteButton();
            });

            // Individual checkbox change
            $(document).on('change', '.todo-checkbox', function () {
                updateDeleteButton();

                let totalCheckboxes = $('.todo-checkbox').length;
                let checkedCheckboxes = $('.todo-checkbox:checked').length;
                $('#selectAll').prop('checked', totalCheckboxes === checkedCheckboxes);
            });

            // Update delete button state
            function updateDeleteButton() {
                let selectedTodos = $('.todo-checkbox:checked').length;
                $('#deleteSelectedButton').prop('disabled', selectedTodos === 0);

                // Update button text with count
                if (selectedTodos > 0) {
                    $('#deleteSelectedButton span').text(`Delete Selected (${selectedTodos})`);
                } else {
                    $('#deleteSelectedButton span').text('Delete Selected');
                }
            }

            // Enhanced Search with loading
            let debounceTimer;
            $('#search').on('input', function () {
                clearTimeout(debounceTimer);
                $('#searchLoader').removeClass('hidden');

                debounceTimer = setTimeout(() => {
                    let searchQuery = $(this).val();
                    $.ajax({
                        url: '/search',
                        method: 'GET',
                        data: { search: searchQuery },
                        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                        success: function (response) {
                            $('#todoTableBody').html(response);
                            updateDeleteButton();
                            $('#searchLoader').addClass('hidden');
                        },
                        error: function (xhr, status, error) {
                            console.error('AJAX Error: ' + status + ' ' + error);
                            $('#searchLoader').addClass('hidden');

                            // Show error message
                            showNotification('Search failed. Please try again.', 'error');
                        }
                    });
                }, 300);
            });

            // Form validation
            $('form').on('submit', function (e) {
                const subject = $(this).find('input[name="subject"]').val();
                const description = $(this).find('textarea[name="description"]').val();

                if (!subject.trim() || !description.trim()) {
                    e.preventDefault();
                    showNotification('Please fill in all fields.', 'error');
                    return false;
                }
            });
        });

        // Enhanced Modal functions
        function openModal(modalId) {
            const modal = document.getElementById(modalId);
            modal.classList.remove('hidden');

            // Focus on first input
            setTimeout(() => {
                const firstInput = modal.querySelector('input, textarea');
                if (firstInput) firstInput.focus();
            }, 100);
        }

        function closeModal(modalId) {
            const modal = document.getElementById(modalId);
            modal.classList.add('hidden');

            // Clear form
            const form = modal.querySelector('form');
            if (form) form.reset();
        }

        function openUpdateModal(id, subject, description) {
            document.getElementById('updateSubject').value = subject;
            document.getElementById('updateDescription').value = description;
            document.getElementById('updateForm').action = '/update/' + id;
            openModal('todoUpdateModal');
        }

        // Close modal when clicking outside
        window.onclick = function (event) {
            if (event.target.classList.contains('fixed')) {
                event.target.classList.add('hidden');
            }
        }

        // Notification function
        function showNotification(message, type = 'success') {
            const notification = document.createElement('div');
            notification.className = `fixed top-4 right-4 z-50 p-4 rounded-lg shadow-lg transition-all duration-300 ${type === 'success' ? 'bg-green-500 text-white' : 'bg-red-500 text-white'
                }`;
            notification.textContent = message;

            document.body.appendChild(notification);

            setTimeout(() => {
                notification.remove();
            }, 3000);
        }

        // Keyboard shortcuts
        document.addEventListener('keydown', function (e) {
            // Ctrl + N for new todo
            if (e.ctrlKey && e.key === 'n') {
                e.preventDefault();
                openModal('todoInsertModal');
            }

            // Escape to close modals
            if (e.key === 'Escape') {
                const openModal = document.querySelector('.fixed:not(.hidden)');
                if (openModal) {
                    openModal.classList.add('hidden');
                }
            }
        });
    </script>
@endpush