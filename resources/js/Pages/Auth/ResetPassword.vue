<template>
    <div>
      <form @submit.prevent="submitForm">
        <div class="mb-3">
          <label for="email" class="form-label">Email address</label>
          <input
            v-model="email"
            type="email"
            class="form-control"
            id="email"
            name="email"
            placeholder="Enter your email"
          />
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input
            v-model="password"
            type="password"
            class="form-control"
            id="password"
            name="password"
          />
        </div>
        <div class="mb-3">
          <label for="password_confirmation" class="form-label">Confirm Password</label>
          <input
            v-model="password_confirmation"
            type="password"
            class="form-control"
            id="password_confirmation"
            name="password_confirmation"
          />
        </div>
        <input type="hidden" name="token" v-model="token" />
        <button type="submit" class="btn btn-primary">Reset Password</button>
      </form>
    </div>
  </template>
  
  <script>
  export default {
    props: ['token'], // Receive the token as a prop
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
          email: this.email,
          password: this.password,
          password_confirmation: this.password_confirmation,
          token: this.token,
        });
      },
    },
  };
  </script>
  