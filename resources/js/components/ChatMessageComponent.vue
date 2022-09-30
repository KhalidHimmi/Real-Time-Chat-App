<template>
    <div class="message-area" ref="message">
        <message-component
            v-for="message in messages"
            :key="message.id"
            :message="message"
            :class="message.user.name == userName ? ' sent' : ' received'"
        >
        </message-component>
    </div>
</template>

<script>
import Event from "../event.js";

export default {
    data() {
        return {
            messages: [],
            userName: null,
        };
    },
    methods: {
        // userID(){
        //     this.user = Laravel.user.id;
        // }
    },
    mounted() {
        axios.get("/message").then((response) => {
            this.messages = response.data;
        });
        Event.$on("added_message", (message) => {
            this.messages.push(message);
            if (message.selfMessage) {
                this.$refs.message.scrollTop = 0;
            }
        });
        //
        this.userName = Laravel.user.name;
    },
};
</script>
<style>
.message-area {
    height: 400px;
    max-height: 400px;
    overflow-y: scroll;
    padding: 15px;
    border-bottom: 1px solid #eee;
}
</style>
