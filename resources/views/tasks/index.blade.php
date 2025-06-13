<x-app-layout>
    <x-slot name="header">Your Tasks</x-slot>

    <a href="{{ route('tasks.create') }}" class="btn btn-primary mb-3">+ Create Task</a>

    @foreach ($tasks as $task)
        <div class="card mb-3">
            <div class="card-body">
                <h5>{{ $task->title }}</h5>
                <p>{{ $task->description }}</p>
                @if($task->image)
                    <img src="{{ asset('storage/'.$task->image) }}" width="100">
                @endif
                <p><strong>Due:</strong> {{ $task->due_date }}</p>
                <p><strong>Status:</strong> {{ $task->is_completed ? 'Completed' : 'Pending' }}</p>
                <a href="{{ route('tasks.edit', $task) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('tasks.destroy', $task) }}" method="POST" style="display:inline-block;">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this task?')">Delete</button>
                </form>
            </div>
        </div>
    @endforeach
</x-app-layout>
