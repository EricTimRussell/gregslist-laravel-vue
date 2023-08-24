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



<style lang="scss" scoped></style>