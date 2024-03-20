<script>
import Post from "../../components/Post.vue";

export default {
    name: 'Show',
    components: {Post},
    data() {
        return {
            posts: [],
           userId : this.$route.params.id,
        }
    },


    mounted() {
        this.getPosts();
    },

    methods : {

        getPosts() {

            axios.get(`/api/users/${this.userId}/posts`)
                .then( res => {
                    this.posts = res.data.data;
                })
        }
    },

}

</script>

<template>
    <div class="w-96 mx-auto">

        <div v-if="this.posts" class="posts">
            <h1 class="mb-4" >Posts</h1>
            <post v-for="post in posts" :post="post"></post>
        </div>
    </div>
</template>

<style scoped>

</style>
