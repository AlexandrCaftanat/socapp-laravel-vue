<script>
export default {
    name: "Index",
    data() {
        return {
            users : [],
        }

    },
    methods: {
        getUsers() {
            axios.get('/api/users/')
                .then(res => {
                    this.users = res.data.data;
                })

        }
    },

    mounted() {
        this.getUsers();
    }
}
</script>

<template>

    <div class="h-screen overflow-hidden flex items-center justify-center">
        <div v-if="users" class="users">
            <div v-for="user in users" class="user mb-8 pb-8 border-b  border-amber-400">
                <router-link :to="{name: 'user.show',params: {id: user.id}}">
                    <p>{{ user.id }}</p>
                    <p>{{ user.name }}</p>
                    <p>{{ user.email }}</p>
                </router-link>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>
