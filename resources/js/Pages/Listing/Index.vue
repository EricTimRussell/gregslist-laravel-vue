<template>
  <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-3">
    <Box v-for="listing in listings" :key="listing.id">
      <div>
        <Link :href="`listing/${listing.id}`">
        <ListingAddress :listing="listing" />
        </Link>
      </div>
      <div>
        <Link :href="`listing/${listing.id}/edit`">
        Edit
        </Link>
      </div>
      <div>
        <Link as="button" :href="`listing/${listing.id}`" method="DELETE">Delete</Link>
      </div>
    </Box>
  </div>
</template>

<script setup>
import { Link } from "@inertiajs/vue3"
import ListingAddress from '@/Components/ListingAddress.vue'
import Box from '@/Components/UI/Box.vue'

defineProps({
  listings: { type: Array, required: true }
})
</script>

<style lang="scss" scoped></style>