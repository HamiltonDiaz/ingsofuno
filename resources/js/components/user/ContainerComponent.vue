<template>
<div class="container">
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
                </tr>
            </thead>
            <tbody>
                <tr v-for="item in listUsers" :key="item.id">
                    <td style="width:170px;">
                        <v-btn>
                            <v-icon color="green" >mdi-pencil-outline</v-icon>
                        </v-btn>
                        <v-btn>
                            <v-icon color="red">mdi-delete-sweep-outline</v-icon>
                        </v-btn>
                    </td>                    
                    <td>{{ item.name }}</td>
                    <td>{{ item.email }}</td>
                    <td>{{ item.created_at }}</td>
                </tr>
            </tbody>
        </template>
    </v-simple-table>
</div>
</template>

<script>
import {
    mapState
} from 'vuex'
export default {
    computed: {
        //esto esa para poder traer la iformación que devuelve la petición /store/module/users/getUsers
        ...mapState('users', ['listUsers'])
    },

    mounted() {
        this.$store.dispatch('users/getUsers');
    }
}
</script>
