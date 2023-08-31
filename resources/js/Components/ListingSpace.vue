<template>
  <div>
    <span class="font-bold">{{ listing.beds }} bds </span><span class="text-gray-400">|</span> <span class="font-bold">{{
      listing.baths }} ba </span>
    <span class="text-gray-400">|</span> <span class="font-bold">{{ listing.area }} ft²</span>
  </div>
</template>

<script setup>
defineProps({
  listing: { type: Object, required: true }
})
</script>