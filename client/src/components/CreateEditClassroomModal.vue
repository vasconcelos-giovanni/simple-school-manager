<template>
  <!-- Button trigger modal -->
  <button
    type="button"
    class="btn btn-outline-primary"
    data-bs-toggle="modal"
    data-bs-target="#exampleModal"
  >
    Cradastrar turma
  </button>

  <!-- Modal -->
  <div
    class="modal fade"
    id="exampleModal"
    tabindex="-1"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true"
  >
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1
            class="modal-title fs-5"
            id="exampleModalLabel"
          >
            Cadastrar turma
          </h1>
          <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"
            aria-label="Close"
          />
        </div>
        <div class="modal-body">
          <form>
            <div class="mb-3">
              <label
                for="exampleInputEmail1"
                class="form-label"
              >Nome</label>
              <input
                type="text"
                class="form-control"
                id="exampleInputEmail1"
                aria-describedby="emailHelp"
              >
            </div>
            <div class="mb-3">
              <label
                for="exampleInputEmail1"
                class="form-label"
              >Ano</label>
              <input
                type="text"
                class="form-control"
                id="exampleInputEmail1"
                aria-describedby="emailHelp"
              >
            </div>
            <div class="mb-3">
              <label
                for="exampleInputEmail1"
                class="form-label"
              >Período</label>
              <input
                type="text"
                class="form-control"
                id="exampleInputEmail1"
                aria-describedby="emailHelp"
              >
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button
            type="button"
            class="btn btn-outline-danger"
            data-bs-dismiss="modal"
          >
            Cancelar
          </button>
          <a
            class="btn btn-outline-primary"
          >
            Salvar
          </a>
        </div>
      </div>
    </div>
  </div>
</template>