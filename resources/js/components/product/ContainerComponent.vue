<template>
<div>

    <v-container>
    <v-item-group multiple>
        <v-row>
            <v-col v-for="product in listProducts" :key="product.id" cols="12" sm="4" md="2">
                <v-card class="mx-auto" max-width="350" max-height="360">
                    <v-img width="120px" class="mx-auto"  height="130px" :src="product.img">
                    </v-img>

                    <v-card-subtitle class="pb-0 " style="height: 50px; font-size: 12px; overflow: hidden; padding: 5px 15px; color: #006064; font-weight: bold;">
                        {{product.nombre}}
                    </v-card-subtitle>
                    
                    <v-card-text style="color: #E91E63; font-weight: bold;">
                        <div>${{product.precio_actual}}</div>
                    </v-card-text>

                    <v-card-actions style="justify-content: center !important;" >
                        <v-btn color="primary" dark text  @click="openModal('update', product)">
                            Editar
                        </v-btn>
                        <v-btn color="warning" dark text @click="openModal('activate', product)">
                            Inactivar
                        </v-btn>
                    </v-card-actions>
                </v-card>
            </v-col>
        </v-row>
    </v-item-group>
        </v-container>

    
    <v-btn color="green" bottom dark fab fixed right @click="openModal('insert')">
        <v-icon>mdi-plus</v-icon>
    </v-btn>

    <!-- inicio dialog -->
    <v-dialog v-model="dialog" width="800">
        <v-card>
            <v-card-title class="teal darken-4" style="color: #fff">
                {{title}}
            </v-card-title>

            <v-container>
                <v-row class="mx-2">
                    <v-col cols="12" md="4">
                        <v-text-field label="Nombre" v-model="product.nombre"></v-text-field>
                    </v-col>
                    <v-col cols="12" md="4">
                        <v-text-field label="Precio Actual" v-model="product.precio_actual"></v-text-field>
                    </v-col>

                    <v-col cols="12" md="4">
                        <v-text-field label="Precio Anterior" v-model="product.precio_anterior"></v-text-field>
                    </v-col>
                    <v-col cols="4" md="4">
                        <v-text-field label="Cantidad" v-model="product.cantidad"></v-text-field>
                    </v-col>
                    <v-col cols="8" md="8">
                        <v-text-field label="imagen" v-model="product.img"></v-text-field>
                    </v-col>
                    <v-col cols="4" md="4">                    
                        <v-img width="120px" class="mx-auto"  height="130px" :src="product.img"></v-img>
                    </v-col>
                    <v-col cols="8" md="8">                    
                        <div style="width: 90%; justify-content: center; margin: auto; color: red" v-for="(item, id) in errorMessage" :key="id">
                            <h6 class="text-center">{{item}}</h6>
                        </div>                        
                    </v-col>
                </v-row>
                <div class="text-error">{{message}}</div>
            </v-container>

            <v-divider></v-divider>

            <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn color="primary" text @click="save()" v-if="actionType==1">
                    Guardar
                </v-btn>
                <v-btn color="primary" text @click="update()" v-if="actionType!=1">
                    Actualizar
                </v-btn>
            </v-card-actions>
        </v-card>
    </v-dialog>
    <!-- fin dialog -->

</div>
</template>

<script>
import {
    mapState,
    mapActions
} from 'vuex'

export default {
    data() {
        return {
            actionType: 0,
            title: '',
            dialog: false,
            errorMessage: [],
            errorProduct: 0,
            user: {
                id: 0,
                name: '',
                email: '',
                password: ''
            },
            product:{
                id:0,
                nombre:"",
                img:"",
                precio_actual:0,
                precio_anterior:0,
                cantidad:0,
                active:0,
                eliminado:0,
            },
            listOptions: [{
                    id: 1,
                    description: 'Si'
                },
                {
                    id: 2,
                    description: 'No'
                },
            ],
            checkPassword: 2
        }
    },

    computed: {
        //esto esa para poder traer las variables del storee que devuelve la petición /store/modules/products
        ...mapState('products', ['listProducts', 'message', 'dataResponse'])
    },

    mounted() {
        //esto para cuando se monte el componente
        this.$store.dispatch('products/getProducts');
    },

    methods: {

        //con esto se traen las aciones de /store/modules/products
        ...mapActions('products', ['getProducts', 'saveProduct', 'updateProduct']),

        openModal(action, data) {
            switch (action) {
                case 'insert': {
                    this.actionType = 1
                    this.dialog = true
                    this.title = "Crear"
                    this.errorMessage = []
                    this.errorProduct = 0
                    this.product.nombre= ""
                    this.product.img=""
                    this.product.precio_actual= ""
                    this.product.precio_anterior= ""
                    this.product.cantidad=""                    
                    break;
                }
                case 'update': {
                    this.actionType = 2
                    this.dialog = true
                    this.title = "Editar"
                    this.errorMessage = []
                    this.errorProduct = 0
                    this.product.nombre= data.nombre
                    this.product.img= data.img
                    this.product.precio_actual= data.precio_actual
                    this.product.precio_anterior= data.precio_anterior
                    this.product.cantidad= data.cantidad                    
                    break;
                }
                case 'activate': {
                    this.actionType = 3
                    this.dialog = true
                    this.title = "Acitivar/Desactivar"
                    this.errorMessage = []
                    this.errorProduct = 0
                    this.product.active= data.active
                    this.product.eliminado= data.eliminado
                    break;
                }
            }
        },

        validate() {
            this.errorMessage = []
            this.errorProduct = 0

            if (!this.product.nombre) {
                this.errorMessage.push("Digite el nombre del producto")
            }
            if (!this.product.img) {
                this.errorMessage.push("Escriba URL de la imagen")
            }

            if (!this.product.precio_actual) {
                this.errorMessage.push("Digite precio actual")
            }
            if (!this.product.precio_anterior) {
                this.errorMessage.push("Escriba Precio Anterior")
            }

            if (this.errorMessage.length) {
                this.errorProduct = 1
            }
            return this.errorProduct
        },

        save() {
            if (this.validate()) {
                return
            }

            this.errorMessage = [];
            this.saveProduct(this.product)
                .then(() => {
                    this.dialog = false
                    this.getUsers()
                }).catch((e) => {
                    this.errorMessage = e.response.data.errors;
                })
        },
        update() {
            if (this.validate()) {
                return
            }
            this.updateUser(this.user)
                .then(() => {
                    this.getUsers()
                    this.dialog = false
                }).catch((e) => {
                    this.errorMessage = e.response.data.errors;
                })
        },

    }
}
</script>
