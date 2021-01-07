require('./bootstrap');

window.Vue = require('vue').default;


//Registramos los componentes Vue
Vue.component('products-component', require('./components/ProductsComponent.vue').default);
Vue.component('form-component', require('./components/FormComponent.vue').default);
Vue.component('product-component', require('./components/ProductComponent.vue').default);

const app = new Vue({
    el: '#app',
});