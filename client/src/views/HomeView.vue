<script setup>
import ClassroomsList from '@/components/ClassroomsList.vue';
import StudentsList from '@/components/StudentsList.vue';
import { ref } from 'vue';

const lists = {
  ClassroomsList,
  StudentsList
};

const cardsClasses = ref('card-width card-height card border border-dark-subtle card-hovered');
const cardBodyClasses = ref('card-body d-flex');
const linksClasses = ref('d-flex justify-content-center align-items-center fs-5 link-dark link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover flex-grow-1');
</script>

<template>
  <article
    class="d-flex justify-content-center align-items-center flex-wrap gap-2 height-100"
  >
    <div
      :class="cardsClasses"
    >
      <div :class="cardBodyClasses">
        <RouterLink
          :class="linksClasses"
          :to="{ name: 'classrooms'}"                 
        >
          Turmas
        </RouterLink>
      </div>    
    </div>
    <div
      :class="cardsClasses"
    >
      <div :class="cardBodyClasses">
        <RouterLink
          :class="linksClasses"
          :to="{ name: 'students'}"
        >
          Alunos
        </RouterLink>
      </div>    
    </div>
  </article>
</template>

<style scoped>

.card-height {
  min-height: 9.5rem;
  max-height: 9.5rem;
}

.card-hovered:hover {
  background-color: #E2E3E5;
}
</style>