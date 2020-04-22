<template>
    <div class="list">
      <ListItem v-for="(item, k) in items" :key="k" :item="item"/>
    </div>
</template>

<script>
import ListItem from './ListItem/ListItem'

export default {
  components: {
    ListItem
  },
  props: {
    items: {
      type: Array,
      required: true
    }
  }
}
</script>

<style scoped lang="scss">
  @import "List";
</style>
