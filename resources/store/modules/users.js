import axios from 'axios';


const state = {
    listUsers:[],    
};

const getters = {};
const actions = {

    getUsers({commit}){
        axios.get('/ingsofuno/public/api/user/users')
        .then ( response => {
            commit('SET_LISTUSERS', response.data.users)
        });
    },

};

const mutations = {
    //es para poder modificar las variables del state 
    SET_LISTUSERS(state, data){
        state.listUsers = data;
    },
};

export default {
    namespaced: true, 
    state, 
    getters, 
    actions, 
    mutations
}
