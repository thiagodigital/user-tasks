<template>
  <div>
    <div v-for="task in data" :class="'card custom-card mb-4 ' + (task.status == 1 ? ' bg-muted ' : '')" :key="task.id">
      <div class="card-body d-flex">
          <div class="my-auto">
            <input v-model="task.status" class="form-check-input p-2" type="checkbox" id="checkboxNoLabel" value="" aria-label="...">
          </div>
        <div class="d-flex justify-content-between align-items-center col">
          <div class="mx-3">
            <h6 class="m-0">{{ task.title }}</h6>
          </div>
          <div>
            <div v-if="task.label == 0">
              <span class="badge bg-success">Pessoal</span>
            </div>
            <div v-if="task.label == 1">
              <span class="badge bg-primary">Profissional</span>
            </div>
            <div v-if="task.label == 2">
              <span class="badge bg-info">Outros</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    data: {
      type: Array
    }
  }
}
</script>
