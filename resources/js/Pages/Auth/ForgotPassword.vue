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
        <button type="submit" class="btn btn-primary">Send Reset Link</button>
      </form>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        email: '',
      };
    },
    methods: {
      submitForm() {
        this.$inertia.post(route('password.email'), {
          email: this.email,
        });
      },
    },
  };
  </script>