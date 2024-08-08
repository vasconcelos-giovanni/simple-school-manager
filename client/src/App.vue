<script setup>
import { RouterView } from 'vue-router';
import Navbar from './components/Navbar.vue';
import Footer from './components/Footer.vue';
</script>

<template>
  <div class="col-12 bg-body d-flex flex-column vh-100">
    <Navbar />

    <div class="col-12 d-flex justify-content-center flex-grow-1">
      <main class="col-12 col-lg-10 p-2 bg-body-tertiary">
        <RouterView />
      </main>
    </div>      
    
    <Footer />
  </div>
</template>

<style>
.card-width {
  min-width: 20rem;
  max-width: 20rem;
}

.height-100 {
  min-height: 100%;
}
</style>