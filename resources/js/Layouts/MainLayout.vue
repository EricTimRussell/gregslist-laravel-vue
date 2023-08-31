<template>
  <header class="border-b border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-slate-700 w-full">
    <div class="container mx-auto">
      <nav class="p-4 flex items-center justify-between">
        <div class="text-lg font-medium">
          <Link href="/listing">Listings</Link>
        </div>
        <div class="text-xl text-indigo-600 dark:text-indigo-300 font-bold text-center">
          <Link href="/listing">GregsList</Link>
        </div>
        <div>
          <Link href="/listing/create"
            class="bg-indigo-600 hover:bg-indigo-500 text-white font-medium p-2 rounded-md shadow-lg">+
          New Listing
          </Link>
        </div>
      </nav>
    </div>
  </header>

  <main class="container mx-auto p-4">
    <div v-if="flashSuccess"
      class="mb-4 border rounded-md  shadow-sm border-green-300 dark:border-green-800 bg-green-100 dark:bg-green-900 p-2">
      {{ flashSuccess }}
    </div>
    <slot></slot>
  </main>
</template>

<script setup>
import { Link, usePage } from "@inertiajs/vue3"
import { computed } from 'vue'
const page = usePage()
const flashSuccess = computed(() =>
  page.props.flash.success
)
</script>
