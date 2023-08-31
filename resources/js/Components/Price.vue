<template>
  <span>
    {{ formattedPrice }}
  </span>
</template>

<script setup>
import { computed } from 'vue'

const props = defineProps({
  price: { type: Number || String, required: true }
})

const formattedPrice = computed(() =>
  Number(props.price).toLocaleString('en-US', {
    style: 'currency',
    currency: 'USD',
    maximumFractionDigits: 0
  })
)
</script>
