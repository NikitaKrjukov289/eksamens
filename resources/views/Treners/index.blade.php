<x-app-layout>
    <style>
        body {
            font-family: 'Arial', sans-serif;
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
    </style>

    <!-- Header -->
    <div class="header">
        <h1>Treneri</h1>
        <a href="{{ route('treners.create') }}" class="button">Izveidot Treneri</a>
    </div>

    <!-- Trainers -->
    <div class="trainers-container">
        @foreach ($treneri as $treners)
        <div class="trainer-card">
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
</x-app-layout>
