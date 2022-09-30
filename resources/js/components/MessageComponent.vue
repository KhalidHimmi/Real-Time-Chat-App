<template>
    <div class="message self">
        <!-- <span class="badge bg-success"><strong class="user">{{ message.user.id }}</strong></span> -->
        <!-- <span class="badge bg-" :class="`${message.user.id == userID ? 'success' : 'danger'}`"><strong class="user">{{ message.user.name }}</strong></span> -->
        <span :class="message.user.name === userID ? succesClass : errorClass"
            ><strong class="user">{{ message.user.name }}</strong></span
        >
        <p class="body">{{ message.body }}</p>
    </div>
</template>

<script>
export default {
    props: ["message"],
    data() {
        return {
            userID: null,
            userId: null,
            errorClass: "badge bg-danger",
            succesClass: "badge bg-success",
        };
    },
    mounted() {
        this.userID = Laravel.user.name;
        this.userId = Laravel.user.id;
        // console.log(this.userId);
    },
};
</script>

<style>
.user {
    font-weight: 800;
}
.body {
    margin-bottom: 0;
    white-space: pre-wrap;
}
.message {
    border: 1px solid #000000;
    border-radius: 5px;
    margin: 2px;
}
.self {
    background-color: #3b3f43;
    padding: 10px;
}
.sent {
    /* background-color: rgb(65, 119, 219) !important; */
    display: grid;
    justify-items: end;
    /* width: fit-content; */
    /* position: relative; */
    /* left: 36rem; */
}

.received {
    /* background-color: rgb(16, 155, 69) !important; */
    display: grid;
    justify-items: start;
    /* width: fit-content; */
}
</style>
