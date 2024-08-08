<script setup>
import { ref, onMounted, computed } from 'vue';
import axios from '../../src/axios';
import DeleteButton from './DeleteButton.vue';
import CreateEditStudentModal from './CreateEditStudentModal.vue';

const props = defineProps({
  id: {
    type: Number,
    required: true,
    default: null
  },
  nome: {
    type: String,
    required: true,
    default: ''
  },
  email: {
    type: String,
    required: true,
    default: ''
  },
  nascimento: {
    type: String,
    required: true,
    default: ''
  },
  turmaId: {
    type: Number,
    required: true,
    default: null
  }
});

// Local state for student data
// const student = ref({
//   id: props.id,
//   nome: props.nome,
//   email: props.email,
//   nascimento: props.nascimento,
//   turma: ''
// });

const formattedNascimento = computed(() => {
  const [year, month, day] = props.nascimento.split('-');
  return `${day}/${month}/${year}`;
});

// Fetch turma name on component mount
// onMounted(async () => {
//   try {
//     const response = await axios.get(`/turmas/${props.turmaId}`);
//     student.value.turma = response.data.nome;
//   } catch (error) {
//     console.error('Error fetching turma:', error.response ? error.response.data : error.message);
//   }
// });
</script>

<template>
  <div
    class="card"
    style="width: 18rem;"
  >
    <div class="card-body d-flex flex-column">
      <h5 class="card-title fw-bold">
        {{ nome }}
      </h5>
      <ul class="no-bulleted-list mb-auto">
        <li class="list-group-item">
          <span class="fw-bold">Email:</span> {{ email }}
        </li>
        <li class="list-group-item">
          <span class="fw-bold">Nascimento:</span> {{ formattedNascimento }}
        </li>
        <li class="list-group-item">
          <span class="fw-bold">Turma:</span> {{ turmaId }}
        </li>
      </ul>
      <div class="d-flex justify-content-end gap-1 mt-2">
        <CreateEditStudentModal
          is-edit
          :id="props.id"
          :nome="props.nome"
          :email="props.email"
          :nascimento="props.nascimento"
          :turma-id="props.turmaId"
          class="btn-sm btn-warning"
          @update-list="$emit('updateList')"
        />
        <DeleteButton
          :route="`alunos/${props.id}`"
          @update-list="$emit('updateList')"
        />
      </div>
    </div>
  </div>
</template>

<style scoped>
.no-bulleted-list {
  list-style-type: none;
  padding: 0;
  margin: 0;
}
</style>
