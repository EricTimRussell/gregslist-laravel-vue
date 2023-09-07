<template>
  <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-3">
    <Box v-for="listing in listings" :key="listing.id" class="hover:scale-105 hover:bg-slate-800 cursor-pointer">
      <div>
        <Link :href="`listing/${listing.id}`">
        <div class="flex items-center gap-1">
          <Price :price="listing.price" class="text-2xl font-bold" />
        </div>
        <ListingSpace :listing="listing" class="text-large" />
        <ListingAddress :listing="listing" class="text-gray-500" />
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
import ListingSpace from '@/Components/ListingSpace.vue'
import Price from '@/Components/Price.vue'
import Box from '@/Components/UI/Box.vue'

defineProps({
  listings: { type: Array, required: true }
})
</script>

<style lang="scss" scoped></style>