<template>
    <div class="projects">
      <Title
        content="Liste des Projets"
      />
      <List
        :items="items"
      />
    </div>
</template>

<script>
import Title from '../../components/Title/Title'
import List from '../../components/List/List'
import { projectsRef } from '../../../firebase.config'

export default {
  components: {
    Title,
    List
  },
  data () {
    return {
      items: []
    }
  },
  created () {
    projectsRef.on('child_added', snapshot => {
      this.items.push({ ...snapshot.val(), id: snapshot.key })
    })
  }
}
</script>

<style scoped lang="scss">
  @import "Projects";
</style>
