<script setup>
import StudentsList from './StudentsList.vue';

const props = defineProps({
  route: {
    type: String,
    required: true,
    default: ''
  },
});
</script>

<template>
  <StudentsList :route="props.route" />
</template>