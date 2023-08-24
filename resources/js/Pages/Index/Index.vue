<template>
  <h1>Index Page</h1>
  <div>
    <Link href="/hello">Hello Page</Link>
  </div>
  <div>
    The message from Laravel is {{ message }}
  </div>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
const props = defineProps({
  message: { type: String, required: true }
}

)
</script>

<style lang="scss" scoped></style>