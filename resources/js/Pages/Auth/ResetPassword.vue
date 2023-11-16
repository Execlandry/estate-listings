<!-- <template>
  <div>
    <form @submit.prevent="form.submit(submitForm)">
      <input type="hidden" name="token" :value="token" />

      <label for="email">Email:</label>
      <input type="email" name="email" v-model="form.email" />

      <label for="password">Password:</label>
      <input type="password" name="password" v-model="form.password" />

      <label for="password_confirmation">Confirm Password:</label>
      <input type="password" name="password_confirmation" v-model="form.password_confirmation" />

      <button type="submit">Reset Password</button>
    </form>
  </div>
</template>

<script setup>
import {  defineProps } from 'vue';
import { useForm } from '@inertiajs/inertia-vue3'

import { Inertia } from '@inertiajs/inertia';

const props = defineProps({ token: String });

const form =  useForm({
  token: props.token,
  email: '',
  password: '',
  password_confirmation: '',
});

const submitForm = () =>  form.post(
  route('password.update'), form.data);

</script> -->


<!-- <template>


works but directly posts to user reset table

  <div>
    <form @submit.prevent="submitForm">
      <input type="hidden" name="token" :value="token" />

      <label for="email">Email:</label>
      <input type="email" name="email" v-model="email" />

      <label for="password">Password:</label>
      <input type="password" name="password" v-model="password" />

      <label for="password_confirmation">Confirm Password:</label>
      <input type="password" name="password_confirmation" v-model="password_confirmation" />

      <button type="submit">Reset Password</button>
    </form>
  </div>
</template>

<script setup>
import { useInertia, defineProps } from 'vue';

const props = defineProps({ token: String });

const email = ref('');
const password = ref('');
const password_confirmation = ref('');

const submitForm = () => {
  Inertia.post(route('password.update'), {
    token: props.token,
    email: email.value,
    password: password.value,
    password_confirmation: password_confirmation.value,
  });
};
</script> -->



<template>


   <!-- this works with handling form but the post is not set in reset table  -->
  <div>
    <form @submit.prevent="submitForm">
      <input type="hidden" name="token" v-model="form.token" />

      <label for="email">Email:</label>
      <input type="email" name="email" v-model="form.email" />

      <label for="password">Password:</label>
      <input type="password" name="password" v-model="form.password" />

      <label for="password_confirmation">Confirm Password:</label>
      <input type="password" name="password_confirmation" v-model="form.password_confirmation" />

      <button type="submit">Reset Password</button>
    </form>
  </div>
</template>

<script setup>
import { useForm } from '@inertiajs/inertia-vue3'


const props = defineProps({ token: String })

// console.log(props.token)
const form = useForm({
  token:props.token,
  email:'',
  password:'',
  password_confirmation:'',

})

const submitForm = () => {
  form.post(route('password.update'));
};
</script>





 <!-- <template>
  <div>
    <form @submit.prevent="submitForm">
      <input type="hidden" name="token" :value="token" />

      <label for="email">Email:</label>
      <input type="email" name="email" v-model="email" />

      <label for="password">Password:</label>
      <input type="password" name="password" v-model="password" />

      <label for="password_confirmation">Confirm Password:</label>
      <input type="password" name="password_confirmation" v-model="password_confirmation" />

      <button type="submit">Reset Password</button>
    </form>
  </div>
</template>


 
  
  <script>
  export default {
    props: {
      token: String,
    },
    data() {
      return {
        email: '',
        password: '',
        password_confirmation: '',
      };
    },
    methods: {
      submitForm() {
        this.$inertia.post(route('password.update'), {
          token: this.token,
          email: this.email,
          password: this.password,
          password_confirmation: this.password_confirmation,
        });
      },
    },
  };
  </script> -->
  