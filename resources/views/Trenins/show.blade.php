<x-app-layout>
    <style>
        /* Button styles */
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
            border-radius: 10px;
            padding: 0.8em 1.3em;
            padding-right: 1.2em;
            text-shadow: 0px 0px 20px #4b4b4b;
            width: 100%;
            display: flex;
            align-items: center;
            gap: 12px;
            color: inherit;
            transition: all 0.3s;
            background-color: rgb(29, 29, 29);
            background-image: radial-gradient(at 95% 89%, rgb(15, 15, 15) 0px, transparent 50%), radial-gradient(at 0% 100%, rgb(17, 17, 17) 0px, transparent 50%), radial-gradient(at 0% 0%, rgb(29, 29, 29) 0px, transparent 50%);
        }

        .button:hover span {
            background-color: rgb(26, 25, 25);
        }

        .button-overlay {
            position: absolute;
            inset: 0;
            pointer-events: none;
            background: repeating-conic-gradient(rgb(48, 47, 47) 0.0000001%, rgb(51, 51, 51) 0.000104%) 60% 60%/600% 600%;
            filter: opacity(10%) contrast(105%);
            -webkit-filter: opacity(10%) contrast(105%);
        }

        .button svg {
            width: 15px;
            height: 15px;
        }
    </style>

    <!-- Create Playlist Button -->
    <div class="flex justify-end mb-4">
        <a href="{{ route('trenins.create') }}" class="button">
            <div class="button-overlay"></div>
            <span>Create Trenins <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 53 58" height="58" width="53">
                <path stroke-width="9" stroke="currentColor" d="M44.25 36.3612L17.25 51.9497C11.5833 55.2213 4.5 51.1318 4.50001 44.5885L4.50001 13.4115C4.50001 6.86824 11.5833 2.77868 17.25 6.05033L44.25 21.6388C49.9167 24.9104 49.9167 33.0896 44.25 36.3612Z"></path>
            </svg></span>
        </a>
    </div>

    <!-- Playlists Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach ($trenini as $trenins)
        <div class="w-full rounded overflow-hidden shadow-lg p-4 bg-white mb-4">
            <div class="flex justify-between">
                <div>
                    <a class="font-bold text-xl mb-2" href="{{ route('trenins.show', $trenins->id) }}">
                        {{ $trenins->name }}
                    </a>
                    <div class="px-6 pt-4 pb-2">
                        <span class="inline-block shadow-lg bg-gray-400 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">{{ $trenins->name }}</span>
                    </div>
                </div>
                <div>
                    <a href="{{ route('trenins.edit', $trenins->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded mr-2">
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

            <!-- Songs List with Flexbox -->
            <div class="px-6 pt-4 pb-2">
                <h1>Treneri</h1>
                <div class="flex flex-col">
                    @foreach($trenins->treneri as $treners)
                    <div class="flex justify-between items-center border-b py-2">
                        <div class="text-lg">
                            {{ $treners->name }} 
                        </div>
                        <form action="{{ route('trenins.removetreners', $trenins->id) }}" method="POST" class="inline-block">
                            @csrf
                            <input type="hidden" name="treners" value="{{ $treners->id }}">
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                Remove
                            </button>
                        </form>
                    </div>
                    @endforeach
                </div>

                <!-- Add Song Form -->
                <form action="{{ route('trenins.addstreners', $trenins->id) }}" method="POST" class="inline-block">
                    @csrf
                    <div class="flex items-center space-x-4 mt-4">
                        <label for="treners">Choose a treners:</label>
                        <select name="treners" id="treners" class="border rounded py-2 px-3">
                            @foreach($allTreneri as $treners)
                            <option value="{{ $treners->id }}">{{ $treners->name }}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Add
                        </button>
                    </div>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</x-app-layout>
