<template>
  <div v-click-away="hideMenu" >
    <ul class="relative space-y-2 sm:bottom-16 lg:bottom-0">
      <transition v-for="email in emails" :key="email.id" name="fade">
        <li v-show="visible" class="transform" :class="email.classes">
          <a href="#" class="bg-white hover-bg-gray-100 w-80 sm:w-72 lg:w-96 shadow-md border rounded-lg px-4 py-4 flex items-center">
            <!-- <img :src="email.image" alt="avatar" class="rounded-full w-10 h-10"> -->
            <div class="ml-4">
              <div class="font-semibold">{{ email.subject }}</div>
              <div class="text-left text-gray-700">{{ email.sender }}</div>
            </div>
          </a>
        </li>
      </transition>
    </ul>
    <button @click="$emit('myEvent',visible = !visible)" class="bg-white hover:bg-gray-100 w-80 sm:w-72 lg:w-96 shadow-md border rounded-lg px-4 py-4 flex items-center -mt-16 sm:-mt-12 lg:-mt-1 mr-3">
      <img src="./star.png" alt="avatar" class="rounded-full w-15 h-9">
      <div class="ml-4 flex flex-col ">
        <div class="font-semibold">Tap me!</div>
        <div class="text-center text-gray-700">To get an insight on our Buyers Reviews</div>
      </div>
    </button>
  </div>
</template>

<script>
import { mixin as VueClickAway } from "vue3-click-away";

export default {
  mixins: [VueClickAway],
  data() {
    return {
      visible: false,
      emails: [
        {
          id: 1,
          subject: `John smith`,
          sender: `The estate exceeded my expectations. The modern amenities and spacious interiors make it the perfect choice. I'm thrilled with my new home.`,
          image: `resources/js/Pages/Index/h1.jpg`,
          classes: 'translate-x-16 rotate-12',
        },
        {
          id: 2,
          subject: 'Emily Davis',
          sender: `I fell in love with this estate the moment I stepped inside. It's not just a house; it's a sanctuary. The neighborhood is friendly, and I'm so happy to live here.`,
          image: 'resources/js/Pages/Index/h2.avif',
          classes: 'translate-x-10 rotate-10',
        },
        {
          id: 3,
          subject: 'Michael Wilson',
          sender: `I'm impressed by the quality of construction and attention to detail in this estate. The location is convenient, and the estate management is top-notch.`,
          image: 'https://s3.amazonaws.com/uifaces/faces/twitter/lowie/128.jpg',
          classes: 'translate-x-6 rotate-8',
        },
        {
          id: 4,
          subject: 'Sophia Lee',
          sender: `This estate is a hidden gem. The beautiful architecture and tranquil surroundings make it a truly special place. I couldn't be happier with my decision to move here.`,
          image: 'https://s3.amazonaws.com/uifaces/faces/twitter/emileboudeling/128.jpg',
          classes: 'translate-x-4 rotate-6',
        },
      ],
    }
  },
  methods: {
    hideMenu() {
      this.visible = false
    }
  }
}
</script>

<style>
.fade-enter-active, .fade-leave-active {
  transition: all .15s ease-in;
}
.fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
  transform: translate(0px, 100px) rotate(0deg) !important;
  opacity: 0;
}
</style>