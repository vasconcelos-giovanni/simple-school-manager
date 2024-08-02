<template>
  <div
    class="card"
    style="width: 18rem;"
  >
    <div class="card-body">
      <h5 class="card-title fw-bold">
        Giovanni Vasconcelos
      </h5>
      <ul class="no-bulleted-list">
        <li class="list-group-item">
          <span class="fw-bold">Email:</span>
          vasconcelos.giovanni@hotmail.com
        </li>
        <li class="list-group-item">
          <span class="fw-bold">Nascimento:</span>
          25/12/2000
        </li>
      </ul>
      <div class="d-flex justify-content-end gap-1 mt-2">
        <a
          href="#"
          class="btn btn-outline-warning btn-sm"
        >Editar</a>
        <a
          href="#"
          class="btn btn-outline-danger btn-sm"
        >Excluir</a>
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