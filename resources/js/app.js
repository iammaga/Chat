import './bootstrap';
import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.data('telegramClone', () => ({
    darkMode: false,
    showSettings: false,
    searchTerm: '',
    selectedChat: null,
    allChats: [
        {id: 1, name: 'John Doe', lastMessage: 'Hey, how are you?', time: '12:30'},
        {id: 2, name: 'Jane Smith', lastMessage: 'See you tomorrow!', time: '11:45'},
        {id: 3, name: 'Group Chat', lastMessage: 'Alice: Great idea!', time: '10:15'},
        {id: 4, name: 'Bob Johnson', lastMessage: 'Can you send me the file?', time: '09:20'},
        {id: 5, name: 'Emma Wilson', lastMessage: 'Thanks for your help!', time: '08:55'},
    ],
    get filteredChats() {
        return this.allChats.filter(chat =>
            chat.name.toLowerCase().includes(this.searchTerm.toLowerCase()) ||
            chat.lastMessage.toLowerCase().includes(this.searchTerm.toLowerCase())
        );
    },
    toggleDarkMode() {
        this.darkMode = !this.darkMode;
    },
    selectChat(chat) {
        this.selectedChat = chat;
    },
    searchChats() {
        // This method is called on input, but filtering is handled by the computed property 'filteredChats'
    }
}));

Alpine.start();
