<script setup>
import { ref, onMounted, watch } from 'vue';
import axios from '../axios';
import ClassroomCard from './ClassroomCard.vue';

const props = defineProps({
  refresh: Number, // To refresh the list with the watch()
});

const turmas = ref([]);

// Fetch the turma data from the API
const fetchClassrooms = async () => {
  try {
    const response = await axios.get('turmas');
    turmas.value = response.data;
  } catch (error) {
    alert('Ocorreu um erro no carregamento das turma. Recarregue a página.');
    console.error('Error fetching turmas:', error.response ? error.response.data : error.message);
  }
};

// Fetch data when the component is mounted
onMounted(fetchClassrooms);

// Watch for changes in the refresh prop to trigger data reload
watch(() => props.refresh, fetchClassrooms, { immediate: true });
</script>

<template>
  <div class="d-flex justify-content-center flex-wrap gap-2">
    <!-- Render ClassroomCard components for each item in the turmas array -->
    <ClassroomCard
      v-for="turma in turmas"
      :key="turma.id"
      :id="turma.id"
      :nome="turma.nome"
      :ano="turma.ano"
      :periodo="turma.periodo"
      @update-list="fetchClassrooms"
    />
  </div>
</template>