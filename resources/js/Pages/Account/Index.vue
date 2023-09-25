<template>
  <div>
    <h1 class="text-3xl mb-4">Your Listings</h1>
    <section>
      <ItemsFilter :filters="filters" />
    </section>
    <section class="grid grid-cols-1 lg:grid-cols-2 gap-2">
      <Box v-for="listing in listings.data" :key="listing.id">
        <div class="flex flex-col md:flex-row gap-2 md:items-center justify-between">
          <div :class="{ 'opacity-25': listing.deleted_at }">
            <div class="xl:flex items-center gap-2">
              <Price :price="listing.price" class="text-2xl font-medium" />
              <ListingSpace :listing="listing" />
            </div>
            <ListingAddress :listing="listing" class="text-gray-500" />
          </div>
          <section>
            <div class="flex items-center gap-1 text-gray-600 dark:text-gray-300">
              <a :href="route('listing.show', { listing: listing.id })" class="btn-outline text-xs font-medium"
                target="_blank">Preview</a>
              <Link class="btn-outline text-xs font-medium" :href="route('listing.edit', { listing: listing.id })">
              Edit
              </Link>
              <Link v-if="!listing.deleted_at" as="button" method="delete" class="btn-outline text-xs font-medium"
                :href="route('listing.destroy', { listing: listing.id })">
              Delete</Link>
              <Link :href="route('listing.restore', { listing: listing.id })" as="button" method="put" v-else
                class="btn-outline text-xs font-medium">
              Restore
              </Link>
            </div>
            <div class="mt-2">
              <Link :href="route('listing.image.create', { listing: listing.id })"
                class="block w-full btn-outline text-xs font-medium text-center">Images
              ({{ listing.images_count }})
              </Link>
            </div>
            <div class="mt-2">
              <Link :href="route('user-account.show', { listing: listing.id, user_account: user })"
                class="block w-full btn-outline text-xs font-medium text-center">Offers
              ({{ listing.offers_count }})
              </Link>
            </div>
          </section>
        </div>
      </Box>
    </section>
    <section v-if="listings.total > 5" class="w-full flex justify-center m-4">
      <Pagination :links="listings.links" />
    </section>
  </div>
</template>

<script setup>
import Box from '@/Components/UI/Box.vue'
import Pagination from '@/Components/UI/Pagination.vue'
import Price from '@/Components/Price.vue'
import ListingSpace from '@/Components/ListingSpace.vue'
import ListingAddress from '@/Components/ListingAddress.vue'
import ItemsFilter from '../Account/Index/Components/ItemsFilter.vue'
import { Link, usePage } from "@inertiajs/vue3"
import { computed } from 'vue'
defineProps({
  listings: { type: Object, required: true },
  filters: { type: Object }
})

const page = usePage()
const user = computed(() =>
  page.props.user
)



</script>

<style lang="scss" scoped></style>