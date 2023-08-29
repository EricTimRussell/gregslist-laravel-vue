<template>
  <div v-for="listing in listings" :key="listing.id">
    <Link :href="`listing/${listing.id}`">
    {{ listing.city }} {{ listing.street_nr }}, {{ listing.city }}, for {{ listing.price }}
    </Link>
  </div>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";

defineProps({
  listings: { type: Array, required: true }
})
</script>

<style lang="scss" scoped></style>