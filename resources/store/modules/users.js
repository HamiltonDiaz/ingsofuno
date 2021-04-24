import axios from 'axios';


const state = {
    listUsers:[],
    currenteUser:{}
};

const getters = {};
const actions = {

    getUsers({commit}){
        axios.get('/ingsofuno/public/api/user/users')
        .then ( response => {
            commit('SET_LISTUSERS', response.data.users)
        });
    },

    getCurrent({commit}){
        axios.get('/ingsofuno/public/api/user/current') 
        .then ( response => {            
            commit('SET_CURRENTUSER',response.data.user)
        });        
    }
};

const mutations = {
    //es para poder modificar las variables del state 
    SET_LISTUSERS(state, data){
        state.listUsers = data;
    },
    SET_CURRENTUSER(state, data){
        state.currenteUser = data;
    },
};

export default {
    namespaced: true, 
    state, 
    getters, 
    actions, 
    mutations
}
