<template>
    <div class="sidebar">
      <router-link to="/" class="sidebar__title">DashBoard</router-link>
      <ul class="sidebar__links">
        <li class="sidebar__links-item">
          <router-link to="/projects">List</router-link>
        </li>
        <li class="sidebar__links-item">
          <router-link to="/create">Create Project</router-link>
        </li>
      </ul>
    </div>
</template>

<script>
export default {
  props: {
  }
}
</script>

<style scoped lang="scss">
  @import "Sidebar";
</style>
