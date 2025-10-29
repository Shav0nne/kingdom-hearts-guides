@props(['categories'])

<div class="bg-khDark/60 backdrop-blur-sm rounded-2xl shadow-lg border border-khSky/30 p-6 mb-8">
    <form action="{{ route('guides.index') }}" method="GET" class="flex flex-col lg:flex-row gap-4 items-end">
        <div class="flex-1 w-full">
            <label class="block text-khGold font-semibold mb-2">Search Guides</label>
            <input type="text" name="search" id="search" value="{{ request('search') }}" placeholder="Search by title or description..."
                class="w-full px-4 py-2 bg-khLight/10 border border-khSky/50 rounded-lg text-khLight placeholder-khLight/50 focus:outline-none focus:ring-2 focus:ring-khGold focus:border-transparent">
        </div>

        <div class="w-full lg:w-48">
            <label class="block text-khGold font-semibold mb-2">Difficulty</label>
            <select name="difficulty" id="difficulty"
                class="w-full px-4 py-2 bg-khLight/10 border border-khSky/50 rounded-lg text-khLight focus:outline-none focus:ring-2 focus:ring-khGold focus:border-transparent">
                <option value="" class="text-khDark">All Difficulties</option>
                <option value="⭐" {{ request('difficulty') == '⭐' ? 'selected' : '' }} class="text-khDark">⭐</option>
                <option value="⭐⭐" {{ request('difficulty') == '⭐⭐' ? 'selected' : '' }} class="text-khDark">⭐⭐</option>
                <option value="⭐⭐⭐" {{ request('difficulty') == '⭐⭐⭐' ? 'selected' : '' }} class="text-khDark">⭐⭐⭐</option>
                <option value="⭐⭐⭐⭐" {{ request('difficulty') == '⭐⭐⭐⭐' ? 'selected' : '' }} class="text-khDark">⭐⭐⭐⭐</option>
                <option value="⭐⭐⭐⭐⭐" {{ request('difficulty') == '⭐⭐⭐⭐⭐' ? 'selected' : '' }} class="text-khDark">⭐⭐⭐⭐⭐</option>
            </select>
        </div>

        <div class="w-full lg:w-56">
            <label class="block text-khGold font-semibold mb-2">Category</label>
            <select name="category_id" id="category_id" class="w-full px-4 py-2 bg-khLight/10 border border-khSky/50 rounded-lg text-khLight focus:outline-none focus:ring-2 focus:ring-khGold focus:border-transparent">
                <option value="" class="text-khDark">All Categories</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }} class="text-khDark">
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="flex gap-3 w-full lg:w-auto">
            <button
                type="submit" class="bg-khSky hover:bg-blue-400 text-white px-6 py-2 rounded-lg font-semibold transition-colors duration-200">Filter
            </button>
            @if(request()->hasAny(['search', 'difficulty', 'category_id']))
                <a href="{{ route('guides.index') }}" class="bg-khGold hover:bg-yellow-400 text-khDark px-6 py-2 rounded-lg font-semibold transition-colors duration-200 text-center">Clear</a>
            @endif
        </div>
    </form>
</div>
