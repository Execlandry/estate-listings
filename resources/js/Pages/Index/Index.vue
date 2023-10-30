<template>
  <div>
      <div class='flex flex-col gap-6 p-28 px-3 max-w-6xl mx-auto'>
        <h1 class='text-slate-700 font-bold text-3xl lg:text-6xl'>
          Find your next <span class='text-slate-500'>perfect</span>
          <br />
          place with ease
        </h1>
        <div class='text-gray-500 text-xs sm:text-sm'>
           EXE ESTATES is the best place to find your next perfect place to
          live.
          <br />
          We have a wide range of properties for you to choose from.
        </div>
        <Link :href="route('listing.index')" 
          class='text-xs sm:text-sm text-blue-800 font-bold hover:underline'
        >
          Lets explore listings...
        </Link>

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