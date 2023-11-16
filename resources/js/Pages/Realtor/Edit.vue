<template>
  <form @submit.prevent="update">
    <div class="space-y-12">
      <!-- <div class="border-b border-gray-900/10 pb-12">
      <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6"></div>
    </div> -->

      <div class=" border-b border-gray-900/10 pb-12">


        <div class="mt-5 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-2">
          <div class=" md:col-span-3">
            <label for="beds" class="label">Beds</label>

            <div class="mt-2">
              <input v-model.number="form.beds" type="text" name="beds" id="beds" class="input" />

              <div v-if="form.errors.beds">
                {{ form.errors.beds }}
              </div>

            </div>
          </div>

          <div class="md:col-span-3">
            <label for="baths" class="label">Baths</label>
            <div class="mt-2">
              <input v-model.number="form.baths" type="text" name="baths" id="baths" class="input" />

              <div v-if="form.errors.baths">
                {{ form.errors.baths }}
              </div>
            </div>
          </div>


          <div class=" md:col-span-3">
            <label for="area" class="label">Area</label>
            <div class="mt-2">
              <input v-model.number="form.area" id="area" name="area" type="text" autocomplete="area" class="input" />
              <div v-if="form.errors.area" class="input-error">
                {{ form.errors.area }}
              </div>
            </div>
          </div>

          <div class=" md:col-span-3">
            <label for="price" class="label">Price</label>
            <div class="mt-2">
              <input v-model.number="form.price" type="text" name="price" id="price" class="input" />
              <div v-if="form.errors.price" class="input-error">
                {{ form.errors.price }}
              </div>
            </div>
          </div>

          <div class="sm:col-span-2 sm:col-start-1">
            <label for="city" class="label">City</label>
            <div class="mt-2">
              <input v-model="form.city" type="text" name="city" id="city" autocomplete="city" class="input"
                @change="calCoordinates" />
              <div v-if="form.errors.city" class="input-error">
                {{ form.errors.city }}
              </div>
              <input type="text" id="display-lat" v-model="form.latitude" name="latitude" class="text-black" />
              <input type="text" id="display-lng" v-model="form.longitude" name="longitude" class="text-black" />


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
                autocomplete="street-address" class="input" @change="calCoordinates" />
              <div v-if="form.errors.street" class="input-error">
                {{ form.errors.street }}
              </div>
            </div>
          </div>


          <div class="sm:col-span-2">
            <label for="streetnr" class="label">Street Number</label>
            <div class="mt-2">
              <input v-model.number="form.street_nr" type="text" name="streetnr" id="streetnr" class="input" />
              <div v-if="form.errors.street_nr" class="input-error">
                {{ form.errors.street_nr }}
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>



    <div class="col-span-6">
      <button type="submit" class="primary-btn">update</button>
    </div>

  </form>
</template>

<script setup>
import { useForm } from '@inertiajs/inertia-vue3'

const props = defineProps({
  listing: Object,
})
const form = useForm({
  beds: props.listing.beds,
  baths: props.listing.baths,
  area: props.listing.area,
  city: props.listing.city,
  street: props.listing.street,
  code: props.listing.code,
  street_nr: props.listing.street_nr,
  price: props.listing.price,
  latitude: props.listing.latitude,
  longitude: props.listing.longitude,
})

const update = () => form.put(
  route('realtor.listing.update', { listing: props.listing.id }),
)

function calCoordinates() {
  var locationInputIds = ["city", "street-address"];
  var lat = 0;
  var lng = 0;
  geocodeLocation(locationInputIds, (latLng) => {
    form.latitude = latLng.lat;
    form.longitude = latLng.lng;
  });
}

function geocodeLocation(locationInputIds, callback) {
  var locations = locationInputIds.map(id => document.getElementById(id).value).join(" ");

  if (locations.trim()) {
    fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(locations)}`)
      .then(response => response.json())
      .then(data => {
        if (data.length > 0) {
          var lat = data[0].lat;
          var lon = data[0].lon;
          var latLng = L.latLng(lat, lon);
          callback(latLng);
        } else {
          alert("Location not found.");
        }
      })
      .catch(error => {
        console.error('Error:', error);
      });
  } else {
    alert("Please enter at least one location.");
  }
}
</script>
