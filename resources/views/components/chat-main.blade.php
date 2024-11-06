<div class="flex-1 flex flex-col">
    <template x-if="selectedUser">
        <div class="p-4 border-b flex items-center justify-between"
             :class="isDarkMode ? 'border-zinc-800' : 'border-zinc-200'">
            <div class="flex items-center gap-3">
                <div
                    class="w-10 h-10 rounded-full flex items-center justify-center font-bold"
                    :class="{
                        'bg-zinc-50 text-zinc-950': isDarkMode,
                        'bg-zinc-300 text-zinc-950': !isDarkMode
                    }">
                    <span x-text="selectedUser.substring(0, 2)"></span>
                </div>
                <div>
                    <div class="font-medium" x-text="selectedUser"></div>
                    <div class="text-sm" :class="isDarkMode ? 'text-zinc-400' : 'text-zinc-500'">Активен 2 мин назад
                    </div>
                </div>
            </div>
            <div class="flex gap-2">
                <button class="p-2 rounded-full"
                        :class="isDarkMode ? 'text-zinc-400 hover:text-white' : 'text-zinc-600 hover:text-zinc-950'">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path
                            d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                    </svg>
                </button>
                <button class="p-2 rounded-full"
                        :class="isDarkMode ? 'text-zinc-400 hover:text-white' : 'text-zinc-600 hover:text-zinc-950'">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path
                            d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z"/>
                    </svg>
                </button>
                <button class="p-2 rounded-full"
                        :class="isDarkMode ? 'text-zinc-400 hover:text-white' : 'text-zinc-600 hover:text-zinc-950'">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path
                            d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"/>
                    </svg>
                </button>
            </div>
        </div>
    </template>

    <template x-if="selectedUser">
        <div class="flex-1 p-4 overflow-y-auto">
            <template x-for="message in messages[selectedUser] || []" :key="message.id">
                <x-chat-message/>
            </template>
        </div>
    </template>

    <template x-if="!selectedUser">
        <div class="flex-1 flex items-center justify-center">
            <p class="text-xl font-medium" :class="isDarkMode ? 'text-zinc-400' : 'text-zinc-600'">
                Выберите чат, чтобы начать общение
            </p>
        </div>
    </template>

    <template x-if="selectedUser">
        <div x-data="{
            showEmojiPicker: false,
            emojis: ['😀', '😃', '😄', '😁', '😆', '😅', '😂', '🤣', '😊', '😇', '🙂', '🙃', '😉', '😌', '😍', '🥰', '😘', '😗', '😙', '😚', '😋', '😛', '😝', '😜', '🤪', '🤨', '🧐', '🤓', '😎', '🤩', '🥳', '😏', '😒', '😞', '😔', '😟', '😕', '🙁', '☹️', '😣', '😖', '😫', '😩', '🥺', '😢', '😭', '😤', '😠', '😡', '🤬', '🤯', '😳', '🥵', '🥶', '😱', '😨', '😰', '😥', '😓', '🤗', '🤔', '🤭', '🤫', '🤥', '😶', '😐', '😑', '😬', '🙄', '😯', '😦', '😧', '😮', '😲', '🥱', '😴', '🤤', '😪', '😵', '🤐', '🥴', '🤢', '🤮', '🤧', '😷', '🤒', '🤕'],
            addEmoji(emoji) {
                this.newMessage += emoji;
                this.showEmojiPicker = false;
            }
        }" class="p-4 border-t relative" :class="isDarkMode ? 'border-zinc-800' : 'border-zinc-200'">
            <form @submit.prevent="sendMessage" class="flex items-center gap-2">
                <button type="button" @click="showEmojiPicker = !showEmojiPicker" class="p-2 rounded-full"
                        :class="isDarkMode ? 'text-zinc-400 hover:text-white' : 'text-zinc-600 hover:text-zinc-950'">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                              d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 100-2 1 1 0 000 2zm7-1a1 1 0 11-2 0 1 1 0 012 0zm-.464 5.535a1 1 0 10-1.415-1.414 3 3 0 01-4.242 0 1 1 0 00-1.415 1.414 5 5 0 007.072 0z"
                              clip-rule="evenodd"/>
                    </svg>
                </button>
                <input
                    type="text"
                    x-model="newMessage"
                    placeholder="Введите сообщение..."
                    class="flex-1 rounded-full px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    :class="isDarkMode ? 'bg-zinc-900 text-white placeholder-zinc-400' : 'bg-zinc-100 text-zinc-950 placeholder-zinc-500'"
                >
                <button
                    type="submit"
                    class="p-2 rounded-full"
                    :class="isDarkMode ? 'bg-zinc-50 text-zinc-950' : 'bg-zinc-950 text-zinc-50'"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                              d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                              clip-rule="evenodd"/>
                    </svg>
                </button>
            </form>
            <div x-show="showEmojiPicker" x-cloak
                 class="absolute bottom-16 left-4 z-10 p-2 rounded-lg shadow-lg"
                 :class="isDarkMode ? 'bg-zinc-800' : 'bg-white'">
                <div class="grid grid-cols-8 gap-2">
                    <template x-for="emoji in emojis" :key="emoji">
                        <button @click="addEmoji(emoji)"
                                class="text-2xl hover:bg-zinc-200 dark:hover:bg-zinc-700 rounded p-1">
                            <span x-text="emoji"></span>
                        </button>
                    </template>
                </div>
            </div>
        </div>
    </template>
</div>

@push('styles')
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
@endpush
