<script>
export default {
    name: 'Post',
    props: ['post',]


}

</script>

<template>
    <div  class="mb-8 pb-8 border-b  border-amber-400">
        <h1 class="mb-4 text-2xl">{{post.title}}</h1>
        <img class="mb-3" v-if="post.image_url" :src="post.image_url" :alt="post.title">
        <p>{{post.content}}</p>
        <p class=" mt-1.5 text-sm text-cyan-700">{{post.date}}</p>
    </div>
</template>

<style scoped>

</style>
