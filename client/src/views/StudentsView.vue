<script setup>
import { ref } from 'vue';
import CreateEditStudentModal from '@/components/CreateEditStudentModal.vue';
import StudentsList from '@/components/StudentsList.vue';

const refreshKey = ref(0); // Initialize a reactive variable to track the refresh

const handleUpdateList = () => {
  refreshKey.value += 1; // Increment the refresh key to trigger an update
};
</script>

<template>
  <article class="d-flex flex-column gap-2">
    <section class="d-flex justify-content-center">
      <CreateEditStudentModal
        class="btn-primary mx-auto"
        @update-list="handleUpdateList"
      />
    </section>
    <section>
      <StudentsList
        route="alunos"
        :refresh="refreshKey"
      />
    </section>
  </article>
</template>