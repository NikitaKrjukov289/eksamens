<x-app-layout>
    <div class="container mx-auto max-w-lg mt-10 p-6 bg-white shadow-md rounded-lg">
        <h1 class="text-2xl font-bold mb-6 text-center">Izveidot Treneri</h1>
        <form action="{{ route('treners.store') }}" method="POST" class="space-y-4" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="tag" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" id="tag" name="name" required>
            </div>

            <div class="form-group">
                <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
                <input type="file" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" id="image" name="image" accept="image/*">
            </div>

            <button type="submit" class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                Izveidot
            </button>
        </form>
    </div>
</x-app-layout>
