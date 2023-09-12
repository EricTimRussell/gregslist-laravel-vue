<template>
  <form>
    <div class="mb-8 mt-4 flex flex-wrap gap-2">
      <div class="flex flex-nowrap items-center">
        <input class="input-filter-l w-28" type="text" placeholder="Price from" />
        <input class="input-filter-r w-28" type="text" placeholder="Price to" />
      </div>

      <div class="flex flex-nowrap items-center">
        <select class="input-filter-l w-28">
          <option :value="null">Beds</option>
          <option v-for="n in 5" :key="n" :value="n">{{ n }}</option>
          <option>6+</option>
        </select>
        <select class="input-filter-r w-28">
          <option :value="null">Baths</option>
          <option v-for="n in 5" :key="n" :value="n">{{ n }}</option>
          <option>6+</option>
        </select>
      </div>

      <div class="flex flex-nowrap items-center">
        <input class="input-filter-l w-28" type="text" placeholder="Area from" />
        <input class="input-filter-r w-28" type="text" placeholder="Area to" />
      </div>
      <button class="btn-normal" type="submit">Filter</button>
      <button type="reset">Clear</button>
    </div>
  </form>
</template>

<script setup>

</script>
