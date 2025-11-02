<x-layout>
    <div class="max-w-4xl mx-auto px-6 py-8">
        <div class="mb-6">
            <x-button href="{{ route('guides.index') }}" class="bg-khSky hover:bg-blue-400 text-white">Back to all guides</x-button>
        </div>

        <div class="bg-khDark/60 rounded-2xl shadow-lg p-8 border border-khSky/30 backdrop-blur-sm">
            <div class="mb-6 rounded-xl overflow-hidden h-64 bg-khDark/80">
                <img src="{{ $guide->image_url ?? 'https://oyster.ignimgs.com/mediawiki/apis.ign.com/kingdom-hearts-ii/7/76/468px-KH_2.5_HD_Remix_Logo.jpg' }}"
                     alt="{{ $guide->title }}"
                     class="w-full h-full object-cover">
            </div>

            <h1 class="text-3xl font-bold text-khGold mb-4">{{ $guide->title }}</h1>

            <div class="flex flex-wrap gap-4 mb-6">
                @if($guide->category)
                    <span class="bg-khGold/20 text-khGold px-3 py-1 rounded-full text-sm font-medium">
                        {{ $guide->category->name }}
                    </span>
                @endif
                <span class="bg-khSky/20 text-khLight px-3 py-1 rounded-full text-sm font-semibold">
                    Difficulty: {{ $guide->difficulty }}
                </span>
                <span class="bg-khDark/80 text-khLight/70 px-3 py-1 rounded-full text-sm">
                    {{ $guide->created_at->format('M d, Y') }}
                </span>
            </div>

            <div class="mb-8">
                <p class="text-khLight/80 leading-relaxed whitespace-pre-line">{{ $guide->description }}</p>
            </div>

            <div class="border-t border-khSky/20 pt-6 mb-6">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-4">
                        <form action="{{ route('guides.like', $guide->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="flex items-center gap-2 px-4 py-2 rounded-lg {{ auth()->check() && auth()->user()->hasLiked($guide) ? 'bg-red-600 hover:bg-red-500' : 'bg-khSky hover:bg-blue-400' }} text-white transition-colors duration-200">
                                ❤️ {{ auth()->check() && auth()->user()->hasLiked($guide) ? 'Unlike' : 'Like' }}
                            </button>
                        </form>
                        <span class="text-khLight/60">
                            {{ $guide->likeCount() }} likes • {{ $guide->commentCount() }} comments
                        </span>
                    </div>
                </div>
            </div>

            @auth
                @if(!auth()->user()->is_admin)
                    <div class="border-t border-khSky/20 pt-6">
                        <h3 class="text-xl font-bold text-khSky mb-4">Comments</h3>

                        @if(auth()->user()->canComment())
                            <form action="{{ route('guides.comment', $guide->id) }}" method="POST" class="mb-6">
                                @csrf
                                <div class="mb-3">
                                    <textarea name="content" rows="3"
                                              class="w-full px-4 py-3 bg-khDark border border-khSky/30 rounded-lg text-khLight placeholder-khLight/50 focus:border-khGold focus:ring-2 focus:ring-khGold/20 transition-all duration-200"
                                              placeholder="Share your thoughts..." required></textarea>
                                    @error('content')
                                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <button type="submit" class="bg-khGold hover:bg-yellow-400 text-khDark font-bold px-6 py-2 rounded-lg transition-colors duration-200">Post Comment</button>
                            </form>
                        @else
                            <div class="bg-khDark/40 rounded-lg p-4 mb-6 border border-khSky/20">
                                <p class="text-khLight/70 text-center">You need at least 3 likes to comment.
                                    <span class="text-khGold">You have {{ auth()->user()->like_count }}/3 likes.</span>
                                </p>
                            </div>
                        @endif
                    </div>
                @endif
            @else
                <div class="border-t border-khSky/20 pt-6">
                    <h3 class="text-xl font-bold text-khSky mb-4">Comments</h3>
                    <div class="bg-khDark/40 rounded-lg p-4 mb-6 border border-khSky/20">
                        <p class="text-khLight/70 text-center">
                            Please <a href="/login" class="text-khGold hover:text-yellow-400 underline">login</a> to like and comment.
                        </p>
                    </div>
                </div>
            @endauth

            <div class="border-t border-khSky/20 pt-6">
                <h3 class="text-xl font-bold text-khSky mb-4">Community Comments</h3>
                <div class="space-y-4">
                    @forelse($guide->comments()->with('user')->latest()->get() as $comment)
                        <div class="bg-khDark/40 rounded-lg p-4 border border-khSky/20">
                            <div class="flex justify-between items-start mb-2">
                                <div class="flex items-center gap-2">
                                    <span class="font-semibold text-khLight">{{ $comment->user->name }}</span>
                                    @if($comment->user->is_admin)
                                        <span class="bg-khGold text-khDark px-2 py-1 rounded-full text-xs font-bold">ADMIN</span>
                                    @endif
                                    <span class="text-khLight/60 text-sm">{{ $comment->created_at->diffForHumans() }}</span>
                                </div>
                                @if(auth()->check() && (auth()->id() === $comment->user_id || auth()->user()->is_admin))
                                    <form action="{{ route('comments.destroy', $comment->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-400 hover:text-red-300 text-sm" onclick="return confirm('Delete this comment?')">Delete</button>
                                    </form>
                                @endif
                            </div>
                            <p class="text-khLight/80">{{ $comment->content }}</p>
                        </div>
                    @empty
                        <p class="text-khLight/60 text-center py-4">No comments yet.</p>
                    @endforelse
                </div>
            </div>

            <div class="mt-6 pt-6 border-t border-khSky/20">
                <p class="text-sm text-khLight/60"> Created: {{ $guide->created_at->format('M d, Y') }}
                    @if($guide->updated_at != $guide->created_at) Updated: {{ $guide->updated_at->format('M d, Y') }}
                    @endif
                </p>
            </div>
        </div>
    </div>
</x-layout>
