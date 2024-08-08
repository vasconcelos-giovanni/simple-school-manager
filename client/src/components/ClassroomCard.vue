<script setup>
import { defineProps } from 'vue';
import CreateEditClassroomModal from './CreateEditClassroomModal.vue';
import DeleteButton from './DeleteButton.vue';

const props = defineProps({
  id: {
    type: Number,
    required: true,
  },
  nome: {
    type: String,
    required: true,
  },
  ano: {
    type: Number,
    required: true,
  },
  periodo: {
    type: String,
    required: true,
    validator: (value) => ['matutino', 'vespertino', 'noturno'].includes(value),
  },
});

// const emit = defineEmits(['updateList']);
</script>

<template>
  <div
    class="card"
    style="width: 20rem;"
  >
    <div class="card-body d-flex flex-column">
      <h5 class="card-title fw-bold">
        {{ nome }}
      </h5>
      <ul class="no-bulleted-list mb-auto">
        <li class="list-group-item">
          <span class="fw-bold">Ano:</span>
          {{ ano }}
        </li>
        <li class="list-group-item">
          <span class="fw-bold">Período:</span>
          {{ periodo }}
        </li>
      </ul>
      <div class="d-flex justify-content-end gap-1 mt-2">
        <RouterLink
          class="btn btn-sm btn-primary"
          :to="{ name: 'classroom.students', params: { turmaId: props.id } }"
        >
          Ver alunos
        </RouterLink>

        <CreateEditClassroomModal
          is-edit
          :id="props.id"
          :ano="props.ano"
          :nome="props.nome"
          :periodo="props.periodo"
          class="btn-sm btn-warning"
          @update-list="$emit('updateList')"
        />
        <DeleteButton
          :route="`turmas/${props.id}`"
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
