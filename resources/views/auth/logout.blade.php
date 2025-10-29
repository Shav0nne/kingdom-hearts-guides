<x-layout>
    <div class="max-w-md mx-auto mt-10 p-6 bg-khDark/60 rounded-2xl border border-khSky/30">
        <h2 class="text-2xl font-bold text-khGold mb-6 text-center">Logout</h2>

        <p class="text-khLight/80 mb-6 text-center">Are you sure you want to logout?</p>

        <form method="POST" action="{{ route('logout') }}" class="text-center">
            @csrf
            <button type="submit" class="bg-red-600 hover:bg-red-500 text-white px-6 py-2 rounded-lg font-semibold transition-colors duration-200">Logout</button>
            <a href="{{ url()->previous() }}" class="ml-4 bg-khSky hover:bg-blue-400 text-white px-6 py-2 rounded-lg font-semibold transition-colors duration-200">Cancel</a>
        </form>
    </div>
</x-layout>
