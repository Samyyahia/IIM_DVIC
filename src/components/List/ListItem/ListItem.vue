<template>
  <div class="listItem" @click="handleClick">
    <div class="listItem__download">Télécharger</div>
    <span class="listItem__label" v-text="name"/>
    <div class="ListItem__price">
          <span class="listItem__label">
           {{ item.total }} €
          </span>
    </div>
  </div>
</template>

<script>
import axios from 'axios'

export default {
  props: {
    item: {
      type: Object,
      required: true
    }
  },
  data () {
    return {
      name: ''
    }
  },
  created () {
    const {
      project,
      client,
      date
    } = this.item

    this.name = `${project.toUpperCase()} - ${client} (${date})`
  },
  methods: {
    handleClick () {
      axios({
        url: '/api/pdf',
        method: 'POST',
        data: this.item,
        responseType: 'blob'
      }).then((response) => {
        const url = window.URL.createObjectURL(new Blob([response.data]))
        const link = document.createElement('a')
        link.href = url

        link.setAttribute('download', `Facture-${this.item.id}.pdf`)
        document.body.appendChild(link)

        link.click()
      })
    }
  }
}
</script>

<style scoped lang="scss">
  @import "ListItem";
</style>
