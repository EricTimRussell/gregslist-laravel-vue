<template>
  <Link href="/">Home </Link>
  <Link href="/hello">Show Page</Link>
  <div v-if="flashSuccess" class="success">
    {{ flashSuccess }}
  </div>
  <slot></slot>
</template>

<script setup>
import { Link, usePage } from "@inertiajs/vue3"
import { computed } from 'vue'
// page.props.value.flash.success
const page = usePage()
const flashSuccess = computed(() =>
  page.props.flash.success
)
</script>

<style scoped>
.success {
  background-color: green;
  color: white;
}
</style>