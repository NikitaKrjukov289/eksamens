<x-app-layout>
    <style>
        body {
            font-family: 'Arial', sans-serif;
   
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

        .update-trainer-form {
            max-width: 800px;
            margin: 50px auto;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .update-trainer-form h1 {
            font-size: 2rem;
            color: #111827;
            margin-bottom: 20px;
        }

        .update-trainer-form .form-group {
            margin-bottom: 15px;
        }

        .update-trainer-form label {
            font-size: 1rem;
            color: #374151;
            margin-bottom: 5px;
        }

        .update-trainer-form input[type="text"], .update-trainer-form input[type="file"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 1rem;
            color: #374151;
            margin-top: 5px;
        }

        .update-trainer-form button {
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

        .update-trainer-form button:hover {
            background-color: #1d4ed8;
        }
    </style>

    <div class="update-trainer-form">
        <h1>Atjaunot Treneri</h1>
        <form action="{{ route('treners.update', $treners->id) }}" method="POST" class="space-y-4" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Name</label>
                <input value="{{ $treners->name }}" type="text" id="name" name="name" required>
            </div>

            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" id="image" name="image" accept="image/*">
            </div>

            <div class="form-group">
                <label for="bio">Par treneri:</label>
                <input value="{{ $treners->bio }}" type="text" id="bio" name="bio" required>
            </div>


            <div class="form-group">
                <label for="contact">Kontakti</label>
                <input value="{{ $treners->contact }}" type="text" id="contact" name="contact" required>
            </div>

            <button type="submit">
                Atjaunot Treneri
            </button>
        </form>
    </div>
</x-app-layout>
