<div x-data="{ isSearching: false }" :class="darkMode ? 'bg-black border-gray-700' : 'bg-white border-gray-200'"
     class="w-full sm:w-64 border-r">
    <div :class="darkMode ? 'border-gray-700' : 'border-gray-200'" class="p-4 border-b">
        <div class="flex items-center justify-between">
            <button @click="showSettings = !showSettings">
                <svg :class="darkMode ? 'text-gray-400' : 'text-gray-500'" class="h-6 w-6" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
            <h1 class="text-xl font-semibold">Chats</h1>
            <button @click="isSearching = !isSearching">
                <svg :class="darkMode ? 'text-gray-400' : 'text-gray-500'" class="h-6 w-6" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </button>
        </div>
        <div x-show="isSearching" class="mt-2 relative">
            <input
                type="text"
                placeholder="Search chats..."
                x-model="searchTerm"
                @input="searchChats"
                :class="darkMode ? 'bg-gray-700 text-white border-gray-600' : 'bg-white border-gray-300'"
                class="w-full px-3 py-2 border rounded-full focus:outline-none focus:ring-2 focus:ring-blue-500"
            >
            <button x-show="searchTerm" @click="searchTerm = ''"
                    class="absolute right-3 top-1/2 transform -translate-y-1/2">
                <svg :class="darkMode ? 'text-gray-400' : 'text-gray-500'" class="h-4 w-4" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
    </div>
    <div class="overflow-y-auto h-[calc(100vh-64px)]">
        <template x-for="chat in filteredChats" :key="chat.id">
            <div
                @click="selectChat(chat)"
                :class="darkMode ? 'border-gray-700 hover:bg-gray-700' : 'border-gray-200 hover:bg-gray-50'"
                class="flex items-center p-4 border-b cursor-pointer"
            >
                <div class="w-12 h-12 bg-blue-500 rounded-full mr-4"></div>
                <div class="flex-1">
                    <h2 class="font-semibold" x-text="chat.name"></h2>
                    <p :class="darkMode ? 'text-gray-400' : 'text-gray-500'" class="text-sm"
                       x-text="chat.lastMessage"></p>
                </div>
                <span :class="darkMode ? 'text-gray-500' : 'text-gray-400'" class="text-xs" x-text="chat.time"></span>
            </div>
        </template>
    </div>
</div>
