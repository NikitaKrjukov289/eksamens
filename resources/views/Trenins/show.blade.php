<x-app-layout>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: url('/images/fitness-bg.jpg') no-repeat center center fixed;
            background-size: cover;
        }

        .training-details {
            max-width: 800px;
            margin: 50px auto;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .training-details h1 {
            font-size: 2rem;
            color: #111827;
            margin-bottom: 20px;
        }

        .training-details p {
            font-size: 1rem;
            color: #374151;
            margin-bottom: 15px;
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

    <div class="training-details">
        <h1>{{ $trenins->name }}</h1>
        <p><strong>Apraksts:</strong> {{ $trenins->description }}</p>
        <p><strong>Adrese:</strong> {{ $trenins->address }}</p>

        @if ($trenins->treners)
            <p><strong>Treneris:</strong> {{ $trenins->treners->name }}</p>
        @endif

        <a href="{{ route('trenins.index') }}" class="back-link">Atpakaļ uz treniņu sarakstu</a>
    </div>
</x-app-layout>
