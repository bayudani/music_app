<div class="bg-lightBlue text-darkBlue">
    <nav class="flex items-center justify-between p-4 border-b border-darkBlue">
        <div class="flex items-center">
            <img src="https://via.placeholder.com/24" alt="Logo" class="w-6 h-6">
        </div>

        <form method="GET" action="{{ route('music.search') }}" class="flex flex-1 mx-4">
            <input type="text" name="q" placeholder="Search lagu atau artis..."
                class="flex-grow p-2 rounded-l border border-gray-700 bg-dark text-white focus:outline-none" 
                value="{{ request('q') }}">
            <button type="submit"
                class="px-4 bg-accent rounded-r text-white hover:bg-accent-dark transition duration-200">
                Search
            </button>
        </form>

        <div class="flex items-center space-x-4">
            <a href="#"
                class="{{ request()->is('product') ? 'text-accent' : 'text-gray-400' }} hover:text-accent">Product</a>
            <a href="#"
                class="{{ request()->is('features') ? 'text-accent' : 'text-gray-400' }} hover:text-accent">Features</a>
            <a href="#"
                class="{{ request()->is('marketplace') ? 'text-accent' : 'text-gray-400' }} hover:text-accent">Marketplace</a>
            <a href="#"
                class="{{ request()->is('company') ? 'text-accent' : 'text-gray-400' }} hover:text-accent">Company</a>
        </div>
    </nav>
</div>
