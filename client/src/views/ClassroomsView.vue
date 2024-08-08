<script setup>
import ClassroomsList from '@/components/ClassroomsList.vue';
import CreateEditClassroomModal from '@/components/CreateEditClassroomModal.vue';
import { ref } from 'vue';

const refreshKey = ref(0); // Initialize a reactive variable to track the refresh

const handleUpdateList = () => {
  refreshKey.value += 1; // Increment the refresh key to trigger an update
};
</script>

<template>
  <article class="d-flex flex-column gap-2">
    <section class="d-flex justify-content-center">
      <CreateEditClassroomModal
        class="btn-primary"
        @update-list="handleUpdateList"
      />
    </section>
    <section>
      <ClassroomsList :refresh="refreshKey" />
    </section>
  </article>
</template>