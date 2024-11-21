<x-app-layout>
    <style>
        body {
            font-family: 'Arial', sans-serif;
        }

        .update-training-form {
            max-width: 800px;
            margin: 50px auto;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .update-training-form h1 {
            font-size: 2rem;
            color: #111827;
            margin-bottom: 20px;
        }

        .update-training-form .form-group {
            margin-bottom: 15px;
        }

        .update-training-form label {
            font-size: 1rem;
            color: #374151;
            margin-bottom: 5px;
        }

        .update-training-form input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 1rem;
            color: #374151;
            margin-top: 5px;
        }

        .update-training-form button {
            width: 100%;
            background-color: #2563eb;
            color: white;
            font-size: 1.1rem;
            padding: 12px 0;
            border-radius: 8px;
            border: none;
            cursor: pointer;
            transition: background-color 0.2s ease;
        }

        .update-training-form button:hover {
            background-color: #1d4ed8;
        }
    </style>

    <div class="update-training-form">
        <h1>Atjaunot treninu</h1>
        <form action="{{ route('trenins.update', $trenins->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Name</label>
                <input value="{{ $trenins->name }}" type="text" id="name" name="name" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <input value="{{ $trenins->description }}" type="text" id="description" name="description" required>
            </div>

            <div class="form-group">
                <label for="address">Address</label>
                <input value="{{ $trenins->address }}" type="text" id="address" name="address" required>
            </div>

            <button type="submit">
                Atjaunot treninu
            </button>
        </form>
    </div>
</x-app-layout>
