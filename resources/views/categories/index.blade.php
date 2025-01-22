<x-app-layout>
    <div class="bg-gradient-to-b bg-gray-100 min-h-screen py-12 text-black">
        <!-- Títol principal -->
        <div class="text-center mb-12">
            <h1 class="text-6xl font-extrabold text-yellow-400 leading-tight drop-shadow-md tracking-wider font-game">
                Explore Game Categories
            </h1>
            <p class="text-black mt-4 text-lg font-black">
                Choose a category and discover amazing games!
            </p>
        </div>

        <!-- Grid de categories -->
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($categories as $category)
                    <a href="{{ route('categories.show', $category) }}" 
                       class="relative block overflow-hidden rounded-lg shadow-lg transform hover:scale-105 transition-transform bg-gradient-to-tr border-solid border-2 border-indigo-600 bg-gray-200">
                        <!-- Imatge de categoria -->
                        @if ($category->image_url ?? false)
                            <img src="{{ $category->image_url }}" alt="{{ $category->name }}" 
                                 class="absolute inset-0 w-full h-full object-cover opacity-30">
                        @else
                            <div class="absolute inset-0 bg-gradient-to-br opacity-30"></div>
                        @endif

                        <!-- Contingut -->
                        <div class="relative z-10 p-6 text-center">
                            <h2 class="text-3xl font-extrabold mb-2 tracking-wide">{{ $category->name }}</h2>
                            <p class="text-sm opacity-90 font-light">
                                {{ Str::limit($category->description, 100) }}
                            </p>
                        </div>

                        <!-- Decoració amb efectes dinàmics -->
                        <div class="absolute top-4 left-4 animate-spin-slow">🌟</div>
                        <div class="absolute bottom-4 right-4 animate-bounce">🎮</div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>

    <style>
        /* Font global */
        @import url('https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap');

        .font-game {
            font-family: 'Press Start 2P', cursive;
        }

        .animate-spin-slow {
            animation: spin 6s linear infinite;
        }

        @keyframes spin {
            from {
                transform: rotate(0deg);
            }
            to {
                transform: rotate(360deg);
            }
        }

        .animate-bounce {
            animation: bounce 2s infinite;
        }

        @keyframes bounce {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-10px);
            }
        }
    </style>
</x-app-layout>
