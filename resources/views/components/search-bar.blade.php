@props(['categories'])

<div class="search-container">
    <form action="{{ route('guides.index') }}" method="GET" class="search-form">
        <div class="search-input">
            <input type="text" name="search" id="search" value="{{ request('search') }}" placeholder="Search guides...">
        </div>

        <div class="filter-select">
            <select name="difficulty" id="difficulty">
                <option value="">All Difficulties</option>
                <option value="⭐" {{ request('difficulty') == '⭐' ? 'selected' : '' }}>⭐</option>
                <option value="⭐⭐" {{ request('difficulty') == '⭐⭐' ? 'selected' : '' }}>⭐⭐</option>
                <option value="⭐⭐⭐" {{ request('difficulty') == '⭐⭐⭐' ? 'selected' : '' }}>⭐⭐⭐</option>
                <option value="⭐⭐⭐⭐" {{ request('difficulty') == '⭐⭐⭐⭐' ? 'selected' : '' }}>⭐⭐⭐⭐</option>
                <option value="⭐⭐⭐⭐⭐" {{ request('difficulty') == '⭐⭐⭐⭐⭐' ? 'selected' : '' }}>⭐⭐⭐⭐⭐</option>
            </select>
        </div>

        <div class="filter-select">
            <select name="category_id" id="category_id">
                <option value="">All Categories</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="button-group">
            <button type="submit" class="filter-btn text-white">Filter</button>
            @if(request()->hasAny(['search', 'difficulty', 'category_id']))
                <a href="{{ route('guides.index') }}" class="clear-btn text-white">Clear</a>
            @endif
        </div>
    </form>
</div>
