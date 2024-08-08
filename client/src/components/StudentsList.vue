<script setup>
import { ref, onMounted, watch } from 'vue';
import axios from '../axios';
import StudentCard from './StudentCard.vue';

const props = defineProps({
  route: {
    type: String,
    required: true,
    default: ''
  },
  refresh: Number, // To refresh the list with the watch()
});

const alunos = ref([]);

// Fetch the aluno data from the API
const fetchStudents = async () => {
  try {
    const response = await axios.get(props.route);
    alunos.value = response.data;
  } catch (error) {
    alert('Ocorreu um erro no carregamento dos alunos. Recarregue a página.');
    console.error('Error fetching alunos:', error.response ? error.response.data : error.message);
  }
};

// Watch for changes in the refresh prop to trigger data reload
// watch(() => props.refresh, fetchClassrooms, { immediate: true });
watch(() => props.refresh, fetchStudents, { immediate: true });

// Fetch data when the component is mounted
onMounted(fetchStudents);
</script>

<template>
  <div class="d-flex flex-wrap gap-2">
    <!-- Render StudentCard components for each item in the alunos array -->
    <StudentCard
      v-for="aluno in alunos"
      :key="aluno.id"
      :id="aluno.id"
      :nome="aluno.nome"
      :email="aluno.email"
      :nascimento="aluno.data_nascimento"
      :turma-id="aluno.turma_id"
      @update-list="fetchStudents"
    />
  </div>
</template>