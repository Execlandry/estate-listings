<template>
  <div class='ml-8 bg-gray-100 dark:bg-slate-900 shadow-md hover:shadow-lg transition-shadow overflow-hidden rounded-lg w-full sm:w-[330px]'>  

    <Link :href="route('listing.show', { listing: listing.id })">

      <div class='p-3 flex flex-col gap-6 w-full'>
      <!-- <p class='truncate text-lg font-semibold text-slate-700'>
          {listing.name}
        </p> -->

      <!-- location -->
      <div class='flex items-center gap-1'>

        <MapPinIcon class='h-4 w-4 text-red-700' />

        <p class='text-sm text-gray-600 truncate w-full'>
          <ListingAddress :listing="listing" class="intext-color" />
        </p>

      </div>


      <!-- <p class='text-sm text-gray-600 line-clamp-2'>
          {listing.description}
        </p> -->



      <!-- price tags -->
      <p class='text-slate-500 mt-2 font-semibold flex items-center gap-1 flex-col'>
        <Price :price="listing.price" class="text-2xl font-bold intext-color" />

        <span class=" intext-color">or</span>
      <div class="text-xs intext-color">
        <Price :price="monthlyPayment" /> per month
      </div>
      </p>


      <div class='flex gap-4 justify-center'>
        <ListingSpace :listing="listing" class="text-lg intext-color" />
      </div>
    </div>


  </Link>
  </div>


  <!-- <div>
      <Link :href="route('listing.show', { listing: listing.id })">

      <div class="flex items-center gap-1">
        <Price :price="listing.price" class="text-2xl font-bold" />
        <div class="text-xs text-gray-500">
          <Price :price="monthlyPayment" /> pm
        </div>
      </div>



      <ListingSpace :listing="listing" class="text-lg" />


      <ListingAddress :listing="listing" class="text-gray-400" />
      </Link>
    </div> -->
</template>

<script setup>
import { Link } from '@inertiajs/inertia-vue3'
import ListingAddress from '@/Components/ListingAddress.vue'

import ListingSpace from '@/Components/ListingSpace.vue'
import Price from '@/Components/Price.vue';
import EmptyState from '@/Components/UI/EmptyState.vue'
import { useMonthlyPayment } from '@/Composables/useMonthlyPayment'

import { MapPinIcon } from '@heroicons/vue/24/outline'

const props = defineProps({
  listing: Object
})

const { monthlyPayment } = useMonthlyPayment(
  props.listing.price, 2.5, 25,
)
</script>