<template>
  <form @submit.prevent="login">
    <div class="w-1/2 mx-auto">
      <div>
        <label class="label" for="email">Email</label>
        <input v-model="form.email" type="text" id="email" class="input" />
        <div class="input-error">Potential errors</div>
      </div>
      <div class="mt-4">
        <label class="label" for="password">Password</label>
        <input v-model="form.password" type="password" id="password" class="input" />
      </div>
      <div class="mt-4">
        <button class="btn-primary w-full" type="submit">Login</button>
      </div>
    </div>
  </form>
</template>

<script setup>
import { useForm } from "@inertiajs/vue3";


const form = useForm({
  email: null,
  password: null
})

// @ts-ignore
const login = () => form.post(route('login.store'))
</script>

