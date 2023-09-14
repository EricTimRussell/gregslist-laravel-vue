<template>
  <form action="">
    <div class="mb-4 mt-4 flex flex-wrap gap-2">
      <div class="flex flex-nowrap items-center gap-2">
        <input id="deleted" type="checkbox" v-model="filterForm.deleted"
          class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500" />
        <label for="deleted">Deleted</label>
      </div>
    </div>
  </form>
</template>

<script setup>
import { reactive, watch } from 'vue'
import { router } from '@inertiajs/vue3'
// @ts-ignore
import { debounce } from 'lodash'

const filterForm = reactive({
  deleted: false
})

watch(
  // debounce adds a custom delay so that forms cannot be spammed
  filterForm, debounce(() => router.get(
    // @ts-ignore
    route('user-account.index'),
    filterForm,
    { preserveState: true, preserveScroll: true }),
    1000,
  ))
</script>

<style lang="scss" scoped></style>