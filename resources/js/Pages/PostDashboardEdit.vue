<template>
<AdminLayout>
    <div class="w-full">
        <Link :href="route('posts.index')" as="button" class="text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-5">Back</Link>
        <form class="w-full" method="post" @submit.prevent="submit(post.id)">
            <div class="relative z-0 w-full mb-6 group">
                <label for="File">File Upload</label>
                <input type="file" @change="previewImage" ref="photo" class="
                                        w-full
                                        px-4
                                        py-2
                                        mt-2
                                        border
                                        rounded-md
                                        focus:outline-none
                                        focus:ring-1
                                        focus:ring-blue-600
                                    " />
                <img :src="url ? url : form.cover" class="w-full mt-4 h-80" />
                <!-- <div v-if="errors.image" class="font-bold text-red-600">
                    {{ errors.image }}
                </div> -->
            </div>
            <div class="relative z-0 w-full mb-6 group">
                <input v-model="form.title" type="text" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" ">
                <label for="floating_email" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nama</label>
            </div>
            <div class="relative z-0 w-full mb-6 group">
                <input v-model="form.slug" type="text" id="floating_password" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" ">
                <label for="floating_password" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Slug</label>
            </div>
            <div class="relative z-0 w-full mb-6 group">
                <div class="relative z-0 w-full mb-6 group">
                    <editor-button :editor="editor"></editor-button>
                    <editor-content :editor="editor" :class="'prose max-w-6xl p-4'" />
                </div>
            </div>

            <div class="relative z-0 w-full mb-6 group">

                <textarea v-model="form.meta_desc" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Meta Deskripsi..."></textarea>
            </div>
            <div class="relative z-0 w-full mb-6 group">
                <input v-model="form.keywords" type="text" id="floating_repeat_password" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" ">
                <label for="floating_repeat_password" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Keywords</label>
            </div>
            <div class="relative z-0 w-full mb-6 group">
                <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Select an option</label>
                <select v-model="form.category" id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected="">Pilih Kategori</option>
                    <option v-for="category in categories" :value="category.id">{{ category.name }}</option>
                </select>
            </div>
            <div class="relative z-0 w-full mb-6 group">
                <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Pilih tag</label>
                <div>
                    <div class="flex items-center mb-4" v-for="(tag,index) in tag_checked " :key="index">
                        <input v-model="tag.checked" @change="chekedTag" :value="tag.id" type="checkbox" class="tag w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ tag.name }}</label>
                    </div>
                </div>
            </div>
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Tambah</button>
        </form>
    </div>
</AdminLayout>
</template>

<script>
import AdminLayout from '../Layouts/DashboardLayaout.vue';
import {
    Link
} from '@inertiajs/inertia-vue3';
import {
    useEditor,
    EditorContent
} from '@tiptap/vue-3';
import EditorButton from '../Components/Dashboard/EditorButton.vue';
import StarterKit from '@tiptap/starter-kit';

export default {
    components: {
        AdminLayout,
        Link,
        EditorContent,
        EditorButton

    },
    data() {
        return {
            form: {
                cover: this.post.cover,
                title: this.post.title,
                slug: this.post.slug,
                desc: this.post.desc,
                keywords: this.post.keywords,
                meta_desc: this.post.meta_desc,
                category: this.post.category_id,
                tags: []
            },
            url: null,
            editor: {
                type: Object,
                default: null
            },
            tag_checked: [],
            tagsku: []
        }
    },
    props: {
        tags: Object,
        categories: Object,
        post: Object,
        action: String,
        post_tag: Object
    },
    setup(props) {
        const editor = useEditor({
            content: props.post.desc,
            extensions: [
                StarterKit,
            ],
        })
        return {
            editor
        }
    },
    methods: {
        submit(id) {
            this.tag_checked.forEach(tag => {
                if (tag.checked == true) {
                    this.form.tags.push(tag.id)
                }
            })
            if (this.$refs.photo) {
                this.form.cover = this.$refs.photo.files[0];
                console.log(this.form.cover)
            }
            this.form.desc = this.editor.getHTML()
            console.log(this.form)
            this.$inertia.post(route('posts.update', id), this.form)
        },
        previewImage(e) {
            const file = e.target.files[0];
            this.url = URL.createObjectURL(file);
        },
        chekedTag() {
            console.log(this.tag_checked)
        }

    },

    mounted() {
        const check = document.querySelector('#app > div > section > div > div > div > form > div:nth-child(8) > div > div:nth-child(1) > input')
        // this.$refs.check0[0].checked=true
        // console.log(this.$refs.check0[0].checked)

    },
    created() {
        const arr_post_tag = [];
        this.post_tag.forEach(ptag => {
            arr_post_tag.push(ptag.id)
        })
        this.tags.forEach(tag => {
            var check = arr_post_tag.includes(tag.id)
            this.tag_checked.push({
                'id': tag.id,
                'name': tag.name,
                'checked': check
            })
        });

        console.log(this.form.tags)
        // console.log(this.$refs.tag.value)
    },

}
</script>

<style lang="scss">
.ProseMirror {
    outline: #d1d5db 1px solid;
    border-radius: 4px;
    min-height: 20rem;
    padding-left: 10px;
    padding-right: 10px;
}

.ProseMirror:focus {
    outline-color: #3f83f8;
}

.ProseMirror {
    >*+* {
        margin-top: 0.75em;
    }

    ul,
    ol {
        padding: 0 1rem;
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        line-height: 1.1;
    }

    code {
        background-color: rgba(#616161, 0.1);
        color: #616161;
    }

    pre {
        background: #0D0D0D;
        color: #FFF;
        font-family: 'JetBrainsMono', monospace;
        padding: 0.75rem 1rem;
        border-radius: 0.5rem;

        code {
            color: inherit;
            padding: 0;
            background: none;
            font-size: 0.8rem;
        }
    }

    img {
        max-width: 100%;
        height: auto;
    }

    blockquote {
        padding-left: 1rem;
        border-left: 2px solid rgba(#0D0D0D, 0.1);
    }

    hr {
        border: none;
        border-top: 2px solid rgba(#0D0D0D, 0.1);
        margin: 2rem 0;
    }
}
</style>
