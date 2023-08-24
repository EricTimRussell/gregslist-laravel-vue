<template>
  <h1>Index Page</h1>
  <div>
    The message from Laravel is {{ message }}
  </div>
</template>

<script setup>
const props = defineProps({
  message: { type: String, required: true }
}

)
</script>

<!-- Must use export default option for layouts to remain persistant with inertia-->
<script>
import MainLayout from "../../Layouts/MainLayout.vue";
export default {
  layout: MainLayout
}
</script>

<style lang="scss" scoped></style>