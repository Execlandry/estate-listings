<template>
  <form @submit.prevent="create">
    <div class="space-y-12">
      <!-- <div class="border-b border-gray-900/10 pb-12">
      <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6"></div>
    </div> -->

      <div class=" border-b border-gray-900/10 pb-12">
        <h2 class="text-base font-semibold leading-7 text-gray-900 dark:text-gray-300">Estates Information</h2>
        <p class="mt-1 text-sm leading-6 text-gray-600 dark:text-gray-200">Fill this with appropriate details about your property.</p>

        <div class="mt-5 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-2">
          <div class=" md:col-span-3">
            <label for="beds" class="label">Beds</label>

            <div class="mt-2">
              <input v-model.number="form.beds" type="text" name="beds" id="beds"
                class="input" />

              <div v-if="form.errors.beds">
                {{ form.errors.beds }}
              </div>

            </div>
          </div>

          <div class= "md:col-span-3">
            <label for="baths" class="label">Baths</label>
            <div class="mt-2">
              <input v-model.number="form.baths" type="text" name="baths" id="baths"
                class="input" />

              <div v-if="form.errors.baths">
                {{ form.errors.baths }}
              </div>
            </div>
          </div>


          <div class=" md:col-span-3">
            <label for="area" class="label">Area</label>
            <div class="mt-2">
              <input v-model.number="form.area" id="area" name="area" type="text" autocomplete="area"
                class="input" />
              <div v-if="form.errors.area" class="input-error" >
                {{ form.errors.area }}
              </div>
            </div>
          </div>

          <div class=" md:col-span-3">
            <label for="price" class="label">Price</label>
            <div class="mt-2">
              <input v-model.number="form.price" type="text" name="price" id="price"
                class="input" />
              <div v-if="form.errors.price" class="input-error">
                {{ form.errors.price }}
              </div>
            </div>
          </div>

          <div class="sm:col-span-2 sm:col-start-1">
            <label for="city" class="label">City</label>
            <div class="mt-2">
              <input v-model="form.city" type="text" name="city" id="city" autocomplete="city"
                class="input" />
              <div v-if="form.errors.city" class="input-error">
                {{ form.errors.city }}
              </div>
            </div>
          </div>

          <div class="md:col-span-2">
            <label for="postal-code" class="label">ZIP / Postal code</label>
            <div class="mt-2">
              <input v-model="form.code" type="text" name="postal-code" id="postal-code" autocomplete="postal-code"
                class="input">
              <div v-if="form.errors.code" class="input-error">
                {{ form.errors.code }}
              </div>

            </div>
          </div>

          <div class="md:col-span-3">
            <label for="street-address" class="label">Street address</label>
            <div class="mt-2">
              <input v-model="form.street" type="text" name="street-address" id="street-address"
                autocomplete="street-address"
                class="input" />
              <div v-if="form.errors.street" class="input-error">
                {{ form.errors.street }}
              </div>
            </div>
          </div>


          <div class="sm:col-span-2">
            <label for="streetnr" class="label">Street Number</label>
            <div class="mt-2">
              <input v-model.number="form.street_nr" type="text" name="streetnr" id="streetnr"
                class="input" />
              <div v-if="form.errors.street_nr" class="input-error">
                {{ form.errors.street_nr }}
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="mt-6 flex items-center justify-end gap-x-6">
      <button type="button" class="secondary-btn">Cancel</button>
      <button type="submit"
        class="primary-btn">Save</button>
    </div>
  </form>



  <!-- <form @submit.prevent="create">
    <div class="grid grid-cols-6 gap-4">
      <div class="col-span-2">
        <label>Beds</label>
        <input v-model.number="form.beds" type="text" />
        <div v-if="form.errors.beds" class="input-error>
          {{ form.errors.beds }}
        </div>
      </div>

      <div class="col-span-2">
        <label>Baths</label>
        <input v-model.number="form.baths" type="text" />
        <div v-if="form.errors.baths class="input-error">
          {{ form.errors.baths }}
        </div>
      </div>

      <div class="col-span-2">
        <label>Area</label>
        <input v-model.number="form.area" type="text" />
        <div v-if="form.errors.area" class="input-error>
          {{ form.errors.area }}
        </div>
      </div>

      <div class="col-span-4">
        <label>City</label>
        <input v-model="form.city" type="text" />
        <div v-if="form.errors.city" class="input-error>
          {{ form.errors.city }}
        </div>
      </div>

      <div class="col-span-2">
        <label>Post Code</label>
        <input v-model="form.code" type="text" />
        <div v-if="form.errors.code" class="input-error>
          {{ form.errors.code }}
        </div>
      </div>

      <div class="col-span-4">
        <label>Street</label>
        <input v-model="form.street" type="text" />
        <div v-if="form.errors.stree class="input-errort">
          {{ form.errors.street }}
        </div>
      </div>

      <div class="col-span-2">
        <label>Street Nr</label>
        <input v-model.number="form.street_nr" type="text" />
        <div v-if="form.errors.stree class="input-errort_nr">
          {{ form.errors.street_nr }}
        </div>
      </div>

      <div>
        <label>Price</label>
        <input v-model.number="form.price" type="text" />
        <div v-if="form.errors.price class="input-error">
          {{ form.errors.price }}
        </div>
      </div>

      <div>
        <button type="submit">Create</button>
      </div>
    </div>
  </form>
 -->

  <!-- display main content
  <main class="py-6 px-4 sm:p-6 md:py-10 md:px-8">
  <div class="max-w-4xl mx-auto grid grid-cols-1 lg:max-w-5xl lg:gap-x-20 lg:grid-cols-2">
    <div class="relative p-3 col-start-1 row-start-1 flex flex-col-reverse rounded-lg bg-gradient-to-t from-black/75 via-black/0 sm:bg-none sm:row-start-2 sm:p-0 lg:row-start-1">
      <h1 class="mt-1 text-lg font-semibold text-white sm:text-slate-900 md:text-2xl dark:sm:text-white">Beach House in Collingwood</h1>
      <p class="text-sm leading-4 font-medium text-white sm:text-slate-500 dark:sm:text-slate-400">Entire house</p>
    </div>
    <div class="grid gap-4 col-start-1 col-end-3 row-start-1 sm:mb-6 sm:grid-cols-4 lg:gap-6 lg:col-start-2 lg:row-end-6 lg:row-span-6 lg:mb-0">
      <img src="/beach-house.jpg" alt="" class="w-full h-60 object-cover rounded-lg sm:h-52 sm:col-span-2 lg:col-span-full" loading="lazy">
      <img src="/beach-house-interior-1.jpg" alt="" class="hidden w-full h-52 object-cover rounded-lg sm:block sm:col-span-2 md: lg:row-start-2 lg:col-span-2 lg:h-32" loading="lazy">
      <img src="/beach-house-interior-2.jpg" alt="" class="hidden w-full h-52 object-cover rounded-lg md:block lg:row-start-2 lg:col-span-2 lg:h-32" loading="lazy">
    </div>
    <dl class="mt-4 text-xs font-medium flex items-center row-start-2 sm:mt-1 sm:row-start-3 md:mt-2.5 lg:row-start-2">
      <dt class="sr-only">Reviews</dt>
      <dd class="text-indigo-600 flex items-center dark:text-indigo-400">
        <svg width="24" height="24" fill="none" aria-hidden="true" class="mr-1 stroke-current dark:stroke-indigo-500">
          <path d="m12 5 2 5h5l-4 4 2.103 5L12 16l-5.103 3L9 14l-4-4h5l2-5Z"  stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
        <span>4.89 <span class="text-slate-400 font-normal">(128)</span></span>
      </dd>
      <dt class="sr-only">Location</dt>
      <dd class="flex items-center">
        <svg width="2" height="2" aria-hidden="true" fill="currentColor" class="mx-3 text-slate-300">
          <circle cx="1" cy="1" r="1" />
        </svg>
        <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-1 text-slate-400 dark:text-slate-500" aria-hidden="true">
          <path d="M18 11.034C18 14.897 12 19 12 19s-6-4.103-6-7.966C6 7.655 8.819 5 12 5s6 2.655 6 6.034Z" />
          <path d="M14 11a2 2 0 1 1-4 0 2 2 0 0 1 4 0Z" />
        </svg>
        Collingwood, Ontario
      </dd>
    </dl>
    <div class="mt-4 col-start-1 row-start-3 self-center sm:mt-0 sm:col-start-2 sm:row-start-2 sm:row-span-2 lg:mt-6 lg:col-start-1 lg:row-start-3 lg:row-end-4">
      <button type="button" class="bg-indigo-600 text-white text-sm leading-6 font-medium py-2 px-3 rounded-lg">Check availability</button>
    </div>
    <p class="mt-4 text-sm leading-6 col-start-1 sm:col-span-2 lg:mt-6 lg:row-start-4 lg: dark:text-slate-400">
      This sunny and spacious room is for those traveling light and looking for a comfy and cosy place to lay their head for a night or two. This beach house sits in a vibrant neighborhood littered with cafes, pubs, restaurants and supermarkets and is close to all the major attractions such as Edinburgh Castle and Arthur's Seat.
    </p>
  </div>
</main> -->
</template>

<script setup>
import { useForm } from '@inertiajs/inertia-vue3'

const form = useForm({
  beds: 0,
  baths: 0,
  area: 0,
  city: null,
  street: null,
  code: null,
  street_nr: null,
  price: 0,
})
const create = () => form.post(route('listing.store'))
</script>

<style scoped>
label {
  margin-right: 2em;
}

div {
  padding: 2px
}
</style>