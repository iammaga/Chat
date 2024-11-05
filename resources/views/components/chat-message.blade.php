<div class="flex items-end gap-2 mb-4" :class="message.sender === 'user' ? 'flex-row-reverse' : ''">
    <div class="w-8 h-8 rounded-full flex items-center justify-center text-xs font-bold"
         :class="isDarkMode
                  ? 'bg-zinc-50 text-zinc-950'
                  : 'bg-zinc-950 text-zinc-50'">
        <span x-text="message.sender === 'user' ? 'Вы' : selectedUser.substring(0, 1)"></span>
    </div>
    <div class="flex rounded-xl px-4 py-2 max-w-[70%] font-medium"
         :class="{
             'bg-zinc-200 text-zinc-950': message.sender === 'other' && !isDarkMode,
             'bg-zinc-800 text-zinc-300': message.sender === 'other' && isDarkMode,
             'bg-zinc-50 text-zinc-950': message.sender === 'user' && isDarkMode,
             'bg-zinc-950 text-zinc-50': message.sender === 'user' && !isDarkMode
         }">
        <div x-text="message.content"></div>
        <div class="text-xs mt-2 ml-1 font-medium"
             :class="{
                 'text-zinc-950': message.sender === 'other' && !isDarkMode,
                 'text-zinc-300': message.sender === 'other' && isDarkMode,
                 'text-zinc-950': message.sender === 'user' && isDarkMode,
                 'text-zinc-50': message.sender === 'user' && !isDarkMode
             }"
             x-text="message.time"></div>
    </div>
</div>
