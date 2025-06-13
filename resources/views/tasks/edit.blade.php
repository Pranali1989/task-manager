<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Task
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                @if ($errors->any())
                    <div class="mb-4">
                        <ul class="list-disc list-inside text-sm text-red-600">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('tasks.update', $task) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Title</label>
                        <input type="text" name="title" value="{{ old('title', $task->title) }}" required
                               class="w-full border-gray-300 rounded-md shadow-sm">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Description</label>
                        <textarea name="description" rows="4"
                                  class="w-full border-gray-300 rounded-md shadow-sm">{{ old('description', $task->description) }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Due Date</label>
                        <input type="date" name="due_date" value="{{ old('due_date', $task->due_date) }}"
                               class="w-full border-gray-300 rounded-md shadow-sm">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Image</label>
                        <input type="file" name="image" class="w-full border-gray-300 rounded-md shadow-sm">
                        @if($task->image)
                            <img src="{{ asset('storage/' . $task->image) }}" width="100" class="mt-2">
                        @endif
                    </div>

                    <div class="mb-4">
                        <label class="inline-flex items-center">
                            <input type="checkbox" name="is_completed" value="1"
                                   {{ $task->is_completed ? 'checked' : '' }}>
                            <span class="ml-2">Completed</span>
                        </label>
                    </div>

                    <div>
                        <button type="submit"
                                class="bg-indigo-600 hover:bg-indigo-700 text-red-600 font-bold py-2 px-4 rounded">
                            Update Task
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
