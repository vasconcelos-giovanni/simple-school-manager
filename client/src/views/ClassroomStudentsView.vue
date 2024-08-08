<script setup>
import StudentsList from '@/components/StudentsList.vue';
import { defineProps } from 'vue';

const props = defineProps({
  turmaId: {
    type: String,
    required: true
  }
});
</script>

<template>
  <StudentsList :route="`turmas/${props.turmaId}/alunos`" />
</template>