Nova.booting((Vue, router, store) => {
  Vue.component('index-phonenumber', require('./components/IndexField'))
  Vue.component('detail-phonenumber', require('./components/DetailField'))
  Vue.component('form-phonenumber', require('./components/FormField'))
})
