<script setup>
import { RouterLink, RouterView } from 'vue-router';
import HelloWorld from './components/HelloWorld.vue';
import ClassroomCard from './components/ClassroomCard.vue';
import StudentsTable from './components/StudentCard.vue';
import CreateEditStudentModal from './components/CreateEditStudentModal.vue';
import CreateEditClassroomModal from './components/CreateEditClassroomModal.vue';


</script>

<template>
  <CreateEditClassroomModal />
  <CreateEditStudentModal />
  <StudentsTable />
  <ClassroomCard />
  <!-- <RouterView /> -->
</template>
