<x-app-layout>
    <div class="bg-gradient-to-b min-h-screen py-10 px-4 text-white">
        <!-- Títol de la categoria -->
        <div class="text-center mb-12">
            <h1 class="text-5xl font-extrabold text-yellow-400 leading-tight drop-shadow-md tracking-wider font-game">
                {{ $category->name }} Games
            </h1>
            <p class="text-gray-900 mt-4 text-lg font-light">
                Explore amazing games in the {{ $category->name }} category!
            </p>
        </div>

        <!-- Grid de jocs -->
        <div class="max-w-7xl mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 px-4">
            @foreach ($games as $game)
                <div class="relative block overflow-hidden rounded-lg shadow-lg transform hover:scale-105 transition-transform bg-gradient-to-r bg-gray-100">
                    <!-- Imatge del joc -->
                    <a href="{{ route('games.show', $game) }}">
                        <img class="w-full h-32 sm:h-40 object-cover opacity-80 hover:opacity-100 transition-opacity rounded-t-lg" 
                             src="{{ $game->image_url }}" alt="{{ $game->title }}" />
                    </a>

                    <!-- Contingut -->
                    <div class="p-4 text-center">
                        <a href="{{ route('games.show', $game) }}" class="block">
                            <h5 class="text-lg font-extrabold text-black tracking-wide font-game">{{ $game->title }}</h5>
                        </a>
                        <div class="flex justify-center items-center mt-3">
                            <div class="flex items-center space-x-1">
                                @php
                                    $rating = round($game->ratings->avg('rating') ?? 0);
                                @endphp
                                @for ($i = 0; $i < 5; $i++)
                                    <svg class="w-4 h-4 {{ $i < $rating ? 'text-yellow-400' : 'text-gray-400' }}" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                    </svg>
                                @endfor
                            </div>
                            <span class="bg-yellow-100 text-yellow-800 text-xs font-semibold px-2.5 py-0.5 rounded ms-2">
                                {{ $rating }}.0
                            </span>
                        </div>
                        <div class="mt-4">
                            <a href="{{ $game->url }}" target="_blank" 
                               class="inline-block text-sm font-medium px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 transition">
                                Play Now 🎮
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <style>
        /* Font global */
        @import url('https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap');

        .font-game {
            font-family: 'Press Start 2P', cursive;
        }
    </style>
</x-app-layout>
