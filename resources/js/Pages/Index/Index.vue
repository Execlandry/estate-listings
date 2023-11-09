<template>
  <div class="py-8 px-4 sm:px-6 flex flex-col lg:px-28">
    <div class="flex flex-row lg:flex-row">
      <div class="lg:w-2/3">
        <!-- Left Content -->
        <div class="flex flex-col gap-6">
          <h1 class="text-slate-700 font-bold text-2xl sm:text-3xl lg:text-6xl">
            Find your next <span class="text-blue-500">place</span>
            <br />
            to call it Home
          </h1>
          <div class="text-gray-500 text-xs sm:text-sm lg:text-base">
            EXE ESTATES is the best place to find your next perfect place to live.
            <br />
            We have a wide range of properties for you to choose from.
          </div>

          <!-- Blinking Animation -->
          <div class="mt-10 flex items-center justify-start">
            <div class="bg-white hover:bg-gray-100 p-4 rounded-lg shadow-lg animate-pulse">
              <Link :href="route('listing.index')">
              <div class="text-center">
                <h2 class="text-2xl font-semibold">Considering to buy property?</h2>
                <p class="text-gray-600">Explore all the estates enlisted here.</p>
              </div>
              </Link>
            </div>
          </div>


          <div class="mt-12" v-if="showOurStory">
            <h1 class="text-slate-700 font-bold text-2xl sm:text-3xl lg:text-3xl">Our Story</h1>
            <Box>
              <p>

                Beyond the beautiful properties and the personal touch of our agents, only one brand can deliver a
                lifestyle
                that caters to you. With a network of homes for sale worldwide, our website lets you search property
                listings
                globally, and includes a large inventory of luxury homes for sale, including houses, condos, townhomes,
                villas, and more.
              </p>
            </Box>
          </div>
        </div>


        <!-- --------duh -->



      </div>

      <div class="lg:w-1/3 flex flex-col justify-end">
        <!-- Right Content (Card Stack) -->
        <CardStack @call-child="handleChildClick" :showOurStory="showOurStory"
        />
      </div>
    </div>


    <div class="mt-20">
      <div class="grid grid-flow-col grid-rows-2 grid-cols-3 gap-8 ">
        <div class="transform scale-110 -rotate-6 translate-y-40 ">
          <img class="border-black border-4" src="./h1.jpg" alt="" loading="lazy">
        </div>




        <div class="col-start-3 transform scale-75 rotate-6 translate-x-2 translate-y-15">
          <img class="border-black border-4" src="./h2.jpg" alt="" loading="lazy">
        </div>


        <div class="transform scale-150 translate-y-11">
          <img class="border-black border-4" src="./h2.avif" alt="" loading="lazy">
        </div>

        <div class="transform translate-y-40 -rotate-8 translate-x-40 scale-150 ">
          <img class="border-black border-4" src="./h3.jpg" alt="" loading="lazy">
        </div>


        <div class="row-start-1 col-start-2 col-span-2 transform translate-x-20 translate-y-20 rotate-6 scale-110">
          <img class="border-black border-4" src="./h4.jpg " alt="" loading="lazy">
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import CardStack from '@/Pages/Index/Components/CardStack.vue';
import { Link } from '@inertiajs/inertia-vue3';
import Box from '@/Components/UI/Box.vue';

export default{
  components:{
    CardStack,
    Box,
    Link
  },
  data() {
    return {
      showOurStory: false, // Initially show the "Our Story" div
    };
  },
  methods:{
    hideOurStory(){
      this.showOurStory = false;
      
    }
  }
}

</script>
