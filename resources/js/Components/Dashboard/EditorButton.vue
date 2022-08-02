<template>
<div v-if="editor" class="flex justify-center">
    <div title="bold" class="bg-transparent inline-block hover:bg-blue-500 mx-2 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" @click="editor.chain().focus().toggleBold().run()" :class="{ 'is-active': editor.isActive('bold') }">
        <RemixIcon icon="bold" style="height: 20" />
    </div>
    <div title="italic" class="bg-transparent inline-block hover:bg-blue-500 mx-2 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" @click="editor.chain().focus().toggleItalic().run()" :class="{ 'is-active': editor.isActive('italic') }">
        <RemixIcon icon="italic" style="height: 20" />
    </div>
    <div title="strike through" class="bg-transparent inline-block hover:bg-blue-500 mx-2 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" @click="editor.chain().focus().toggleStrike().run()" :class="{ 'is-active': editor.isActive('strike') }">
        <RemixIcon icon="strikethrough" style="height: 20" />
    </div>
    <div title="code" class="bg-transparent inline-block hover:bg-blue-500 mx-2 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" @click="editor.chain().focus().toggleCode().run()" :class="{ 'is-active': editor.isActive('code') }">
        <RemixIcon icon="code-line" style="height: 20" />
    </div>
    <!-- This example requires Tailwind CSS v2.0+ -->

    <div title="clear mark" class="bg-transparent inline-block hover:bg-blue-500 mx-2 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" @click="editor.chain().focus().unsetAllMarks().run()">
        <RemixIcon icon="eraser-line" style="height: 20" />
    </div>
    <div title="format-clear" class="bg-transparent inline-block hover:bg-blue-500 mx-2 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" @click="editor.chain().focus().clearNodes().run()">
        <RemixIcon icon="format-clear" style="height: 20" />
    </div>
    <div title="set paragraph" class="bg-transparent inline-block hover:bg-blue-500 mx-2 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" @click="editor.chain().focus().setParagraph().run()" :class="{ 'is-active': editor.isActive('paragraph') }">
        <RemixIcon icon="paragraph" style="height: 20" />
    </div>

    <div class="inline-block relative z-50">
        <div titile="set heading" class="cursor-pointer bg-transparent inline-block hover:bg-blue-500 mx-2 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" @click="isHiddenHeading = !isHiddenHeading">
            <div class="flex">
                <RemixIcon icon="heading" style="height: 20" />
                <RemixIcon v-if="!isHiddenHeading" icon="arrow-drop-up-line" style="height: 20" />
                <RemixIcon v-if="isHiddenHeading" icon="arrow-drop-down-line" style="height: 20" />
            </div>
        </div>
        <div v-if="!isHiddenHeading" class="absolute top-11 left-0">
            <div title="heading 1" class="bg-white inline-block hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-white rounded" @click="editor.chain().focus().toggleHeading({ level: 1 }).run()" :class="{ 'is-active': editor.isActive('heading', { level: 1 }) }">
                <RemixIcon icon="h-1" style="height: 20" />
            </div>
            <div title="heading 2" class="bg-white inline-block hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-white rounded" @click="editor.chain().focus().toggleHeading({ level: 2 }).run()" :class="{ 'is-active': editor.isActive('heading', { level: 2 }) }">
                <RemixIcon icon="h-2" style="height: 20" />
            </div>
            <div title="heading 3" class="bg-white inline-block hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-white rounded" @click="editor.chain().focus().toggleHeading({ level: 3 }).run()" :class="{ 'is-active': editor.isActive('heading', { level: 3 }) }">
                <RemixIcon icon="h-3" style="height: 20" />
            </div>
            <div title="heading 4" class="bg-white inline-block hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-white rounded" @click="editor.chain().focus().toggleHeading({ level: 4 }).run()" :class="{ 'is-active': editor.isActive('heading', { level: 4 }) }">
                <RemixIcon icon="h-4" style="height: 20" />
            </div>
            <div title="heading 5" class="bg-white inline-block hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-white rounded" @click="editor.chain().focus().toggleHeading({ level: 5 }).run()" :class="{ 'is-active': editor.isActive('heading', { level: 5 }) }">
                <RemixIcon icon="h-5" style="height: 20" />
            </div>
            <div title="heading 6" class="bg-white inline-block hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-white rounded" @click="editor.chain().focus().toggleHeading({ level: 6 }).run()" :class="{ 'is-active': editor.isActive('heading', { level: 6 }) }">
                <RemixIcon icon="h-6" style="height: 20" />
            </div>
        </div>
    </div>

    <div title="bullet list" class="bg-transparent inline-block hover:bg-blue-500 mx-2 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" @click="editor.chain().focus().toggleBulletList().run()" :class="{ 'is-active': editor.isActive('bulletList') }">
        <RemixIcon icon="list-unordered" style="height: 20" />
    </div>
    <div title="ordered list" class="bg-transparent inline-block hover:bg-blue-500 mx-2 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" @click="editor.chain().focus().toggleOrderedList().run()" :class="{ 'is-active': editor.isActive('orderedList') }">
        <RemixIcon icon="list-ordered" style="height: 20" />
    </div>
    <div title="code block" class="bg-transparent inline-block hover:bg-blue-500 mx-2 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" @click="editor.chain().focus().toggleCodeBlock().run()" :class="{ 'is-active': editor.isActive('codeBlock') }">
        <RemixIcon icon="code-box-fill" style="height: 20" />
    </div>
    <div title="blockquote" class="bg-transparent inline-block hover:bg-blue-500 mx-2 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" @click="editor.chain().focus().toggleBlockquote().run()" :class="{ 'is-active': editor.isActive('blockquote') }">
        <RemixIcon icon="chat-quote-line" style="height: 20" />
    </div>
    <div title="undo" class="bg-transparent inline-block hover:bg-blue-500 mx-2 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" @click="editor.chain().focus().undo().run()">
        <RemixIcon icon="arrow-go-back-line" style="height: 20" />
    </div>
    <div title="redo" class="bg-transparent inline-block hover:bg-blue-500 mx-2 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" @click="editor.chain().focus().redo().run()">
        <RemixIcon icon="arrow-go-forward-line" style="height: 20" />
    </div>

    <div title="tambah tabel" class="cursor-pointer bg-transparent inline-block hover:bg-blue-500 mx-2 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" @click="isHiddenTable = !isHiddenTable">
        <RemixIcon icon="table-line" style="height: 20" />
    </div>
</div>
<div v-if="!isHiddenTable" class="flex justify-center my-2">
    <div>
        <div title="sisipkan table" class="bg-transparent inline-block hover:bg-blue-500 mx-2 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" @click="editor.chain().focus().insertTable({ rows: 3, cols: 3, withHeaderRow: true }).run()" :class="{ 'is-active': editor.isActive('blockquote') }">
            <RemixIcon icon="add-line" style="height: 20" />
        </div>
        <div title="tambah kolom sebelumnya" class="bg-transparent inline-block hover:bg-blue-500 mx-2 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" @click="editor.chain().focus().addColumnBefore().run()">
            <RemixIcon icon="insert-column-left" style="height: 20" />
        </div>
        <div title="tambah kolom setelahnya" class="bg-transparent inline-block hover:bg-blue-500 mx-2 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" @click="editor.chain().focus().addColumnAfter().run()">
            <RemixIcon icon="insert-column-right" style="height: 20" />
        </div>
        <div class="bg-transparent inline-block hover:bg-blue-500 mx-2 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" @click="editor.chain().focus().deleteColumn().run()">
            <RemixIcon icon="delete-column" style="height: 20" />
        </div>
        <div title="hapus kolom" class="bg-transparent inline-block hover:bg-blue-500 mx-2 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" @click="editor.chain().focus().addRowBefore().run()">
            <RemixIcon icon="insert-row-top" style="height: 20" title="tambah baris sebelumnya" />
        </div>
        <div title="tambah baris setelahnya" class="bg-transparent inline-block hover:bg-blue-500 mx-2 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" @click="editor.chain().focus().addRowAfter().run()">
            <RemixIcon icon="insert-row-bottom" style="height: 20" />
        </div>
        <div title="hapus baris" class="bg-transparent inline-block hover:bg-blue-500 mx-2 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" @click="editor.chain().focus().deleteRow().run()">
            <RemixIcon icon="delete-row" style="height: 20" />
        </div>
        <div class="bg-transparent inline-block hover:bg-blue-500 mx-2 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" @click="editor.chain().focus().deleteTable().run()">
            <RemixIcon icon="delete-bin-line" style="height: 20" />
        </div>
        <div title="hapus tabel" class="bg-transparent inline-block hover:bg-blue-500 mx-2 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" @click="editor.chain().focus().mergeCells().run()">
            <RemixIcon icon="merge-cells-horizontal" style="height: 20" title="gabungkan sel" />
        </div>
        <div title="pisah sel" class="bg-transparent inline-block hover:bg-blue-500 mx-2 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" @click="editor.chain().focus().splitCell().run()">
            <RemixIcon icon="split-cells-horizontal" style="height: 20" />
        </div>
        <div class="bg-transparent inline-block hover:bg-blue-500 mx-2 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" @click="editor.chain().focus().toggleHeaderColumn().run()">
            <RemixIcon icon="layout-right-2-line" style="height: 20" />
        </div>
        <div title="beralih ke kolom header" class="bg-transparent inline-block hover:bg-blue-500 mx-2 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" @click="editor.chain().focus().toggleHeaderRow().run()">
            <RemixIcon icon="layout-left-2-line" style="height: 20" title="beralih ke baris header" />
        </div>
        <div title="beralih ke sel header" class="bg-transparent inline-block hover:bg-blue-500 mx-2 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" @click="editor.chain().focus().toggleHeaderCell().run()">
            <RemixIcon icon="layout-row-fill" style="height: 20" />
        </div>
    </div>
</div>
</template>

<script>
import RemixIcon from '../RemixIcons.vue'

export default {
    components: {
        RemixIcon
    },
    data() {
        return {
            isHiddenHeading: true,
            isHiddenTable: true,
        }
    },
    props: {
        editor: {
            type: Object,
            default: null
        }
    }
}
</script>
