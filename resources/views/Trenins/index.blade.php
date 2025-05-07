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

        .training-card .button.like {
            background-color:  #065f46;
        }

        .training-card .button.like:hover {
            background-color:  #065f46;
        }
        .training-card .button.dislike {
            background-color: #ef4444;
        }

        .training-card .button.dislike:hover {
            background-color: #ef4444;
        }
    </style>

    
    <div class="header">
        <h1>Pieejami Trenini</h1>
        @can('create', \App\Models\Trenins::class)
         <a href="{{ route('trenins.create') }}" class="button">Izveidot Treniņu</a>
         @endcan
    </div>

    <!-- Trainings -->
    <div class="trainings-container">
        @foreach ($trenini as $trenins)
        <div class="training-card">
            <h2>{{ $trenins->name }}</h2>
            <p><strong>Apraksts:</strong> {{ $trenins->description }}</p>
            <p><strong>Adrese:</strong> {{ $trenins->address }}</p>
            <p><strong>Treners:</strong> {{ $trenins->treners ? $trenins->treners->name : 'Nav izvelets' }}</p>
            <!-- Ja nosacījums ir pirms ? atgriež true, tad tiek izpildīts kods pēc ?, pirms kola :.
Ja nosacījums atgriež vērtību false, tiek izpildīts kods pēc kola :. -->
            @can('update', $trenins)
            <form action="{{ route('trenins.addTreners', $trenins->id) }}" method="POST">
                @csrf
                @method('PUT')
                <label for="treners">Izveleties treneri:</label>
                <select name="treners_id" id="treners">
                    <option value="">-- Treners nav izvelets --</option>
                    @foreach ($treneri as $treners)
                    <option value="{{ $treners->id }}" @if($trenins->treners && $trenins->treners->id == $treners->id) selected @endif> 
                            {{ $treners->name }}
                        </option>
                    @endforeach
                </select>
                <button type="submit">Saglabāt</button>
            </form>
            @endcan



            <div class="buttons">
            <a href="{{ route('trenins.show', $trenins->id) }}" class="button view">Skatīt</a>
            @can('update', $trenins)
                <a href="{{ route('trenins.edit', $trenins->id) }}" class="button edit">Rediģēt</a>
                @endcan
           

                @can('delete', $trenins)
                <form action="{{ route('trenins.destroy', $trenins->id) }}" method="POST" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="button delete">Dzēst</button>
                </form>
                @endcan

                
                <form action="{{ route('trenins.toggleFavorite', $trenins->id) }}" method="POST">
            @csrf
            @if(auth()->user()->favoriteTrenins->contains($trenins))
                <button type="submit" class="button dislike">Izdzest no maniem treniniem</button>
            @else
                <button type="submit" class="button like">Pievienot maniem treniniem</button>
            @endif
        </form>


                
            </div>
        </div>
        @endforeach
    </div>
</x-app-layout>




