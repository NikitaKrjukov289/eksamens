<x-app-layout>
    <style>
body {
    background-image: url('/image/background.jpeg');
    background-size: cover;
}
        .grid-container {
            display: grid;
            grid-template-columns: 1fr;
            grid-template-rows: auto 1fr;
            gap: 20px;
            padding: 20px;
            background-color: #f9fafb;
            font-family: 'Arial', sans-serif;
        }

        /* Header Section */
        .header {
            grid-column: span 1;
        }

        /* Playlists Section */
        .playlists-container {
            display: grid;
            gap: 24px;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        }

        /* Playlist Card */
        .playlist-card {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .playlist-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
        }

        /* Flexbox for Card Header */
        .flex {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .font-bold {
            font-weight: 700;
        }

        /* Tag Styling */
        .tag-container span {
            background-color: #e5e7eb;
            padding: 6px 12px;
            border-radius: 16px;
            font-size: 12px;
            color: #4b5563;
        }

        /* Button Styling */
        .button {
            display: inline-block;
            font-size: 14px;
            border-radius: 8px;
            background-color: #4f46e5;
            color: #ffffff;
            padding: 10px 20px;
            font-weight: 600;
            text-align: center;
            transition: background-color 0.2s, transform 0.2s;
        }

        .button:hover {
            background-color: #4338ca;
            transform: translateY(-2px);
        }

        .button-secondary {
            background-color: #facc15;
            color: #1f2937;
        }

        .button-secondary:hover {
            background-color: #eab308;
        }

        .button-danger {
            background-color: #ef4444;
        }

        .button-danger:hover {
            background-color: #dc2626;
        }

    
    </style>

    <div class="grid-container">
        <!-- Header with Create Playlist Button -->
        <div class="header flex justify-end mb-4">
            <a href="{{ route('trenins.create') }}" class="button">
                <div class="button-overlay"></div>
                <span>Izveidot treninu</span>
            </a>
        </div>

        <!-- Playlists Container -->
        <div class="playlists-container">
            @foreach ($trenini as $trenins)
            <div class="playlist-card">
                <div class="flex justify-between">
                    <div>
                        <a href="{{ route('trenins.show', $trenins->id) }}" class="font-bold text-xl mb-2">
                            {{ $trenins->name }}
                        </a>
                        <div class="tag-container px-6 pt-4 pb-2">
                            <span class="inline-block shadow-lg bg-gray-400 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">{{ $trenins->description }}</span>
                        </div>
                        <div class="tag-container px-6 pt-4 pb-2">
                            <span class="inline-block shadow-lg bg-gray-400 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">{{ $trenins->address }}</span>
                        </div>
                    </div>
                    <div>
                        <a href="{{ route('trenins.show', $trenins->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            View
                        </a>
                        <a href="{{ route('trenins.edit', $trenins->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                            Edit
                        </a>
                        <form action="{{ route('trenins.destroy', $trenins->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                Delete
                            </button>
                        </form>

                        <form action="{{ route('trenins.addToMyWorkouts', $trenins->id) }}" method="POST">
        @csrf
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Pievienot manam treninam
        </button>
    </form>
</div>
                    </div>
                </div>

                
            </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
