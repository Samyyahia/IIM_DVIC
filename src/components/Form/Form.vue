<template>
  <div class="form">
    <div class="form__row">
      <div class="form__row-item" ref="project">
        <InputText
          label="Nom du projet"
          :value="project"
          v-model="project"
        />
      </div>
      <div class="form__row-item" ref="client">
        <InputText
          label="Nom du Client"
          :value="client"
          v-model="client"
        />
      </div>
    </div>
    <div class="form__row">
      <div class="form__row-item" ref="siret">
        <InputText
          label="Votre Siret"
          :value="siret"
          v-model="siret"
        />
      </div>
      <div class="form__row-item" ref="siren">
        <InputText
          label="Votre Siren"
          :value="siren"
          v-model="siren"
        />
      </div>
    </div>
    <div class="form__row">
      <div class="form__row-item" ref="firstname">
        <InputText
          label="Votre Prénom"
          :value="firstname"
          v-model="firstname"
        />
      </div>
      <div class="form__row-item" ref="lastname">
        <InputText
          label="Votre Nom"
          :value="lastname"
          v-model="lastname"
        />
      </div>
    </div>

    <div class="form__row">
      <div class="form__row-item" ref="phone">
        <InputText
          label="Votre Numéro de téléphone"
          :value="phone"
          type="tel"
          v-model="phone"
        />
      </div>
      <div class="form__row-item" ref="mail">
        <InputText
          label="Votre Email"
          :value="mail"
          type="email"
          v-model="mail"
        />
      </div>
    </div>
    <div class="form__row" ref="address">
      <InputText
        label="Votre Addresse"
        :value="address"
        v-model="address"
      />
    </div>
    <div class="form__row" ref="city">
      <InputText
        label="Ville"
        :value="city"
        v-model="city"
      />
    </div>
    <div class="form__row" ref="postal">
      <InputText
        label="Code Postal"
        :value="postal"
        v-model="postal"
      />
    </div>
    <div class="form__row" ref="description">
      <InputText
        label="Description"
        :value="description"
        v-model="description"
      />
    </div>
    <div class="form__row" ref="notice">
      <InputText
        label="Notice"
        :value="notice"
        v-model="notice"
      />
    </div>
    <div class="form__row items" ref="total">
      <InputRow
        v-for="(item, k) in items"
        :key="k"
        :label="item.label"
        :days="item.days"
        :price-per-day="item.pricePerDay"
        :index="k"
        :handleChange="handleChange"
        :handleRemove="removeRow"
      />
      <div class="form__row">
        <div class="form__row-item">
          <button type="button" class="form__addRow" @click="addRow">
            Ajouter une Prestation
          </button>
        </div>
        <div class="form__row-item total">
          Total: {{ getTotal() }} €
        </div>
      </div>
    </div>
    <div class="form__row">
      <button type="submit" class="form__submit" @click="handleSubmit">
        Envoyer
      </button>
      <span v-if="success && msg.length > 0" class="form__success" v-text="msg"/>
    </div>
  </div>
</template>

<script>
import InputText from '../InputText/InputText'
import InputRow from '../InputRow/InputRow'
import { projectsRef } from '../../../firebase.config'
import moment from 'moment'

export default {
  components: {
    InputText,
    InputRow
  },
  data () {
    return {
      pending: false,
      success: false,
      msg: '',
      project: '',
      client: '',
      siret: '',
      siren: '',
      notice: '',
      description: '',
      postal: '',
      city: '',
      address: '',
      firstname: '',
      lastname: '',
      phone: '',
      mail: '',
      total: 0,
      items: [
        {
          label: '',
          days: 0,
          pricePerDay: 0,
          total: 0
        }
      ]
    }
  },
  methods: {
    resetForm () {
      this.msg = ''
      this.project = ''
      this.client = ''
      this.siret = ''
      this.siren = ''
      this.notice = ''
      this.description = ''
      this.postal = ''
      this.city = ''
      this.address = ''
      this.firstname = ''
      this.lastname = ''
      this.phone = ''
      this.mail = ''
      this.total = 0
      this.items = [
        {
          label: '',
          days: 0,
          pricePerDay: 0,
          total: 0
        }
      ]

      setTimeout(() => {
        this.success = false
        this.msg = ''
      }, 5000)
    },
    addRow () {
      this.items.push(this.createItem())
    },
    removeRow (index) {
      this.items.splice(index, 1)
    },
    createItem () {
      return {
        label: '',
        days: 0,
        pricePerDay: 0,
        total: 0
      }
    },
    handleChange (index, key, value) {
      this.items[index][key] = value
      this.items[index].total = this.items[index].days * this.items[index].pricePerDay
    },
    getTotal () {
      let total = 0

      this.items.forEach((item) => {
        const totalRow = item.days * item.pricePerDay

        total += totalRow
      })

      this.total = total

      return total
    },

    checkFields () {
      const strings = [
        'project',
        'client',
        'siret',
        'siren',
        'firstname',
        'lastname',
        'phone',
        'mail',
        'address',
        'city',
        'postal',
        'notice',
        'description'
      ]

      const numbers = ['total']

      let error = false

      strings.forEach(item => {
        const value = this[item]
        if (value.length === 0) {
          error = true
          this.$refs[item].classList.add('error')
        } else {
          this.$refs[item].classList.remove('error')
        }
      })

      numbers.forEach(item => {
        const value = this[item]
        if (value <= 0) {
          error = true
          this.$refs[item].classList.add('error')
        } else {
          this.$refs[item].classList.remove('error')
        }
      })

      return error
    },
    handleSubmit () {
      const isFormValid = !this.checkFields()

      if (isFormValid) {
        projectsRef.push({
          project: this.project,
          client: this.client,
          siret: this.siret,
          siren: this.siren,
          notice: this.notice,
          description: this.description,
          postal: this.postal,
          city: this.city,
          address: this.address,
          firstname: this.firstname,
          lastname: this.lastname,
          phone: this.phone,
          mail: this.mail,
          total: this.total,
          items: this.items,
          date: moment().format('DD/MM/YYYY')
        })

        this.pending = false
        this.success = true
        this.msg = 'Projet ajouter avec succes'
        this.resetForm()
      }
    }
  }
}
</script>

<style scoped lang="scss">
  @import "Form";
</style>
