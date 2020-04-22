<template>
    <div class="input">
      <label v-if="label.length > 0" class="input__label" v-text="label" />
      <input class="input__field" :type="type" :value="value" @input="handleInput">
    </div>
</template>

<script>
export default {
  props: {
    label: {
      type: String,
      required: false,
      default: ''
    },
    value: {
      type: String,
      required: true
    },
    type: {
      type: String,
      required: false,
      default: 'text'
    }
  },
  methods: {
    handleInput (e) {
      this.$emit('input', e.target.value)
    }
  }
}
</script>

<style scoped lang="scss">
  @import "InputText";
</style>
