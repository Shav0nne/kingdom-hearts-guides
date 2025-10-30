<x-layout>
    <div class="max-w-6xl mx-auto px-6 py-8">
        <div class="text-center mb-10">
            <h1 class="text-4xl font-bold text-khSky mb-4">Admin Dashboard</h1>
        </div>

        @php
            $totalGuides = \App\Models\Guide::count();
            $publishedGuides = \App\Models\Guide::where('active', true)->count();
            $unpublishedGuides = \App\Models\Guide::where('active', false)->count();
        @endphp

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-khDark/60 rounded-2xl p-6 border border-khSky/30 text-center">
                <h3 class="text-2xl font-bold text-khGold mb-2">{{ $totalGuides }}</h3>
                <p class="text-khLight/80">Total Guides</p>
            </div>
            <div class="bg-khDark/60 rounded-2xl p-6 border border-khSky/30 text-center">
                <h3 class="text-2xl font-bold text-khGold mb-2">{{ $publishedGuides }}</h3>
                <p class="text-khLight/80">Published</p>
            </div>
            <div class="bg-khDark/60 rounded-2xl p-6 border border-khSky/30 text-center">
                <h3 class="text-2xl font-bold text-khGold mb-2">{{ $unpublishedGuides }}</h3>
                <p class="text-khLight/80">Unpublished</p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="bg-khDark/60 rounded-2xl p-6 border border-khSky/30">
                <h2 class="text-xl font-bold text-khGold mb-4">Guide Management</h2>
                <div class="space-y-3">
                    <x-button href="{{ route('guides.create') }}" class="bg-khGold hover:bg-yellow-400 text-khDark w-full justify-center py-3 text-lg font-semibold">
                        Create New Guide
                    </x-button>
                    <x-button href="{{ route('guides.index') }}" class="bg-khSky hover:bg-blue-400 text-white w-full justify-center py-3 text-lg font-semibold">
                        Manage All Guides
                    </x-button>
                </div>
            </div>

            <div class="bg-khDark/60 rounded-2xl p-6 border border-khSky/30">
                <h2 class="text-xl font-bold text-khGold mb-4">Account Information</h2>
                <div class="space-y-2 text-khLight/80 mb-6">
                    <p><strong>Name:</strong> {{ Auth::user()->name }}</p>
                    <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
                    <p><strong>Role:</strong> Administrator</p>
                    <p><strong>Member since:</strong> {{ Auth::user()->created_at->format('M d, Y') }}</p>
                </div>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="bg-red-600 hover:bg-red-500 text-white px-4 py-3 rounded-lg w-full transition-colors duration-200 font-semibold">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-layout>
