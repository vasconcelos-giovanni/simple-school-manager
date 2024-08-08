<script setup>
import { ref } from "vue";

const navLinksClasses = ref('nav-link text-white');
</script>

<template>
  <nav class="navbar navbar-expand-lg col-12 d-flex justify-content-center bg-dark" data-bs-theme="dark">
    <div class="container-fluid col-10">
      <RouterLink
        class="navbar-brand"
        :to="{ name: 'home'}"
      >
        Escola Simples
      </RouterLink>
      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarNav"
        aria-controls="navbarNav"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon" />
      </button>
      <div
        class="collapse navbar-collapse"
        id="navbarNav"
      >
        <ul class="navbar-nav text-center">
          <li class="nav-item">
            <RouterLink
              :class="navLinksClasses"
              :to="{ name: 'home'}"
            >
              Início
            </RouterLink>
          </li>
          <li class="nav-item">
            <RouterLink
              :class="navLinksClasses"
              :to="{ name: 'classrooms'}"
            >
              Turmas
            </RouterLink>
          </li>
          <li class="nav-item">
            <RouterLink
              :class="navLinksClasses"
              :to="{ name: 'students'}"
            >
              Alunos
            </RouterLink>
          </li>
          <li class="nav-item">
            <RouterLink
              class="nav-link disabled"
              :to="{ name: 'about'}"
            >
              Sobre
            </RouterLink>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</template>