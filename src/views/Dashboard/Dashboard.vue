<template>
  <div class="dashboard">
    <div class="dashboard__sidebar">
      <Sidebar />
    </div>
    <div class="dashboard__content">
      <div class="dashboard__content-wrapper">
        <router-view></router-view>
      </div>
    </div>
  </div>
</template>

<script>
import Sidebar from '../../components/Sidebar/Sidebar'

export default {
  components: {
    Sidebar
  },
  props: {
  }
}
</script>

<style scoped lang="scss">
  @import "Dashboard";
</style>
