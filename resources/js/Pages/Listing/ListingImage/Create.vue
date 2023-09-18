<template>
  <Box>
    <template #header>Upload New Images</template>
    <form @submit.prevent="upload" enctype="multipart/form-data">
      <input type="file" multiple @input="addFiles" />
      <button class="btn-outline" type="submit">Upload</button>
      <button class="btn-outline" type="reset" @click="reset">Reset</button>
    </form>
  </Box>
</template>

<script setup lang="">
import Box from '@/Components/UI/Box.vue'
import { useForm } from '@inertiajs/vue3'

const props = defineProps({
  listing: { type: Object, required: false }
})

const form = useForm({
  images: [],
})
const upload = () => {
  form.post(
    route('listing.image.store', { listing: props.listing.id }),
    {
      onSuccess: () => form.reset('images'),
    },
  )
}
const addFiles = (event) => {
  for (const image of event.target.files) {
    form.images.push(image)
  }
}
const reset = () => form.reset('images')
</script>

