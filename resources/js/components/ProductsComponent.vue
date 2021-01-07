<template>
    <div class="row justify-content-center">
        <form-component @new="addProduct"></form-component>
        <div class="col-md 12" style="margin-top: 20px;">
            <div class="alert alert-secondary" role="alert">
                Lista de productos!
            </div>
        </div>
        <product-component
            v-for="(product, index) in products"
            :key="product.id"
            :product="product"
            @update="updateProduct(index, ...arguments)"
            @delete="deleteProduct(index)"
        >
        </product-component>
    </div>
</template>

<script>
export default {
    data() {
        return {
          //Obtenemos todos los productos registrados
            products: [
            ]
        };
    },
    mounted() {
        //Se carga el componente
        axios.get('/products').then((response) => {
          this.products = response.data;
        });
    },
    methods: {
        addProduct(product) {
          this.products.push(product);
        },
        deleteProduct(index) {
          this.products.splice(index, 1);
        },
        updateProduct(index, product) {
          this.products[index] = product;
        }
    }
};
</script>
