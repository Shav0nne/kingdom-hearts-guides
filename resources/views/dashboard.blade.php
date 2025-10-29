<x-layout>
    <div class="max-w-4xl mx-auto px-6 py-8">
        <div class="text-center mb-10">
            <h1 class="text-3xl font-bold text-khSky mb-4">Dashboard</h1>
            <p class="text-khLight/80">Welcome back, {{ Auth::user()->name }}!</p>

            @if(Auth::user()->is_admin)
                <span class="inline-block bg-khGold text-khDark px-3 py-1 rounded-full text-sm font-bold mt-2">Administrator</span>
            @endif
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-khDark/60 rounded-2xl p-6 border border-khSky/30">
                <h2 class="text-xl font-bold text-khGold mb-4">Quick Actions</h2>
                <div class="space-y-3">
                    <x-button href="{{ route('guides.create') }}" class="bg-khGold hover:bg-yellow-400 text-khDark w-full justify-center">
                        Create New Guide
                    </x-button>
                    <x-button href="{{ route('guides.index') }}" class="bg-khSky hover:bg-blue-400 text-white w-full justify-center">
                        View All Guides
                    </x-button>
                </div>
            </div>

            <div class="bg-khDark/60 rounded-2xl p-6 border border-khSky/30">
                <h2 class="text-xl font-bold text-khGold mb-4">Account Information</h2>
                <div class="space-y-2 text-khLight/80">
                    <p><strong>Name:</strong> {{ Auth::user()->name }}</p>
                    <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
                    <p><strong>Role:</strong> {{ Auth::user()->is_admin ? 'Administrator' : 'User' }}</p>
                    <p><strong>Member since:</strong> {{ Auth::user()->created_at->format('M d, Y') }}</p>
                </div>

                <div class="mt-6">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="bg-red-600 hover:bg-red-500 text-white px-4 py-2 rounded-lg w-full transition-colors duration-200">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>
