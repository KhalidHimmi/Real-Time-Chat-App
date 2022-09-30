<template>
    <form class="form">
        <div class="textarea-container">
            <textarea
                id="body"
                cols="28"
                rows="5"
                class="form-input"
                @keydown="typing"
                v-model="body"
            >
            </textarea>

            <!-- <span class="notice"> Hit Return to send a message </span> -->
            <button id="btn-emoji" @click.prevent="toogleDialogEmoji">
                😃
            </button>
            <button id="btn-send" @click.prevent="sendMessage">Send</button>
            <VEmojiPicker
                v-show="showDialog"
                :style="{ width: '440px', height: '200' }"
                labelSearch="Search"
                lang="pt-BR"
                @select="onSelectEmoji"
            />
        </div>
    </form>
</template>

<script>
import Event from "../event.js";
import { VEmojiPicker, emojisDefault, categoriesDefault } from "v-emoji-picker";

export default {
    components: {
        VEmojiPicker,
    },
    data() {
        return {
            body: null,
            valueInput: "Someting text ",
            showDialog: false,
        };
    },
    mounted() {
        // console.log(categoriesDefault);
        // console.log("Total emojis:", emojisDefault.length);
    },
    methods: {
        toogleDialogEmoji() {
            console.log("Toogle!");
            this.showDialog = !this.showDialog;
        },
        onSelectEmoji(emoji) {
            this.body += emoji.data;
            // Optional
            // this.toogleDialogEmoji();
        },
        typing(e) {
            if (e.keyCode === 13 && !e.shiftKey) {
                e.preventDefault();
                this.sendMessage();
                // window.Echo.channel("chat").listen("MessageCreated", (e) => {
                //     this.messages.push({
                //         message: e.message.message,
                //         user: e.user,
                //     });
                // });
            }
        },
        sendMessage() {
            if (!this.body || this.body.trim() === "") {
                return;
            }
            let messageObj = this.buildMessage();
            Event.$emit("added_message", messageObj);
            axios
                .post("/message", {
                    body: this.body.trim(),
                })
                .catch(() => {
                    console.log("failed");
                });
            this.body = null;
        },
        buildMessage() {
            return {
                id: Date.now(),
                body: this.body,
                selfMessage: true,
                user: {
                    name: Laravel.user.name,
                },
            };
        },
    },
};
</script>

<style>
.form {
    padding: 8px;
}

.form-input {
    width: 100%;
    border: 1px solid #d3e0e9;
    padding: 5px 10px;
    outline: none;
}

.notice {
    color: #aaa;
}

#body {
    color: white !important;
    background: #3b3f43;
    border-radius: 5px;
}

#btn-send {
    background-color: #131335;
    color: #adedff;
    font-weight: bold;
    border: none;
    border-radius: 15px;
    padding: 5px 30px;
    margin-top: 1rem;
}
#btn-send:hover {
    background-color: rgb(84, 153, 153);
}

.textarea-container {
    position: relative;
}

.textarea-container textarea {
    width: 100%;
    height: 100%;
    box-sizing: border-box;
}

.textarea-container #btn-emoji {
    position: absolute;
    top: 0;
    right: 0;
    background: none;
    border: none;
}
*::-webkit-scrollbar {
    width: 10px;
    background-color: #0b1120;
}
*::-webkit-scrollbar-track {
    background-color: #e2e8f0;
}
*::-webkit-scrollbar-thumb {
    border-radius: 1rem;
    background-color: #94a3b8;
}
</style>
