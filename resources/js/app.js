import ChatMessages from './components/ChatMessages.vue';
import ChatForm from './components/ChatForm.vue';
import ChatComponent from './components/ChatComponent.vue';
require('./bootstrap');

window.Vue = require('vue');

Vue.component('chat-component', ChatComponent);

import VueChatScroll from 'vue-chat-scroll'
Vue.use(VueChatScroll)

const app = new Vue({
    el: '#app',
});

//require('./bootstrap');
//window.Vue = require('vue');
//
//
//Vue.component('chat-messages', ChatMessages);
//Vue.component('chat-form', ChatForm);
//
//const app = new Vue({
//    el: '#app',
//
//    data: {
//        messages: []
//    },
//
//    created() {
//        this.fetchMessages();
//        Echo.private('chat')
//        .listen('MessageSent', (e) => {
//            this.messages.push({
//            message: e.message.message,
//            user: e.user
//            });
//        });
//    },
//
//    methods: {
//        fetchMessages() {
//            axios.get('/messages').then(response => {
//                this.messages = response.data;
//            });
//        },
//
//        addMessage(message) {
//            this.messages.push(message);
//
//            axios.post('/messages', message).then(response => {
//                console.log(response);
//            }).catch(error => {
//               console.log(error.response)
//             });
//        }
//    }
//});