<x-app-layout>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: url('/images/fitness-bg.jpg') no-repeat center center fixed;
            background-size: cover;
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

        .trainings-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            padding: 20px;
        }

        .training-card {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .training-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.15);
        }

        .training-card h2 {
            font-size: 1.5rem;
            color: #111827;
            margin-bottom: 10px;
        }

        .training-card p {
            font-size: 1rem;
            color: #374151;
            margin-bottom: 20px;
        }

        .training-card .buttons {
            display: flex;
            gap: 10px;
        }

        .training-card .button {
            padding: 10px 15px;
            border-radius: 8px;
            font-size: 0.9rem;
            text-align: center;
            color: #fff;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.2s ease, transform 0.2s ease;
        }

        .training-card .button:hover {
            transform: translateY(-2px);
        }

        .training-card .button.view {
            background-color: #3b82f6;
        }

        .training-card .button.view:hover {
            background-color: #2563eb;
        }

        .training-card .button.edit {
            background-color: #f59e0b;
        }

        .training-card .button.edit:hover {
            background-color: #d97706;
        }

        .training-card .button.delete {
            background-color: #ef4444;
        }

        .training-card .button.delete:hover {
            background-color: #dc2626;
        }

        .training-card .button.add {
            background-color: #10b981;
        }

        .training-card .button.add:hover {
            background-color: #059669;
        }
    </style>

    <!-- Header -->
    <div class="header">
        <h1>Pieejami Trenini</h1>
        <a href="{{ route('trenins.create') }}" class="button">Izveidot Treniņu</a>
    </div>

    <!-- Trainings -->
    <div class="trainings-container">
        @foreach ($trenini as $trenins)
        <div class="training-card">
            <h2>{{ $trenins->name }}</h2>
            <p><strong>Apraksts:</strong> {{ $trenins->description }}</p>
            <p><strong>Adrese:</strong> {{ $trenins->address }}</p>
            <div class="buttons">
                <a href="{{ route('trenins.show', $trenins->id) }}" class="button view">Skatīt</a>
                <a href="{{ route('trenins.edit', $trenins->id) }}" class="button edit">Rediģēt</a>
                <form action="{{ route('trenins.destroy', $trenins->id) }}" method="POST" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="button delete">Dzēst</button>
                </form>
                <form action="{{ route('trenins.addToMyWorkouts', $trenins->id) }}" method="POST" style="display: inline-block;">
                    @csrf
                    <button type="submit" class="button add">Pievienot manam treniņam</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</x-app-layout>
