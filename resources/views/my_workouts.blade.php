<x-app-layout>

<h1>Mani trenini</h1>

@foreach ($user->trenini as $trenins)
<div class="tren">
    <h2>{{ $trenins->name }}</h2>
    <p>{{ $trenins->description }}</p>
    <p>{{ $trenins->address }}</p>

    <form action="{{ route('trenins.addComment', $trenins->id) }}" method="POST">
        @csrf
        <textarea name="comment" placeholder="Jusu komentars" rows="4" cols="50"></textarea>
        <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
            Pievienot komentaru
        </button>
    </form>
</div>
@endforeach
</x-app-layout>
