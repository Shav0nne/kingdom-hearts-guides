<x-layout>
    <div class="max-w-6xl mx-auto px-6 py-8">
        <div class="text-center mb-10">
            <h1 class="text-4xl font-bold text-khSky tracking-wider drop-shadow-md mb-4">All Guides</h1>
            <div class="h-1 w-32 bg-khGold mx-auto rounded-full shadow-glow mb-6"></div>
        </div>

        @if(isset($categories))
            <x-search-bar :categories="$categories"/>
        @endif

        @if(request()->hasAny(['search', 'difficulty', 'category_id']))
            <div class="mb-6 text-center">
                <span class="bg-khSky/20 text-khLight px-4 py-2 rounded-full text-sm font-medium">
                    Found {{ $guides->total() }} result(s)
                </span>
            </div>
        @endif

        @auth
            @if(auth()->user()->is_admin)
                <div class="text-center mb-10">
                    <x-button href="{{ route('guides.create') }}" class="bg-khGold hover:bg-yellow-500 text-khDark font-bold px-8 py-3 rounded-lg transition-all">
                        Create New Guide
                    </x-button>
                </div>
            @endif
        @endauth

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($guides as $guide)
                <div class="bg-khDark/60 backdrop-blur-sm rounded-2xl shadow-lg border border-khSky/30 p-6 hover:shadow-glow hover:border-khGold/50 transition-all duration-300">
                    <div class="mb-4 rounded-lg overflow-hidden h-48 bg-khDark/80">
                        <img src="{{ $guide->image_url ?? 'https://oyster.ignimgs.com/mediawiki/apis.ign.com/kingdom-hearts-ii/7/76/468px-KH_2.5_HD_Remix_Logo.jpg' }}"
                             alt="{{ $guide->title }}"
                             class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                    </div>

                    <div class="mb-4">
                        <h2 class="text-xl font-bold text-khGold mb-3 line-clamp-2 leading-tight">{{ $guide->title }}</h2>
                        @if($guide->category)
                            <div class="mb-2">
                                <span class="inline-block bg-khGold/20 text-khGold px-3 py-1 rounded-full text-sm font-medium">
                                    {{ $guide->category->name }}
                                </span>
                            </div>
                        @endif

                        <div class="flex items-center gap-2">
                            <span class="inline-flex items-center gap-1 bg-khSky/20 text-khLight px-3 py-1 rounded-full text-sm font-semibold">
                                Difficulty: {{ $guide->difficulty }}
                            </span>
                        </div>
                    </div>

                    <p class="text-khLight/80 mb-6 leading-relaxed line-clamp-3">
                        {{ Str::limit($guide->description, 120) }}
                    </p>

                    @auth
                        @if(auth()->user()->is_admin)
                            <div class="mb-4 text-center">
                                <span class="inline-block px-3 py-1 rounded-full text-sm font-bold {{ $guide->active ? 'bg-green-500/20 text-green-300' : 'bg-red-500/20 text-red-300' }}">
                                    {{ $guide->active ? 'Published' : 'Unpublished' }}
                                </span>
                            </div>
                        @endif
                    @endauth

                    <div class="pt-4 border-t border-khSky/20">
                        <div class="grid grid-cols-2 gap-2 mb-2">
                            <x-button href="{{ route('guides.show', $guide->id) }}" class="bg-khSky hover:bg-blue-400 text-white justify-center text-center py-2">Details</x-button>

                            @auth
                                @if(auth()->user()->is_admin)
                                    <x-button href="{{ route('guides.edit', $guide->id) }}" class="bg-khGold hover:bg-yellow-400 text-khDark justify-center text-center text-sm py-2">Edit</x-button>
                                @else
                                    <div></div>
                                @endif
                            @endauth
                        </div>

                        @auth
                            @if(auth()->user()->is_admin)
                                <div class="grid grid-cols-2 gap-2">
                                    <form action="{{ route('guides.toggle', $guide->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <x-button type="submit" class="w-full px-4 py-2 text-white no-underline hover:opacity-90 transition-opacity duration-200 font-medium text-sm {{ $guide->active ? 'bg-green-600 hover:bg-green-500' : 'bg-red-600 hover:bg-red-500' }}">
                                            {{ $guide->active ? 'Publish' : 'Unpublish' }}
                                        </x-button>
                                    </form>

                                    <form action="{{ route('guides.destroy', $guide->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <x-button type="submit" class="w-full px-4 py-2 bg-red-600 hover:bg-red-500 text-white justify-center text-sm transition-colors duration-200"
                                                onclick="return confirm('Are you sure you want to delete this guide?')">Delete
                                        </x-button>
                                    </form>
                                </div>
                            @endif
                        @endauth
                    </div>
                </div>
            @endforeach
        </div>

        @if($guides->count() === 0)
            <div class="text-center py-16 bg-khDark/40 rounded-2xl border border-khSky/20">
                <h3 class="text-2xl font-bold text-khSky mb-4">No Guides Found</h3>
                <p class="text-khLight/70 mb-6 max-w-md mx-auto">
                    @if(request()->hasAny(['search', 'difficulty', 'category_id']))
                        Try adjusting your search filters.
                    @else
                        No guides available yet.
                    @endif
                </p>
                @auth
                    @if(auth()->user()->is_admin)
                        <x-button href="{{ route('guides.create') }}" class="bg-khGold hover:bg-yellow-400 text-khDark font-bold px-8 py-3 rounded-lg shadow-glow">
                            Create First Guide
                        </x-button>
                    @endif
                @endauth
            </div>
        @endif

        @if($guides->hasPages())
            <div class="mt-12 bg-khDark/40 rounded-2xl p-6 border border-khSky/20">
                {{ $guides->links() }}
            </div>
        @endif
    </div>
</x-layout>
