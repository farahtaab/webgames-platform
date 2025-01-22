<x-app-layout>
    <div class="bg-gradient-to-b min-h-screen py-12 px-6 text-white">
        <!-- Botón para volver atrás -->
        <div class="mb-6">
            <a href="{{ route('categories.show', $game->category_id) }}" 
               class="inline-flex items-center text-sm font-medium text-black hover:underline">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"></path>
                </svg>
                Back to Games
            </a>
        </div>

        <!-- Información del juego -->
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="grid grid-cols-1 lg:grid-cols-2">
                <!-- Imagen del juego -->
                <div class="relative">
                    <img src="{{ $game->image_url }}" alt="{{ $game->title }}" class="w-full h-96 object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-50"></div>
                </div>
                <!-- Detalles -->
                <div class="p-8">
                    <h1 class="text-4xl font-extrabold text-gray-900">{{ $game->title }}</h1>
                    <p class="text-gray-600 mt-4 leading-relaxed">{{ $game->description }}</p>
                    <a href="{{ $game->url }}" target="_blank" 
                       class="mt-6 inline-block bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded-lg shadow-lg transition-transform transform hover:scale-105">
                        Play Now 🎮
                    </a>
                </div>
            </div>
        </div>

        <!-- Opiniones de otros usuarios -->
        <div class="bg-gray-100 p-6 mt-10 rounded-lg shadow">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">User Ratings</h2>
            @if ($ratings->count() > 0)
                <div class="space-y-6">
                    @foreach ($ratings as $rating)
                        <div class="flex items-start space-x-4 bg-white p-4 rounded-lg shadow">
                            <div class="flex items-center space-x-1">
                                @for ($i = 1; $i <= 5; $i++)
                                    <svg class="w-6 h-6 {{ $i <= $rating->rating ? 'text-yellow-400' : 'text-gray-300' }}" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 .587l3.668 7.521 8.332 1.151-6.064 5.724 1.536 8.211-7.472-4.038L4.528 23.2l1.536-8.211L0 9.259l8.332-1.151z"/>
                                    </svg>
                                @endfor
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-gray-800">{{ $rating->user->name ?? 'Anonymous' }}</p>
                                <p class="text-sm text-gray-600">{{ $rating->created_at->format('d/m/Y') }}</p>
                                <p class="text-gray-700 mt-2">"Great game!"</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-gray-600 mt-4">No ratings yet for this game.</p>
            @endif
        </div>

        <!-- Formulario para valorar con estrellas -->
        <div class="bg-gray-100 p-6 mt-10 rounded-lg shadow">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Rate this game</h2>
            @auth
                <form method="POST" action="{{ route('games.rate', $game) }}">
                    @csrf
                    <div class="flex space-x-2 justify-left">
                        @for ($i = 1; $i <= 5; $i++)
                            <button type="submit" name="rating" value="{{ $i }}" 
                                    class="text-gray-300  hover:text-yellow-400 focus:outline-none text-3xl transition-transform transform hover:scale-125">
                                ★
                            </button>
                        @endfor
                    </div>
                </form>
            @else
                <p class="text-gray-600 text-left">
                    Please <a href="{{ route('login') }}" class="text-blue-600 hover:underline">log in</a> to rate this game.
                </p>
            @endauth
        </div>
    </div>
</x-app-layout>
