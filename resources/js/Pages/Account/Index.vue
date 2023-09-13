<template>
  <div>
    <h1 class="text-3xl mb-4">Your Listings</h1>
    <section class="mb-4">
      Filters
    </section>
    <section class="grid grid-cols-1 lg:grid-cols-2 gap-2">
      <Box v-for="listing in listings" :key="listing.id">
        <div class="flex flex-col md:flex-row gap-2 md:items-center justify-between">
          <div>Left</div>
          <div>Right</div>
        </div>
      </Box>
    </section>
  </div>
</template>

<script setup>
// @ts-ignore
import Box from '@/Components/UI/Box.vue'

defineProps({ listings: { type: Object, required: true } })
</script>

<style lang="scss" scoped></style>