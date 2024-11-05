@props(['isDarkMode' => true, 'users' => [], 'selectedUser' => null, 'messages' => []])

<div x-data="{
    isDarkMode: @js($isDarkMode),
    selectedUser: @js($selectedUser),
    messages: @js($messages),
    newMessage: '',
    sendMessage() {
        if (this.newMessage.trim()) {
            this.messages[this.selectedUser].push({
                id: Date.now(),
                content: this.newMessage,
                sender: 'user',
                time: new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' })
            });
            this.newMessage = '';
        }
    }
}"
     class="flex h-screen"
     :class="isDarkMode ? 'bg-zinc-950 text-zinc-50' : 'bg-white text-zinc-950'">

    <x-chat-sidebar :users="$users" :messages="$messages" :selectedUser="$selectedUser" />

    <x-chat-main />

</div>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
@endpush
