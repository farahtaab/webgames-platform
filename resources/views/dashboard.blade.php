<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="bg-gray-100 min-h-screen py-10">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <!-- Bienvenida -->
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <div class="p-8">
                    <h1 class="text-4xl font-extrabold text-gray-800 mb-4">Welcome Back!</h1>
                    <p class="text-lg text-gray-600">
                        Explore new games, check out exciting categories, and rate your favorites. We're thrilled to have you here!
                    </p>
                </div>
                <div class="bg-yellow-400 py-4 px-8 text-gray-800 text-center font-semibold">
                    Ready to dive into the world of games? Click below to get started!
                </div>
            </div>

            <!-- Accesos rápidos -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mt-10">
                <a href="{{ route('categories.index') }}" 
                   class="block bg-gradient-to-r from-yellow-400 to-yellow-500 hover:from-yellow-500 hover:to-yellow-600 text-gray-800 font-semibold text-lg rounded-lg shadow-lg transform hover:scale-105 transition-transform">
                    <div class="p-6 text-center">
                        <h3 class="text-2xl font-bold mb-2">Explore Categories</h3>
                        <p class="text-sm">Find games in various exciting categories.</p>
                    </div>
                </a>

                <a href="{{ route('dashboard') }}" 
                   class="block bg-gradient-to-r from-blue-400 to-blue-500 hover:from-blue-500 hover:to-blue-600 text-white font-semibold text-lg rounded-lg shadow-lg transform hover:scale-105 transition-transform">
                    <div class="p-6 text-center">
                        <h3 class="text-2xl font-bold mb-2">Your Profile</h3>
                        <p class="text-sm">Manage your account and preferences.</p>
                    </div>
                </a>

                <a href="{{ route('categories.index') }}" 
                   class="block bg-gradient-to-r from-green-400 to-green-500 hover:from-green-500 hover:to-green-600 text-white font-semibold text-lg rounded-lg shadow-lg transform hover:scale-105 transition-transform">
                    <div class="p-6 text-center">
                        <h3 class="text-2xl font-bold mb-2">Top Rated Games</h3>
                        <p class="text-sm">Check out the most loved games by our community.</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
