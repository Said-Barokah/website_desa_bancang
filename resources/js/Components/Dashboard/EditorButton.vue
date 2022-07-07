<template>
<div v-if="editor">
    <div class="bg-transparent inline-block hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" @click="editor.chain().focus().toggleBold().run()" :class="{ 'is-active': editor.isActive('bold') }">
        <RemixIcon icon="bold" style="height: 20" />
    </div>
    <div class="bg-transparent inline-block hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" @click="editor.chain().focus().toggleItalic().run()" :class="{ 'is-active': editor.isActive('italic') }">
        <RemixIcon icon="italic" style="height: 20" />
    </div>
    <div class="bg-transparent inline-block hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" @click="editor.chain().focus().toggleStrike().run()" :class="{ 'is-active': editor.isActive('strike') }">
        <RemixIcon icon="strikethrough" style="height: 20" />
    </div>
    <div class="bg-transparent inline-block hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" @click="editor.chain().focus().toggleCode().run()" :class="{ 'is-active': editor.isActive('code') }">
        <RemixIcon icon="code-line" style="height: 20" />
    </div>
    <!-- This example requires Tailwind CSS v2.0+ -->

    <div class="bg-transparent inline-block hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" @click="editor.chain().focus().unsetAllMarks().run()">
        <RemixIcon icon="eraser-line" title="clear mark" style="height: 20" />
    </div>
    <div class="bg-transparent inline-block hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" @click="editor.chain().focus().clearNodes().run()">
        <RemixIcon icon="format-clear" title="format-clear" style="height: 20" />
    </div>
    <div class="bg-transparent inline-block hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" @click="editor.chain().focus().setParagraph().run()" :class="{ 'is-active': editor.isActive('paragraph') }">
        <RemixIcon icon="paragraph" style="height: 20" />
    </div>

    <div class="bg-transparent inline-block hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" @click="editor.chain().focus().toggleHeading({ level: 1 }).run()" :class="{ 'is-active': editor.isActive('heading', { level: 1 }) }">
        <RemixIcon icon="h-1" style="height: 20" />
    </div>
    <div class="bg-transparent inline-block hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" @click="editor.chain().focus().toggleHeading({ level: 2 }).run()" :class="{ 'is-active': editor.isActive('heading', { level: 2 }) }">
        <RemixIcon icon="h-2" style="height: 20" />
    </div>
    <div class="bg-transparent inline-block hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" @click="editor.chain().focus().toggleHeading({ level: 3 }).run()" :class="{ 'is-active': editor.isActive('heading', { level: 3 }) }">
        <RemixIcon icon="h-3" style="height: 20" />
    </div>
    <div class="bg-transparent inline-block hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" @click="editor.chain().focus().toggleHeading({ level: 4 }).run()" :class="{ 'is-active': editor.isActive('heading', { level: 4 }) }">
        <RemixIcon icon="h-4" style="height: 20" />
    </div>
    <div class="bg-transparent inline-block hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" @click="editor.chain().focus().toggleHeading({ level: 5 }).run()" :class="{ 'is-active': editor.isActive('heading', { level: 5 }) }">
        <RemixIcon icon="h-5" style="height: 20" />
    </div>
    <div class="bg-transparent inline-block hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" @click="editor.chain().focus().toggleHeading({ level: 6 }).run()" :class="{ 'is-active': editor.isActive('heading', { level: 6 }) }">
        <RemixIcon icon="h-6" style="height: 20" />
    </div>
    <div class="bg-transparent inline-block hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" @click="editor.chain().focus().toggleBulletList().run()" :class="{ 'is-active': editor.isActive('bulletList') }">
        <RemixIcon icon="list-unordered" style="height: 20" />
    </div>
    <div class="bg-transparent inline-block hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" @click="editor.chain().focus().toggleOrderedList().run()" :class="{ 'is-active': editor.isActive('orderedList') }">
        <RemixIcon icon="list-ordered" style="height: 20" />
    </div>
    <div class="bg-transparent inline-block hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" @click="editor.chain().focus().toggleCodeBlock().run()" :class="{ 'is-active': editor.isActive('codeBlock') }">
        <RemixIcon icon="code-box-fill" style="height: 20" />
    </div>
    <div class="bg-transparent inline-block hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" @click="editor.chain().focus().toggleBlockquote().run()" :class="{ 'is-active': editor.isActive('blockquote') }">
        <RemixIcon icon="chat-quote-line" style="height: 20" />
    </div>
    <div class="bg-transparent inline-block hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" @click="editor.chain().focus().undo().run()">
        <RemixIcon icon="arrow-go-back-line" style="height: 20" />
    </div>
    <div class="bg-transparent inline-block hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" @click="editor.chain().focus().redo().run()">
        <RemixIcon icon="arrow-go-forward-line" style="height: 20" />
    </div>
</div>
</template>

<script>
import RemixIcon from '../RemixIcons.vue'
export default {
    components: {
        RemixIcon
    },

    props : {
        editor : {
            type : Object,
            default : null
        }
    }
}
</script>
