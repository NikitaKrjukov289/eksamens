<x-app-layout>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            
        }

        .create-trainer-form {
            max-width: 800px;
            margin: 50px auto;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .create-trainer-form h1 {
            font-size: 2rem;
            color: #111827;
            margin-bottom: 20px;
        }

        .create-trainer-form .form-group {
            margin-bottom: 15px;
        }

        .create-trainer-form label {
            font-size: 1rem;
            color: #374151;
            margin-bottom: 5px;
        }

        .create-trainer-form input[type="text"], .create-trainer-form input[type="file"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 1rem;
            color: #374151;
            margin-top: 5px;
        }

        .create-trainer-form button {
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

        .create-trainer-form button:hover {
            background-color: #1d4ed8;
        }
    </style>

    <div class="create-trainer-form">
        <h1>Izveidot Treneri</h1>
        <form action="{{ route('treners.store') }}" method="POST" class="space-y-4" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" required>
            </div>

            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" id="image" name="image" accept="image/*">
            </div>

            <div class="form-group">
                <label for="bio">Par treneri:</label>
                <input type="text" id="bio" name="bio" required>
            </div>

            <div class="form-group">
                <label for="contact">Kontakti</label>
                <input type="text" id="contact" name="contact" required>
            </div>

            <button type="submit">
                Izveidot
            </button>
        </form>
    </div>
</x-app-layout>
