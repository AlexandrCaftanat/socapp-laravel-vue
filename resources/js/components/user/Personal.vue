<script>
export default {
    name: 'Personal',
    data() {
        return {
            title: '',
            content: '',
            fileInput: '',
        }
    },

    methods : {
        selectFiles() {
            this.fileInput = this.$refs.file;
            this.fileInput.click();
        },
        storeImage(e) {
            const file = e.target.files[0];
            const formData = new FormData();
            formData.append('image', file);

            axios.post('/api/post_image',formData)
                .then( res => {
                    console.log(res);
                })
        }
    },

}

</script>

<template>
    <div class="w-96 mx-auto">
        <div>
            <input v-model="title" type="text" name="title" placeholder="title"
                   class="mb-4 border p-1 rounded-2xl w-96 border-1 border-amber-900">
        </div>
        <div>
            <textarea v-model="content" name="content" id="post_content" cols="30" rows="10" placeholder="content"
                      class="border mb-4 p-1 rounded-2xl w-96 border-1 border-amber-900"></textarea>
        </div>
<div class="space-x-12">
        <div>
            <input @change="storeImage" ref="file" type="file" class="hidden">
            <a href="#" class="hover:border block mb-4 p-3 w-16 text-transform: uppercase text-sm bg-sky-500 rounded-2xl text-white text-center hover:bg-white hover:text-amber-900 hover:border-sky-500" @click.prevent="selectFiles">Image</a>
        </div>

        <div class="btn">
            <a href="#" class="hover:border block p-3 w-32 bg-amber-900 text-transform: uppercase rounded-2xl text-white text-center hover:bg-white hover:text-amber-900 hover:border-amber-900">Publish</a>
        </div>
</div>
    </div>
</template>

<style scoped>

</style>
