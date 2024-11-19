<x-app-layout>
    <style>
         .button {
            font-size: 16px;
            border-radius: 8px;
            background-color: #4f46e5;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .button:hover {
            background-color: #357ABD;
            transform: translateY(-2px);
        }

        .button:active {
            background-color: #2B5C94;
            transform: translateY(0);
        }

        .card {
            background-color: #f9f9f9;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 16px;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .card:hover {
            transform: translateY(-4px);
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.15);
        }

        .card-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: #333;
            margin-bottom: 8px;
        }

        .card-actions {
            display: flex;
            gap: 8px;
        }

        .action-button {
            padding: 8px 16px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            color: #fff;
            transition: background-color 0.3s ease;
        }

        .view-button {
            background-color: #4CAF50;
        }

        .view-button:hover {
            background-color: #388E3C;
        }

        .edit-button {
            background-color: #FFC107;
        }

        .edit-button:hover {
            background-color: #FFA000;
        }

        .delete-button {
            background-color: #F44336;
        }

        .delete-button:hover {
            background-color: #D32F2F;
        }
        
    </style>

    <div class="flex justify-end mb-4">
        <a href="{{ route('treners.create') }}" class="button">
            <div class="button-overlay"></div>
            <span>Izveidot treneri<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                <path d="M12 2a10 10 0 100 20 10 10 0 000-20zm0 2.5c1.05 0 2.05.27 2.94.74l-2.94 3.95-2.94-3.95A7.5 7.5 0 0112 4.5zM4.5 12c0-1.05.27-2.05.74-2.94l3.95 2.94-3.95 2.94A7.48 7.48 0 014.5 12zm7.5 7.5a7.48 7.48 0 01-2.94-.74l2.94-3.95 2.94 3.95c-.9.47-1.9.74-2.94.74zm4.71-3.62l-3.95-2.94 3.95-2.94a7.5 7.5 0 010 5.88z" />
            </svg></span>
        </a>
    </div>
    <div class="gap-6">
        @foreach ($treneri as $treners)
        <div class="w-full rounded overflow-hidden shadow-lg p-4 bg-white mb-4">
            <div class="flex justify-between">
                <div>       
                    <a class=" hover:drop-shadow transform hover:bg-gray-100 font-bold text-xl mb-2" href="{{ route('treners.show', $treners->id) }}">
                        {{ $treners->name }}
                    </a>     
                </div>
                <div>
                    <a href="{{ route('treners.show', $treners->id) }}" class="bg-blue-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded mr-2">
                        View
                    </a>
                    <a href="{{ route('treners.edit', $treners->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded mr-2">
                        Edit
                    </a>
                    <form action="{{ route('treners.destroy', $treners->id) }}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</x-app-layout>
