<template>
  <form method="POST" :action="route('listing.image.store', { listing: listing?.id })">
    <input type="file" multiple name="files" />
    <button type="submit">Submit</button>
  </form>
</template>

<script setup lang="">

const props = defineProps({
  listing: { type: Object, required: false }
})
</script>

