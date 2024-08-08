<script setup>
import { ref, onMounted, defineEmits } from 'vue';
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
  ano: {
    type: Number,
    default: null
  },
  periodo: {
    type: String,
    validator: value => ['', 'matutino', 'vespertino', 'noturno'].includes(value),
    default: ''
  }
});

const emit = defineEmits(['updateList']);

onMounted(() => {
  // Show a warning in case of `props.isEdit` is set to "true" and `props.id` is not set. 
  if (props.isEdit && (props.id === null || props.value === undefined)) {
    console.warn('The prop "id" is required when the prop "isEdit" is set to "true".');    
  }
});

const nome = (props.isEdit) ? ref(props.nome) : ref('');
const ano =  (props.isEdit) ? ref(props.ano) : ref(null);
const periodo =  (props.isEdit) ? ref(props.periodo) : ref('');

/**
 * @var string createEditClassroomModal Modal HTML "id"
 */
const createEditClassroomModal = ref((props.isEdit) ? `createEditClassroomModal-${props.id}` : 'createEditClassroomModal');

/**
 * @var string createEditClassroomModalLabel Modal HTML "label"
 */
const createEditClassroomModalLabel = ref(props.isEdit ? `createEditClassroomModalLabel-${props.id}` : 'createEditClassroomModalLabel');

/**
 * @var string createEditClassroomModalTitle
 */
const createEditClassroomModalTitle = ref((props.isEdit) ? `Editar turma ${props.nome}` : 'Cadastrar turma');

/**
 * @var string createEditClassroomModalTrigerButtonName
 */
const createEditClassroomModalTrigerButtonName = ref((props.isEdit) ? 'Editar' : 'Cadastrar turma');

/**
 * @var object createEditClassroomModalCloseButton Button for closing modal
 */
const createEditClassroomModalCloseButton = ref(null);

const submitForm = async () => {
  const url = props.isEdit ? `/turmas/${props.id}` : '/turmas';
  const method = props.isEdit ? 'put' : 'post';

  try {
    await axios[method](url, {
      nome: nome.value,
      ano: ano.value,
      periodo: periodo.value,
    });

    // Alert success message
    alert('Turma salva com sucesso!');
    emit('updateList');
    closeModal();
  } catch (error) {
    alert('Ocorreu um erro no salvamento da turma. Tente novamente.');
    console.error('Error saving turma:', error.response ? error.response.data : error.message);
  }
};

function closeModal() {
  if (createEditClassroomModalCloseButton.value) {
    createEditClassroomModalCloseButton.value.click();    
  }
}
</script>

<template>
  <!-- Button trigger modal -->
  <button
    v-bind="$attrs"
    type="button"
    class="btn"
    data-bs-toggle="modal"
    :data-bs-target="`#${createEditClassroomModal}`"
  >
    {{ createEditClassroomModalTrigerButtonName }}
  </button>

  <!-- Modal -->
  <div
    class="modal fade"
    :id="createEditClassroomModal"
    tabindex="-1"
    :aria-labelledby="createEditClassroomModalLabel"
    aria-hidden="true"
  >
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1
            class="modal-title fs-5"
            :id="createEditClassroomModalLabel"
          >
            {{ createEditClassroomModalTitle }}
          </h1>
          <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"
            aria-label="Close"
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
                for="inputAno"
                class="form-label"
              >Ano</label>
              <input
                required
                type="number"
                class="form-control"
                id="inputAno"
                v-model="ano"
              >
            </div>
            <div class="mb-3">
              <label
                for="inputPeriodo"
                class="form-label"
              >Período</label>
              <select
                required
                class="form-select"
                id="inputPeriodo"
                v-model="periodo"
              >
                <option
                  value=""
                  disabled
                  selected
                >
                  Selecione o período
                </option>
                <option value="matutino">
                  Matutino
                </option>
                <option value="vespertino">
                  Vespertino
                </option>
                <option value="noturno">
                  Noturno
                </option>
              </select>
            </div>
            <div class="modal-footer">
              <button
                type="button"
                class="btn btn-danger"
                ref="createEditClassroomModalCloseButton"
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