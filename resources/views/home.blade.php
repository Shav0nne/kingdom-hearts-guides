<x-layout>
    <x-slot:heading>
        Welcome to Kingdom Hearts II Guides
    </x-slot:heading>

    <div class="text-center mb-12">
        <p class="text-xl text-khLight/80 mb-8 max-w-2xl mx-auto leading-relaxed">
            Your ultimate resource for mastering Kingdom Hearts II. Find detailed guides,
            walkthroughs, and strategies to conquer every world and boss.
        </p>

        <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
            <x-button href="/guides" class="bg-khGold hover:bg-yellow-400 text-khDark font-bold px-8 py-4 text-lg rounded-lg transition-all duration-300">Explore Guides</x-button>
            <x-button href="/about" class="bg-khSky hover:bg-blue-400 text-white font-bold px-8 py-4 text-lg rounded-lg border border-khSky/50 transition-all duration-300">Learn More</x-button>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-16">
        <div class="text-center p-6 bg-khDark/40 rounded-2xl border border-khSky/30 hover:border-khGold/50 transition-all duration-300">
            <h3 class="text-xl font-bold text-khSky mb-3">Expert Strategies</h3>
            <p class="text-khLight/70">Detailed boss fight strategies, synthesis guides, and completionist tips from experienced players.</p>
        </div>

        <div class="text-center p-6 bg-khDark/40 rounded-2xl border border-khSky/30 hover:border-khGold/50 transition-all duration-300">
            <h3 class="text-xl font-bold text-khSky mb-3">World Walkthroughs</h3>
            <p class="text-khLight/70">Complete walkthroughs for every world, including hidden treasures, lucky emblems, and secret bosses.</p>
        </div>

        <div class="text-center p-6 bg-khDark/40 rounded-2xl border border-khSky/30 hover:border-khGold/50 transition-all duration-300">
            <h3 class="text-xl font-bold text-khSky mb-3">Difficulty Levels</h3>
            <p class="text-khLight/70">Guides categorized by difficulty from beginner tips to Critical Mode challenges and data battles.</p>
        </div>
    </div>

    <div class="mt-16 text-center bg-khDark/40 rounded-2xl p-8 border border-khSky/30">
        <h2 class="text-2xl font-bold text-khGold mb-4">Ready to Begin Your Journey?</h2>
        <p class="text-khLight/70 mb-6 max-w-2xl mx-auto">
            Whether you're starting your first playthrough or aiming for 100% completion,
            our guides will help you master the Heartless, Nobodies, and Organization XIII.
        </p>
        <x-button href="/guides" class="bg-khGold hover:bg-yellow-400 text-khDark font-bold px-8 py-3 rounded-lg">
            Browse All Guides
        </x-button>
    </div>
</x-layout>
