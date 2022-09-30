<template>
    <div class="col-md-4">
        <div class="card bg-dark">
            <div class="card-header">Users</div>
            <div class="card-body">
                <div class="" v-for="user in users" :key="user.id">
                    <div v-for="user1 in utilisateurs" class="users">
                        <div v-if="user1.id === user.id" class="connected-user w-50 d-flex justify-content-around">
                            <img :src="'storage/images/'+user1.image" alt="userdefault" id="online-user-pic"> 
                            <div>
                                <a href="#" class="user-name">{{ user.name }}</a>
                                <p id="statu">Online</p>
                            </div>
                        </div>                    
                    </div>
                </div>
                <!-- <img src="/storage/images/e1.png" alt="" /> -->
            </div>
        </div>
    </div>
</template>

<script>
import Event from "../event.js";

export default {
    data() {
        return {
            users: [],
            utilisateurs:[],
        };
    },
    methods: {
        fetchUsers() {
            axios.get('/users').then(response => {
                this.utilisateurs = response.data;
                // console.log(this.utilisateurs);
                // if(this.friends.length>0){ 
                //   this.activeFriend=this.friends[0].id;
                // }
            });
        },
    },
    mounted() {
        this.fetchUsers();
        Event.$on("users.here", (users) => {
            this.users = users;
        })
            .$on("users.joined", (user) => {
                this.users.unshift(user);
            })
            .$on("users.left", (user) => {
                this.users = this.users.filter((u) => {
                    return u.id != user.id;
                });
            });
    },   
};
</script>

<style>
.users {
    /* background-color: #fff; */
    /* border: 2px solid rgba(114, 114, 114, 0.938); */
    border-radius: 3px;
    display: flex;
    justify-content: flex-start;
    /* padding: 6px; */
}

a {
    text-decoration: none;
    color: honeydew;
    font-size: 1rem;
    font-weight: bold;
}
#statu {
    color: #8383ff !important;
}
#online-user-pic{
    width: 2.5rem;
    height: 2.5rem;
    border-radius: 30px;
    margin-top: 6px;
}
.connected-user{
    display: flex;
}
</style>
