"use strict";

var _ChatMessages = _interopRequireDefault(require("./components/ChatMessages.vue"));

var _ChatForm = _interopRequireDefault(require("./components/ChatForm.vue"));

var _ChatComponent = _interopRequireDefault(require("./components/ChatComponent.vue"));

var _vueChatScroll = _interopRequireDefault(require("vue-chat-scroll"));

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { "default": obj }; }

require('./bootstrap');

window.Vue = require('vue');
Vue.component('chat-component', _ChatComponent["default"]);
Vue.use(_vueChatScroll["default"]);
var app = new Vue({
  el: '#app'
}); //require('./bootstrap');
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