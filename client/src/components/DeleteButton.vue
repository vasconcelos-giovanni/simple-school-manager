<template>
  <div>
    <button
      type="button"
      class="btn btn-danger btn-sm"
      @click="deleteClassroom"
    >
      Excluir
    </button>
  </div>
</template>

<script setup>
import { defineProps } from 'vue';
import axios from '../axios';

// Define props for the component
const props = defineProps({
  route: {
    type: String,
    required: true
  },
});

const emit = defineEmits(['updateList']);

// Method to handle the DELETE request
const deleteClassroom = async () => {
  try {
    await axios.delete(props.route);

    emit('updateList');
    
    // Success alert
    alert('Excluído com sucesso!');
  } catch (error) {
    console.error('Error whilst deleting:', error.response ? error.response.data : error.message);
    alert('Ocorreu um erro ao excluir. Tente novamente.');
  }
};
</script>
