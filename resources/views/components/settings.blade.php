<div x-show="showSettings" :class="darkMode ? 'bg-black' : 'bg-white'" class="p-4">
    <h2 class="text-2xl font-semibold mb-4">Настройки</h2>
    <div :class="darkMode ? 'bg-gray-900' : 'bg-gray-100'"
         class="flex items-center justify-between p-4 rounded-lg mb-2">
        <div class="flex items-center">
            <svg :class="darkMode ? 'text-blue-400' : 'text-gray-500'" class="h-6 w-6 mr-2" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path>
            </svg>
            <span>Темный режим</span>
        </div>
        <button
            @click="toggleDarkMode"
            :class="darkMode ? 'bg-blue-600' : 'bg-gray-300'"
            class="w-12 h-6 rounded-full p-1 transition-colors duration-300 ease-in-out"
        >
            <div :class="darkMode ? 'translate-x-6' : ''"
                 class="w-4 h-4 bg-white rounded-full shadow-md transform duration-300 ease-in-out"></div>
        </button>
    </div>
    <!-- Добавьте другие настройки здесь -->
</div>
