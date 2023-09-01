<template>
  <form @submit.prevent="form.put(`/listing/${props.listing.id}`)">
    <div class="grid grid-cols-6 gap-4">
      <div class="col-span-2">
        <label class="label">Beds</label>
        <input v-model.number="form.beds" type="text" class="input" />
        <div v-if="form.errors.beds">{{ form.errors.beds }}</div>
      </div>

      <div class="col-span-2">
        <label class="label">Baths</label>
        <input class="input"
          v-model.number="form.baths" type="text" />
        <div v-if="form.errors.baths">{{ form.errors.baths }}</div>

      </div>

      <div class="col-span-2">
        <label class="label">Area</label>
        <input class="input"
          v-model.number="form.area" type="text" />
        <div v-if="form.errors.area">{{ form.errors.area }}</div>
      </div>

      <div class="col-span-4">
        <label class="label">City</label>
        <input class="input"
          v-model="form.city" type="text" />
        <div v-if="form.errors.city">{{ form.errors.city }}</div>
      </div>

      <div class="col-span-2">
        <label class="label">Post Code</label>
        <input class="input"
          v-model="form.code" type="text" />
        <div v-if="form.errors.code">{{ form.errors.code }}</div>
      </div>

      <div class="col-span-4">
        <label class="label">Street</label>
        <input class="input"
          v-model="form.street" type="text" />
        <div v-if="form.errors.street">{{ form.errors.street }}</div>
      </div>

      <div class="col-span-2">
        <label class="label">Street #</label>
        <input class="input"
          v-model.number="form.street_nr" type="text" />
        <div v-if="form.errors.street_nr">{{ form.errors.street_nr }}</div>
      </div>

      <div class="col-span-6">
        <label class="label">Price</label>
        <input class="input"
          v-model.number="form.price" type="text" />
        <div v-if="form.errors.price">{{ form.errors.price }}</div>
      </div>

      <div class="col-span-6">
        <button type="submit" :disabled="form.processing"
          class="btn-primary">Create</button>
      </div>
    </div>
  </form>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3'

const props = defineProps({
  listing: { type: Object, required: true }
})

const form = useForm({
  beds: props.listing.beds,
  baths: props.listing.baths,
  area: props.listing.area,
  city: props.listing.city,
  street: props.listing.street,
  code: props.listing.code,
  street_nr: props.listing.street_nr,
  price: props.listing.price
})

</script>

<style scoped>
label {
  margin-right: 2em;
}

div {
  padding: 2px
}
</style>