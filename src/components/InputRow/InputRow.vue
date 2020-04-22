<template>
    <div class="row">
      <div class="row__col">
        <label class="row__col-label">Label</label>
        <input class="row__col-input" type="text" :value="label" @input="(e) => handleInput('label', e.target.value)">
      </div>
      <div class="row__col">
        <label class="row__col-label">Nbr de jours</label>
        <input class="row__col-input" type="number" :value="days" @input="(e) => handleInput('days', parseInt(e.target.value))">
      </div>
      <div class="row__col">
        <label class="row__col-label">Prix par jour</label>
        <input class="row__col-input" type="number" :value="pricePerDay" @input="(e) => handleInput('pricePerDay', parseInt(e.target.value))">
      </div>
      <div class="row__col result">
        <span class="row__col-result" v-text="renderRowTotal()"/>
      </div>
      <div class="row__col delete">
        <button class="row__col-delete" @click="remove">
          Supprimer
        </button>
      </div>
    </div>
</template>

<script>
export default {
  props: {
    label: {
      type: String,
      required: true
    },
    days: {
      type: Number,
      required: true
    },
    pricePerDay: {
      type: Number,
      required: true
    },
    index: {
      type: Number,
      required: true
    },
    handleChange: {
      type: Function,
      required: true
    },
    handleRemove: {
      type: Function,
      required: true
    }
  },
  methods: {
    renderRowTotal () {
      return `${this.days * this.pricePerDay}€`
    },
    handleInput (key, value) {
      return this.handleChange(this.index, key, value)
    },
    remove () {
      return this.handleRemove(this.index)
    }
  }
}
</script>

<style scoped lang="scss">
  @import "InputRow";
</style>
