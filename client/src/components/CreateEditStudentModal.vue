<template>
  <!-- Button trigger modal -->
  <button
    type="button"
    class="btn btn-outline-primary"
    data-bs-toggle="modal"
    data-bs-target="#exampleModal"
  >
    Cradastrar aluno
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
            Cadastrar aluno
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
              >Email </label>
              <input
                type="email"
                class="form-control"
                id="exampleInputEmail1"
                aria-describedby="emailHelp"
              >
            </div>
            <div class="mb-3">
              <label
                for="exampleInputEmail1"
                class="form-label"
              >Nascimento </label>
              <input
                type="date"
                class="form-control"
                id="exampleInputEmail1"
                aria-describedby="emailHelp"
              >
            </div>
            <div class="mb-3">
              <select
                class="form-select"
                aria-label="Default select example"
              >
                <option selected>
                  Turma
                </option>
                <option value="1">
                  Sociologia II
                </option>
                <option value="2">
                  Filosofia I
                </option>
              </select>
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