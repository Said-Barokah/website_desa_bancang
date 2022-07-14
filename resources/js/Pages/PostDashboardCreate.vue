<template>
<AdminLayout>
    <div class="w-full">
        <Link :href="route('posts.index')" as="button" class="text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-5">Back</Link>
        <form class="w-full" method="post" @submit.prevent="submit">
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
                <img v-if="url" :src="url" class="w-full mt-4 h-80" />
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
                    <div class="flex items-center mb-4" v-for="tag in tags">
                        <input v-model="form.tags" :value="tag.id" id="default-checkbox" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
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
import {
    useEditor,
    EditorContent
} from '@tiptap/vue-3';
import EditorButton from '../Components/Dashboard/EditorButton.vue';
import StarterKit from '@tiptap/starter-kit';
import AdminLayout from '../Layouts/DashboardLayaout.vue';
import {
    Link
} from '@inertiajs/inertia-vue3';
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
                cover: null,
                title: null,
                slug: null,
                desc: null,
                keywords: null,
                meta_desc: null,
                category: null,
                tags: []
            },
            url: null,
            editor: {
                type: Object,
                default: null
            }
        }
    },
    setup() {
        const editor = useEditor({
            content: '<p>Deskripsi....</p>',
            extensions: [
                StarterKit,
            ],
        })
        return {
            editor
        }
    },
    props: {
        categories: Object,
        tags: Object
    },
    methods: {
        submit() {
            if (this.$refs.photo) {
                this.form.cover = this.$refs.photo.files[0];
                console.log(this.form.cover)
            }
            this.form.desc = this.editor.getHTML()
            console.log(this.form)
            console.log(this.form)
            this.$inertia.post(route('posts.store'), this.form)
        },
        previewImage(e) {
            const file = e.target.files[0];
            this.url = URL.createObjectURL(file);
        },
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
