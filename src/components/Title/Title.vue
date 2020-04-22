<template>
    <div class="title">
        <h1 class="title__content" v-text="content" />
    </div>
</template>

<script>
export default {
  props: {
    content: {
      type: String,
      required: true
    }
  }
}
</script>

<style scoped lang="scss">
  @import "Title";
</style>
