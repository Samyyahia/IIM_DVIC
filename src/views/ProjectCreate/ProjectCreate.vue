<template>
    <div class="projects">
      <Title
        content="Creation de Projet"
      />
      <Form />
    </div>
</template>

<script>
import Title from '../../components/Title/Title'
import Form from '../../components/Form/Form'

export default {
  components: {
    Title,
    Form
  },
  props: {
  }
}
</script>

<style scoped lang="scss">
  @import "ProjectCreate";
</style>
