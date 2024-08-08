<script setup>
import { ref, onMounted } from 'vue';
import axios from '../../src/axios';

const props = defineProps({
  isEdit: {
    type: Boolean,
    default: false,
  },
  id: {
    type: Number,
    default: null
  },
  nome: {
    type: String,
    default: ''
  },
  email: {
    type: String,
    default: ''
  },
  nascimento: {
    type: String,
    default: ''
  },
  turmaId: {
    type: Number,
    default: null
  }
});

const emit = defineEmits(['updateList']);

const nome = (props.isEdit) ? ref(props.nome) : ref('');
const email = (props.isEdit) ? ref(props.email) : ref('');
const nascimento = (props.isEdit) ? ref(props.nascimento) : ref('');
const turmaId = (props.isEdit) ? ref(props.turmaId) : ref(null);

// Modal related properties
const createEditStudentModal = ref(props.isEdit ? `createEditStudentModal-${props.id}` : 'createEditStudentModal');
const createEditStudentModalLabel = ref(props.isEdit ? `createEditStudentModalLabel-${props.id}` : 'createEditStudentModalLabel');
const createEditStudentModalTitle = ref(props.isEdit ? `Editar aluno ${props.nome}` : 'Cadastrar aluno');
const createEditStudentModalTrigerButtonName = ref(props.isEdit ? 'Editar' : 'Cadastrar aluno');
const createEditStudentModalCloseButton = ref(null);

// List of turmas fetched from API
const turmas = ref([]);

// Fetch turmas on component mount
onMounted(async () => {
  try {
    const response = await axios.get('/turmas');
    turmas.value = response.data;
  } catch (error) {
    console.error('Error fetching turmas:', error.response ? error.response.data : error.message);
  }

  // Show a warning if `props.isEdit` is true and `props.id` is not provided
  if (props.isEdit && (props.id === null || props.id === undefined)) {
    console.warn('The prop "id" is required when the prop "isEdit" is set to "true".');
  }
});

// Handle form submission
const submitForm = async () => {
  const url = props.isEdit ? `alunos/${props.id}` : 'alunos';
  const method = props.isEdit ? 'put' : 'post';
  
try {
    await axios[method](url, {
      nome: nome.value,
      email: email.value,
      data_nascimento: nascimento.value,
      turma_id: turmaId.value,
    });

    emit('updateList');

    alert('Aluno salvo com sucesso!');

    closeModal();
  } catch (error) {
    alert('Ocorreu um erro no salvamento do aluno. Tente novamente.');
    console.error('Error saving student:', error.response ? error.response.data : error.message);
  }
};

function closeModal() {
  if (createEditStudentModalCloseButton.value) {
    createEditStudentModalCloseButton.value.click();    
  }
}
</script>

<template>
  <!-- Button trigger modal -->
  <button
    v-bind="$attrs"
    type="button"
    class="btn "
    data-bs-toggle="modal"
    :data-bs-target="`#${createEditStudentModal}`"
  >
    {{ createEditStudentModalTrigerButtonName }}
  </button>

  <!-- Modal -->
  <div
    class="modal fade"
    :id="createEditStudentModal"
    tabindex="-1"
    :aria-labelledby="createEditStudentModalLabel"
    aria-hidden="true"
  >
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1
            class="modal-title fs-5"
            :id="createEditStudentModalLabel"
          >
            {{ createEditStudentModalTitle }}
          </h1>
          <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"
            aria-label="Close"
            ref="createEditStudentModalCloseButton"
          />
        </div>
        <div class="modal-body">
          <form @submit.prevent="submitForm">
            <div class="mb-3">
              <label
                for="inputNome"
                class="form-label"
              >Nome</label>
              <input
                required
                type="text"
                class="form-control"
                id="inputNome"
                v-model="nome"
              >
            </div>
            <div class="mb-3">
              <label
                for="inputEmail"
                class="form-label"
              >Email</label>
              <input
                required
                type="email"
                class="form-control"
                id="inputEmail"
                v-model="email"
              >
            </div>
            <div class="mb-3">
              <label
                for="inputNascimento"
                class="form-label"
              >Nascimento</label>
              <input
                required
                type="date"
                class="form-control"
                id="inputNascimento"
                v-model="nascimento"
              >
            </div>
            <div class="mb-3">
              <label
                for="selectTurma"
                class="form-label"
              >Turma</label>
              <select
                required
                class="form-select"
                id="selectTurma"
                v-model="turmaId"
              >
                <option
                  value=""
                  disabled
                  selected
                >
                  Selecione a turma
                </option>
                <option
                  v-for="turma in turmas"
                  :key="turma.id"
                  :value="turma.id"
                >
                  {{ turma.nome }}
                </option>
              </select>
            </div>
            <div class="modal-footer">
              <button
                type="button"
                class="btn btn-danger"
                data-bs-dismiss="modal"
              >
                Cancelar
              </button>
              <button
                type="submit"
                class="btn btn-primary"
              >
                Salvar
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>
