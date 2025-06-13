<x-app-layout>
    <x-slot name="header">Create Task</x-slot>

    <form method="POST" action="{{ route('tasks.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
            <label class="block text-gray-700">Title</label>
            <input type="text" name="title" value="{{ old('title') }}" required class="w-full border px-3 py-2">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Description</label>
            <textarea name="description" class="w-full border px-3 py-2">{{ old('description') }}</textarea>
        </div>

        <div class="mb-4">
            <label class="block text-gray-00">Due Date</label>
            <input type="date" name="due_date" value="{{ old('due_date') }}" class="w-full border px-3 py-2">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Image</label>
            <input type="file" name="image" class="w-full border px-3 py-2">
        </div>

        <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-red-600 font-bold py-2 px-4 rounded">Create Task</button>
    </form>
</x-app-layout>
