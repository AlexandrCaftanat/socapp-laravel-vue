<script>
export default {
    name: "Index",
    data() {
        return {
            token : null

        }
    },

    mounted() {
        this.getToken();
    },

    watch:{
        $route(){
            this.getToken();
        }

    },

    methods:{
        getToken() {
            this.token = localStorage.getItem('x_xsrf_token')
        },

        logout() {
            axios.post('/logout')
                .then(res => {
                    localStorage.removeItem('x_xsrf_token');
                    this.$router.push({
                        name: 'user.login'
                    });
                })
        }
    }
}
</script>

<template>
<div>
    <router-link v-if="!token" :to="{ name: 'user.login' }">Login</router-link>
    <router-link v-if="!token" :to="{ name: 'user.registration' }">Registration</router-link>
    <router-link v-if="token" :to="{ name: 'user.personal' }">Personal</router-link>
    <router-link v-if="token" :to="{ name: 'user.index' }">Users</router-link>
    <a v-if="token" @click.prevent="logout" href="#">LogOut</a>
    <router-view></router-view>
</div>
</template>

<style scoped>

</style>
