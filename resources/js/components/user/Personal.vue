<script>
export default {
    name: 'Personal',
    data() {
        return {
            title: '',
            content: '',
            fileInput: '',
            image: null,
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

            axios.post('/api/post_images',formData)
                .then( res => {
                    this.image = res.data.data
                })
        },
        store() {
             const id = this.image ? this.image.id : null;
            axios.post('/api/posts', {
                title: this.title,
                content: this.content,
                image_id: id,
            })
                .then(res => {
                    this.title = '';
                    this.content = '';
                    this.image = null;
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
<div class="">
        <div>
            <input @change="storeImage" ref="file" type="file" class="hidden">
            <a href="#" class="hover:border block mb-4 p-3 w-16 text-transform: uppercase text-sm bg-sky-500 rounded-2xl text-white text-center hover:bg-white hover:text-amber-900 hover:border-sky-500" @click.prevent="selectFiles">Image</a>
        </div>

    <div v-if="image" @click.prevent="image=null" class="cancel-images">
        <a href="#">Cancel</a>
    </div>

    <div v-if="image" class="added_img mb-4">
        <img :src="image.url" alt="preview">
    </div>
        <div class="btn">
            <a @click.prevent="store" href="#" class="hover:border block p-3 w-32 bg-amber-900 text-transform: uppercase rounded-2xl text-white text-center hover:bg-white hover:text-amber-900 hover:border-amber-900">Publish</a>
        </div>
</div>
    </div>
</template>

<style scoped>

</style>
