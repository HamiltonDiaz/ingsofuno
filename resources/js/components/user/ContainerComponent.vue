<template>
<div>
    <v-container>
        <v-simple-table fixed-header height="300px">
            <template v-slot:default>
                <thead>
                    <tr>
                        <th class="text-left">
                            Opciones
                        </th>
                        <th class="text-left">
                            Nombre
                        </th>
                        <th class="text-left">
                            Email
                        </th>
                        <th class="text-left">
                            Creación
                        </th>
                        <th class="text-left">
                            Actualización
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="item in listUsers" :key="item.id">
                        <td style="width:170px;">
                            <v-btn @click="openModal('update')" >
                                <v-icon color="green">mdi-pencil-outline</v-icon>
                            </v-btn>
                            <v-btn>
                                <v-icon color="red">mdi-delete-sweep-outline</v-icon>
                            </v-btn>
                        </td>
                        <td>{{ item.name }}</td>
                        <td>{{ item.email }}</td>
                        <td>{{ item.created_at }}</td>
                        <td>{{ item.updated_at }}</td>
                    </tr>
                </tbody>
            </template>
        </v-simple-table>
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
                <v-row class="mx-2" >
                    <v-col cols="12" md="4">
                        <v-text-field label="Nombre" v-model="user.name"></v-text-field>                        
                    </v-col>
                    <v-col cols="12" md="4">                        
                        <v-text-field label="Email" v-model="user.email"></v-text-field>
                    </v-col>
                    <v-col cols="12" md="4">                        
                        <v-text-field label="Password" v-model="user.password" :type="false ? 'text' : 'password'" ></v-text-field>
                    </v-col>
                </v-row>
                <pre> {{user}} </pre>
            </v-container>

            <v-divider></v-divider>

            <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn color="primary" text @click="saveUser()">
                    Guardar
                </v-btn>
            </v-card-actions>
        </v-card>
    </v-dialog>
    <!-- fin dialog -->

</div>
</template>

<script>
import {
    mapState
} from 'vuex'
import axios from 'axios'

export default {
    data() {
        return {
            action: '',
            dialog: false,
            title:'',
            user:{
                name:'',
                email:'',
                password:''
            }
        }
    },

    computed: {
        //esto esa para poder traer la iformación que devuelve la petición /store/module/users/getUsers
        ...mapState('users', ['listUsers'])
    },

    mounted() {
        //esto para cuando se monte el componente
        this.$store.dispatch('users/getUsers');
    },

    methods: {
        openModal(action) {
            switch (action) {
                case 'insert': {
                    this.dialog= true
                    this.title="Nuevo Usuario"
                    break;
                }
                case 'update': {
                    this.dialog= true
                    this.title="Editar Usuario"
                    break;
                }
            }
        },

        saveUser(){
            axios.post("http://localhost/ingsofuno/public/api/user/store",
            {
                name:this.user.name,
                email:this.user.email,
                password: this.password,
            })
            .then(response=>{
                if(response.data.user){
                    this.dialog=false
                    this.$store.dispatch('users/getUsers');
                }
            })
        }
    }
}
</script>
