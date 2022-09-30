/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");

window.Vue = require("vue").default;

Vue.component(
    "chat-component",
    require("./components/ChatComponent.vue").default
);
Vue.component(
    "user-component",
    require("./components/UserComponent.vue").default
);
Vue.component(
    "chat-messages-component",
    require("./components/ChatMessageComponent.vue").default
);
Vue.component(
    "chat-form-component",
    require("./components/ChatFormComponent.vue").default
);
Vue.component(
    "message-component",
    require("./components/MessageComponent.vue").default
);

const app = new Vue({
    el: "#app",
    // created() {
    //     window.Echo.channel("chat").listen("MessageCreated", (e) => {
    //         // this.messages.push({
    //         //     message: e.message.message,
    //         //     user: e.user,
    //         // });
    //         console.log(e);
    //     });
    // },
});
