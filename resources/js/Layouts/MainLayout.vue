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
        <div class="flex items-center gap-4" v-if="user">
          <Link :href="route('user-account.index')" class="text-sm text-gray-400">{{ user.name }}</Link>
          <Link href="/listing/create" class="btn-primary">+
          New Listing
          </Link>
          <Link as="button" :href="route('logout')" method="delete">Logout</Link>
        </div>
        <div v-else class="flex items-center gap-2">
          <Link :href="route('user-account.create')">Register</Link>
          <span>||</span>
          <Link :href="route('login')">Sign-In</Link>
        </div>
      </nav>
    </div>
  </header>

  <main class="container mx-auto p-4 w-full">
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
const user = computed(() =>
  page.props.user
)
</script>
