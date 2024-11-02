<div x-show="!showSettings" class="flex-1 flex flex-col">
    <template x-if="selectedChat">
        <div>
            <div :class="darkMode ? 'bg-black border-gray-700' : 'bg-white border-gray-200'" class="p-4 border-b">
                <h2 class="font-semibold" x-text="selectedChat.name"></h2>
            </div>
            <div :class="darkMode ? 'bg-gray-900' : 'bg-gray-100'" class="flex-1 overflow-y-auto p-4">
                <!-- Chat messages would go here -->
            </div>
            <div :class="darkMode ? 'bg-black border-gray-700' : 'bg-white border-gray-200'" class="p-4 border-t">
                <div class="flex items-center">
                    <svg :class="darkMode ? 'text-gray-400' : 'text-gray-500'" class="h-6 w-6 mr-2" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"></path>
                    </svg>
                    <input
                        type="text"
                        placeholder="Write a message..."
                        :class="darkMode ? 'bg-gray-700 text-white border-gray-600' : 'bg-white border-gray-300'"
                        class="flex-1 border rounded-full px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    >
                    <svg :class="darkMode ? 'text-gray-400' : 'text-gray-500'" class="h-6 w-6 mx-2" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <svg class="h-6 w-6 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                    </svg>
                </div>
            </div>
        </div>
    </template>
    <template x-if="!selectedChat">
        <div :class="darkMode ? 'text-gray-400' : 'text-gray-500'" class="flex items-center justify-center h-full">
            Select a chat to start messaging
        </div>
    </template>
</div>
