<x-app-layout>
    <style>
        /* Container for the entire page layout using GRID */
        .grid-container {
            display: grid;
            grid-template-columns: 1fr;
            grid-template-rows: auto 1fr;
            gap: 20px;
            padding: 20px;
        }

        /* Header Section (Grid item) */
        .header {
            grid-column: span 1;
        }

        /* Playlists Section (Grid item) */
        .playlists-container {
            grid-column: span 1;
            display: grid;
            gap: 20px;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        }

        /* Playlist Card */
        .playlist-card {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        /* Flexbox for the song list inside each playlist */
        .songs-list {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .song-item {
            background-color: #f0f0f0;
            padding: 10px;
            border-radius: 8px;
            flex: 1 1 30%; /* Flexbox layout for song items */
        }

        /* Button styling */
        .button {
            font-size: 17px;
            border-radius: 12px;
            background: linear-gradient(180deg, rgb(56, 56, 56) 0%, rgb(36, 36, 36) 66%, rgb(41, 41, 41) 100%);
            color: rgb(218, 218, 218);
            border: none;
            padding: 2px;
            font-weight: 700;
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }

        .button span {
            padding: 0.8em 1.3em;
            background-color: rgb(29, 29, 29);
        }

        .button-overlay {
            position: absolute;
            inset: 0;
            pointer-events: none;
            background: repeating-conic-gradient(rgb(48, 47, 47) 0.0000001%, rgb(51, 51, 51) 0.000104%) 60% 60%/600% 600%;
            filter: opacity(10%) contrast(105%);
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
                    </div>
                </div>

                <!-- Song List -->
            </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
