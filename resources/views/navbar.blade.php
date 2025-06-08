<div class="bg-dark">
    <nav class="flex items-center justify-between p-4 border-b border-darkBlue">
        <div class="flex items-center">
            <img src="https://via.placeholder.com/24" alt="Logo" class="w-6 h-6">
        </div>
        <div class="flex-1 mx-4">
            <input type="text" placeholder="Search"
                class="w-full p-2 rounded border border-gray-700 bg-dark text-white">
        </div>
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
