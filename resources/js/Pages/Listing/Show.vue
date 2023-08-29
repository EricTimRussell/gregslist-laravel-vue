<template>
  <div>
    {{ listings.city }} {{ listings.street_nr }}, {{ listings.city }}, for {{ listings.price }}
  </div>
</template>

<script setup>
defineProps({
  listings: { type: Object, required: true }
})
</script>

<style lang="scss" scoped></style>