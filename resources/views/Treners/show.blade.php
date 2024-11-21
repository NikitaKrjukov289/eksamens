<x-app-layout>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: url('/images/fitness-bg.jpg') no-repeat center center fixed;
            background-size: cover;
        }

        .trainer-details {
            max-width: 800px;
            margin: 50px auto;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .trainer-details h1 {
            font-size: 2rem;
            color: #111827;
            margin-bottom: 20px;
        }

        .trainer-details p {
            font-size: 1rem;
            color: #374151;
            margin-bottom: 15px;
        }

        .training-list {
            margin-top: 20px;
        }

        .training-list h2 {
            font-size: 1.5rem;
            color: #111827;
            margin-bottom: 10px;
        }

        .training-list ul {
            list-style: none;
            padding: 0;
        }

        .training-list li {
            font-size: 1rem;
            color: #374151;
            margin-bottom: 10px;
        }

        .back-link {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 15px;
            background-color: #2563eb;
            color: #fff;
            text-decoration: none;
            border-radius: 8px;
            transition: background-color 0.2s ease;
        }

        .back-link:hover {
            background-color: #1d4ed8;
        }
    </style>

    <div class="trainer-details">
        <h1>{{ $trener->name }}</h1>
        <p><strong>Par treneri:</strong> {{ $trener->bio }}</p>
        <p><strong>Kontakti:</strong> {{ $trener->contact }}</p>

        @if ($trener->trenins->count())
            <div class="training-list">
                <h2>Treniņi:</h2>
                <ul>
                    @foreach ($trener->trenins as $trenins)
                        <li>{{ $trenins->name }} - <a href="{{ route('trenins.show', $trenins->id) }}">Skatīt</a></li>
                    @endforeach
                </ul>
            </div>
        @else
            <p>Šim trenerim pašlaik nav treniņu.</p>
        @endif

        <a href="{{ route('treners.index') }}" class="back-link">Atpakaļ uz treneru sarakstu</a>
    </div>
</x-app-layout>
