<template>
  <component
    v-if="icon"
    :is="
      require(`vue-remix-icons/icons/ri-${icon}.js`)
        .default
    " fill="#6b7280"
  />
</template>
<script>
export default {
  props: {
    icon: String,
    // fill: Boolean,
  },
}


</script>
