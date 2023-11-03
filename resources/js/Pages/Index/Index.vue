<template>
  <div>
    <div class='flex flex-col gap-6 p-28 px-3 max-w-6xl mx-auto'>
      <h1 class='text-slate-700 font-bold text-3xl lg:text-6xl'>
        Find your next <span class='text-slate-500'>place</span>
        <br />
        to call it Home
      </h1>
      <div class='text-gray-500 text-xs sm:text-sm'>
        EXE ESTATES is the best place to find your next perfect place to
        live.
        <br />
        We have a wide range of properties for you to choose from.
      </div>
      <Link :href="route('listing.index')" class='text-xs sm:text-sm text-blue-800 font-bold hover:underline'>
      Lets explore listings...
      </Link>

      <div class="grid grid-flow-col grid-rows-2 grid-cols-3 gap-8">
        <div class="transform scale-110 -rotate-6 translate-y-10">
          <img src="./h1.jpg" alt="" loading="lazy">
        </div>
        <div class="col-start-3 transform scale-75 rotate-6 translate-x-2 translate-y-15">
          <img src="./h2.jpg" alt="" loading="lazy">
        </div> 
        <div class="transform scale-150 translate-y-11">
          <img src="./h3.jpg" alt="" loading="lazy">
        </div>
        <div class="transform translate-y-24">
          <img src="./h4.jpg" alt="" loading="lazy">
        </div>
        <div class="row-start-1 col-start-2 col-span-2 transform translate-x-10 translate-y-4">
          <img src="./h2.avif" alt="" loading="lazy">
        </div>
      </div>
    
    </div>
      

      
    


    <!-- {/* swiper */} -->
    <!-- <Swiper navigation>
        {offerListings &&
          offerListings.length > 0 &&
          offerListings.map((listing) => (
            <SwiperSlide>
              <div
                style={{
                  background: `url(${listing.imageUrls[0]}) center no-repeat`,
                  backgroundSize: 'cover',
                }}
                class='h-[500px]'
                key={listing._id}
              ></div>
            </SwiperSlide>
          ))}
      </Swiper> -->

    <!-- {/* listing results for offer, sale and rent */} -->

    <!-- <div class='max-w-6xl mx-auto p-3 flex flex-col gap-8 my-10'>
        
          <div class=''>
            <div class='my-3'>
              <h2 class='text-2xl font-semibold text-slate-600'>Recent offers</h2>
              <Link class='text-sm text-blue-800 hover:underline' >Show more offers</Link>
            </div>
            <div class='flex flex-wrap gap-4'>
              {offerListings.map((listing) => (
                <ListingItem listing={listing} key={listing._id} />
              ))}
            </div>
          </div>
        
       
          <div class=''>
            <div class='my-3'>
              <h2 class='text-2xl font-semibold text-slate-600'>Recent places for rent</h2>
              <Link class='text-sm text-blue-800 hover:underline' >Show more places for rent</Link>
            </div>
            <div class='flex flex-wrap gap-4'>
              {rentListings.map((listing) => (
                <ListingItem listing={listing} key={listing._id} />
              ))}
            </div>
          </div>
      
        
          <div class=''>
            <div class='my-3'>
              <h2 class='text-2xl font-semibold text-slate-600'>Recent places for sale</h2>
              <Link class='text-sm text-blue-800 hover:underline' >Show more places for sale</Link>
            </div>
            <div class='flex flex-wrap gap-4'>
              {saleListings.map((listing) => (
                <ListingItem listing={listing} key={listing._id} />
              ))}
            </div>
          </div> 
          
        </div>
      -->
  </div>
</template>

<script setup>
import { Link } from '@inertiajs/inertia-vue3'
// defineProps({ message: String })
</script>