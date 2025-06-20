import './bootstrap';

let todos = JSON.parse(localStorage.getItem('todos')) || [];
let currentFilter = 'all';

function saveTodos() {
    localStorage.setItem('todos', JSON.stringify(todos));
}

function addTodo() {
    const input = document.getElementById('todoInput');
    const text = input.value.trim();
    
    if (text === '') {
        // Add shake animation for empty input
        input.classList.add('border-red-400', 'bg-red-50');
        setTimeout(() => {
            input.classList.remove('border-red-400', 'bg-red-50');
        }, 1000);
        return;
    }
    
    const todo = {
        id: Date.now(),
        text: text,
        completed: false,
        createdAt: new Date().toLocaleDateString()
    };
    
    todos.unshift(todo);
    input.value = '';
    saveTodos();
    renderTodos();
    updateStats();
}

function deleteTodo(id) {
    todos = todos.filter(todo => todo.id !== id);
    saveTodos();
    renderTodos();
    updateStats();
}

function toggleTodo(id) {
    const todo = todos.find(todo => todo.id === id);
    if (todo) {
        todo.completed = !todo.completed;
        saveTodos();
        renderTodos();
        updateStats();
    }
}

function editTodo(id) {
    const todo = todos.find(todo => todo.id === id);
    if (todo) {
        const newText = prompt('Edit todo:', todo.text);
        if (newText !== null && newText.trim() !== '') {
            todo.text = newText.trim();
            saveTodos();
            renderTodos();
        }
    }
}

function filterTodos(filter) {
    currentFilter = filter;
    renderTodos();
    
    // Update active filter button
    document.querySelectorAll('.filter-btn').forEach(btn => {
        btn.classList.remove('bg-primary', 'text-white');
        btn.classList.add('bg-gray-100', 'text-gray-700');
    });
    
    const activeBtn = event.target;
    activeBtn.classList.remove('bg-gray-100', 'text-gray-700');
    activeBtn.classList.add('bg-primary', 'text-white');
}

function getFilteredTodos() {
    switch (currentFilter) {
        case 'active':
            return todos.filter(todo => !todo.completed);
        case 'completed':
            return todos.filter(todo => todo.completed);
        default:
            return todos;
    }
}

function renderTodos() {
    const todoList = document.getElementById('todoList');
    const emptyState = document.getElementById('emptyState');
    const filteredTodos = getFilteredTodos();
    
    if (filteredTodos.length === 0) {
        todoList.innerHTML = '';
        emptyState.classList.remove('hidden');
        return;
    }
    
    emptyState.classList.add('hidden');
    
    todoList.innerHTML = filteredTodos.map(todo => `
        <li class="p-4 hover:bg-gray-50 transition-colors duration-200">
            <div class="flex items-center gap-4">
                <input 
                    type="checkbox" 
                    ${todo.completed ? 'checked' : ''} 
                    onchange="toggleTodo(${todo.id})"
                    class="w-5 h-5 text-primary rounded focus:ring-primary focus:ring-2"
                >
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-medium ${todo.completed ? 'line-through text-gray-500' : 'text-gray-900'}">
                        ${todo.text}
                    </p>
                    <p class="text-xs text-gray-500 mt-1">Created: ${todo.createdAt}</p>
                </div>
                <div class="flex gap-2">
                    <button 
                        onclick="editTodo(${todo.id})" 
                        class="text-blue-600 hover:text-blue-800 p-2 rounded-lg hover:bg-blue-50 transition-colors duration-200"
                        title="Edit"
                    >
                        ✏️
                    </button>
                    <button 
                        onclick="deleteTodo(${todo.id})" 
                        class="text-red-600 hover:text-red-800 p-2 rounded-lg hover:bg-red-50 transition-colors duration-200"
                        title="Delete"
                    >
                        🗑️
                    </button>
                </div>
            </div>
        </li>
    `).join('');
}

function updateStats() {
    const totalTasks = document.getElementById('totalTasks');
    const completedTasks = document.getElementById('completedTasks');
    
    const total = todos.length;
    const completed = todos.filter(todo => todo.completed).length;
    
    totalTasks.textContent = `${total} task${total !== 1 ? 's' : ''} total`;
    completedTasks.textContent = `${completed} completed`;
}

// Allow adding todos with Enter key
document.getElementById('todoInput').addEventListener('keypress', function(e) {
    if (e.key === 'Enter') {
        addTodo();
    }
});

// Initialize the app
document.addEventListener('DOMContentLoaded', function() {
    renderTodos();
    updateStats();
});