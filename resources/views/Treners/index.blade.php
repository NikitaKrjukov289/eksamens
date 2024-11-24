<x-app-layout>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            padding: 20px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            margin-bottom: 20px;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .header h1 {
            font-size: 2rem;
            font-weight: bold;
            color: #333;
        }

        .header .button {
            font-size: 1rem;
            padding: 10px 20px;
            background-color: #2563eb;
            color: #fff;
            border-radius: 8px;
            transition: background-color 0.2s ease;
            text-decoration: none;
        }

        .header .button:hover {
            background-color: #1d4ed8;
        }

        .search-form {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 10px 20px;
            max-width: 600px;
            margin: 0 auto;
        }

        .search-form input[type="text"] {
            width: 80%;
            padding: 10px;
            font-size: 1rem;
            border: 2px solid #ddd;
            border-radius: 8px;
            margin-right: 10px;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        .search-form input[type="text"]:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 5px rgba(59, 130, 246, 0.5);
            outline: none;
        }

        .search-form button {
            padding: 10px 20px;
            font-size: 1rem;
            background-color: #3b82f6;
            color: #fff;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .search-form button:hover {
            background-color: #2563eb;
        }

        .trainers-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            padding: 20px;
        }

        .trainer-card {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .trainer-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.15);
        }

        .trainer-card h2 {
            font-size: 1.5rem;
            color: #111827;
            margin-bottom: 10px;
        }

        .trainer-card p {
            font-size: 1rem;
            color: #374151;
            margin-bottom: 20px;
        }

        .trainer-card .buttons {
            display: flex;
            gap: 10px;
        }

        .trainer-card .button {
            padding: 10px 15px;
            border-radius: 8px;
            font-size: 0.9rem;
            text-align: center;
            color: #fff;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.2s ease, transform 0.2s ease;
        }

        .trainer-card .button:hover {
            transform: translateY(-2px);
        }

        .trainer-card .button.view {
            background-color: #3b82f6;
        }

        .trainer-card .button.view:hover {
            background-color: #2563eb;
        }

        .trainer-card .button.edit {
            background-color: #f59e0b;
        }

        .trainer-card .button.edit:hover {
            background-color: #d97706;
        }

        .trainer-card .button.delete {
            background-color: #ef4444;
        }

        .trainer-card .button.delete:hover {
            background-color: #dc2626;
        }

        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .pagination a {
            padding: 8px 16px;
            margin: 0 5px;
            background-color: #3b82f6;
            color: white;
            border-radius: 8px;
            text-decoration: none;
        }

        .pagination a:hover {
            background-color: #2563eb;
        }

        .pagination .disabled {
            background-color: #e5e7eb;
            color: #9ca3af;
        }
    </style>

   
    <div class="header">
        <h1>Treneri</h1>
        <a href="{{ route('treners.create') }}" class="button">Izveidot Treneri</a>
    </div>

  
    <div class="search-form">
        <form action="{{ route('treners.search') }}" method="GET" style="width: 100%;">
            <input type="text" name="query" placeholder="Ievadiet trenera vardu" value="{{ request('query') }}">
            <button type="submit">Meklet!</button>
        </form>
    </div>

    
    <div class="trainers-container">
        @foreach ($treneri as $treners)
        <div class="trainer-card">

            @if ($treners->image)
                <img src="{{ asset('storage/' . $treners->image) }}" alt="{{ $treners->name }}">
            @endif
            <h2>{{ $treners->name }}</h2>

            <div class="buttons">
                <a href="{{ route('treners.show', $treners->id) }}" class="button view">Skatīt</a>
                <a href="{{ route('treners.edit', $treners->id) }}" class="button edit">Rediģēt</a>
                <form action="{{ route('treners.destroy', $treners->id) }}" method="POST" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="button delete">Dzēst</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>

    
    <div class="pagination">
        {{ $treneri->links() }}
    </div>
</x-app-layout>
