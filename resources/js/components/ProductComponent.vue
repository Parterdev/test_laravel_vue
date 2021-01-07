<template>
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <!-- Publicamos los registros de Posts -->
                <table class="table">
                    <thead class="thead-light">
                        <tr>
														<th>Nombre</th>
                            <th>Código</th>
                            <th>Slug</th>
                            <th>Acciones</th>
                            <th colspan="3">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <input
                                    v-if="editMode"
																		v-model="product.name"
                                    type="text"
                                    class="form-control"
                                />
                                <p v-else>{{ product.name }}</p>
                            </td>
														<td>
                                <input
                                    v-if="editMode"
																		v-model="product.code"
                                    type="text"
                                    class="form-control"
                                />
                                <p v-else>{{ product.code }}</p>
                            </td>
														<td>
                                <input
                                    v-if="editMode"
																		v-model="product.slug"
                                    type="text"
                                    class="form-control"
                                />
                                <p v-else>{{ product.slug }}</p>
                            </td>


                            <!-- Action buttons -->
                            <td v-if="editMode" width="1px">
                                <button
																		href="#"
                                    class="btn btn-sm btn-secondary"
                                    v-on:click="onClickUpdate()"> Actualizar
                                </button>
                            </td>
                            <td v-else width="1px">
                                <button
																		href="#"
                                    class="btn btn-sm btn-primary"
                                    v-on:click="onClickEdit()"> Editar
                                </button>
                            </td>
                            <td width="1px">
                                <button
																		href="#"
                                    class="btn btn-sm btn-danger"
                                    v-on:click="onClickDelete()"> Eliminar
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ["product"],
    data() {
        return {
            editMode: false
            /* product: {
					'id' : '',
          'code': '',
          'slug': '',
          'created_at': ''
				} */
        };
    },
    mounted() {
        console.log(this.editMode);
    },
    methods: {
        onClickDelete() {
					axios.delete(`/products/${this.product.id}`).then(() => {
						//Emitimos el borrado hacia el componente padre general
						this.$emit("delete");
					})
        },
        onClickEdit() {
          this.editMode = true;
        },
				onClickUpdate() {
					const params = {
						name: this.product.name, 
            code: this.product.code,
            slug: this.product.slug,
					}
					axios.put(`/products/${this.product.id}`, params).then((response) => {
						this.editMode = false;
						//Informacion del nuevo registro
						const product = response.data;
						//Emitimos el update hacia el componente padre general
						this.$emit("update", product);
					})
				}
    }
};
</script>
