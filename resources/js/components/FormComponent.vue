<template>
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form action="" v-on:submit.prevent="newProduct()">
                    <div class="form-group">
                        <label>* Nombre</label>
                        <input
                            v-model="name"
                            type="text"
                            name="name"
                            class="form-control"
                            required
                        />
                    </div>
                    <div class="form-group">
                        <label>* Código de 4 dígitos</label>
                        <input
                            v-model="code"
                            type="text"
                            name="code"
                            class="form-control"
                            required
                        />
                    </div>
                    <div class="form-group">
                        <label>* Slug</label>
                        <input
                            v-model="slug"
                            type="text"
                            name="slug"
                            class="form-control"
                            required
                        />
                    </div>
                    <div class="form-group">
                        <input
                            type="submit"
                            value="Guardar"
                            class="btn btn-sm btn-primary"
                        />
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        //Devolvemos la data que queremos utilizar
        return {
            name: "",
            code: "",
            slug: "",
        };
    },
    mounted() {
        console.log("Component mounted.");
    },
    //Action methods
    methods: {
        newProduct() {
          //Solicitud al servidor para post
          const params = {
            name: this.name, 
            code: this.code,
            slug: this.slug,
          }

          //Clean inputs
          this.name = '';
          this.code = '';
          this.slug = '';

          axios.post('/products', params)
            .then((response) => {
              const product = response.data;
              this.$emit('new', product);
            });


        }
    }
};
</script>
