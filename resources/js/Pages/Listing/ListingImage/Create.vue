<template>
  <Box>
    <template #header>Upload New Images</template>
    <form @submit.prevent="upload" enctype="multipart/form-data">
      <section class="flex items-center gap-2 m-4">
        <input class="input-file" type="file" multiple @input="addFiles" />
        <button :disabled="!canUpload" class="btn-outline disabled:opacity-25 disabled:cursor-not-allowed"
          type="submit">Upload</button>
        <button class="btn-outline" type="reset" @click="reset">Reset</button>
      </section>
    </form>
  </Box>
</template>

<script setup lang="">
import { computed } from "vue";
import Box from '@/Components/UI/Box.vue'
import { useForm, router } from '@inertiajs/vue3'
import NProgress from "nprogress";

const props = defineProps({
  listing: { type: Object, required: false }
})

router.on('progress', (event) => {
  if (event.detail.progress.percentage) {
    NProgress.set((event.detail.progress.percentage / 100) * 0.9)
  }
})

const form = useForm({
  images: [],
})

const canUpload = computed(()=> form.images.length)

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

