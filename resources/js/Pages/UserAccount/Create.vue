<template>
  <form @submit.prevent="register">
    <div class="w-1/2 mx-auto">
      <div>
        <label class="label" for="name">Your Name</label>
        <input v-model="form.name" type="text" id="name" class="input" />
        <div class="input-error" v-if="form.errors.name">{{ form.errors.name }}</div>
      </div>
      <div class="mt-4">
        <label class="label" for="email">Email</label>
        <input v-model="form.email" type="text" id="email" class="input" />
        <div class="input-error" v-if="form.errors.email">{{ form.errors.email }}</div>
      </div>
      <div class="mt-4">
        <label class="label" for="password">Password</label>
        <input v-model="form.password" type="password" id="password" class="input" />
        <div class="input-error" v-if="form.errors.password">{{ form.errors.password }}</div>
      </div>
      <div class="mt-4">
        <label class="label" for="password_confirmation">Confirm Password</label>
        <input v-model="form.password_confirmation" type="password" id="password_confirmation" class="input" />
      </div>
      <div class="mt-4">
        <button class="btn-primary w-full" type="submit">Create Account</button>
      </div>
      <div class="mt-2 text-center">
        <Link :href="route('login')" class="text-sm text-gray-500">Already have an account?</Link>
      </div>
    </div>
  </form>
</template>

<script setup>
import { useForm, Link } from "@inertiajs/vue3";


const form = useForm({
  name: null,
  email: null,
  password: null,
  password_confirmation: null
})

// @ts-ignore
const register = () => form.post(route('user-account.store'))
</script>
