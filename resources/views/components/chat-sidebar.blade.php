@props(['users'])

<div class="w-80 border-r" :class="isDarkMode ? 'border-zinc-800' : 'border-zinc-200'">
    <div class="p-4 flex items-center justify-between">
        <h1 class="text-2xl font-black">Чаты({{ count($users) }})</h1>
        <div class="flex gap-2">
            <button @click="isDarkMode = !isDarkMode" class="p-2 rounded-full"
                    :class="isDarkMode ? 'text-zinc-400 hover:text-white' : 'text-zinc-600 hover:text-zinc-950'">
                <template x-if="isDarkMode">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                              d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                              clip-rule="evenodd"/>
                    </svg>
                </template>
                <template x-if="!isDarkMode">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"/>
                    </svg>
                </template>
            </button>
        </div>
    </div>
    <div class="h-[calc(100vh-4rem)] overflow-y-auto">
        @foreach ($users as $user)
            <div @click="selectedUser = '{{ $user->first_name }} {{ $user->last_name }}'"
                 class="p-4 flex items-center gap-3 cursor-pointer"
                 :class="{
                    'bg-zinc-800': isDarkMode && selectedUser === '{{ $user->first_name }} {{ $user->last_name }}',
                    'bg-zinc-100': !isDarkMode && selectedUser === '{{ $user->first_name }} {{ $user->last_name }}',
                    'hover:bg-zinc-800': isDarkMode && selectedUser !== '{{ $user->first_name }} {{ $user->last_name }}',
                    'hover:bg-zinc-100': !isDarkMode && selectedUser !== '{{ $user->first_name }} {{ $user->last_name }}',
                    'hover:text-white': isDarkMode,
                    'hover:text-zinc-950': !isDarkMode
                }">
                <div
                    class="w-10 h-10 rounded-full flex items-center justify-center font-bold overflow-hidden"
                    :class="{
                        'bg-zinc-50 text-zinc-950': isDarkMode,
                        'bg-zinc-300 text-zinc-950': !isDarkMode
                    }">
                    @if($user->profile_photo_path)
                        <img src="{{ $user->profile_photo_path }}" alt="{{ $user->first_name }}"
                             class="w-full h-full object-cover">
                    @else
                        <span>{{ substr($user->first_name, 0, 1) }}{{ substr($user->last_name, 0, 1) }}</span>
                    @endif
                </div>

                <div class="flex-1">
                    <div class="font-medium">{{ $user->first_name }} {{ $user->last_name }}</div>
                    @if($user->email)
                        <div class="text-sm font-medium" :class="isDarkMode ? 'text-zinc-400' : 'text-zinc-500'">
                            {{ $user->email }}
                        </div>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</div>
