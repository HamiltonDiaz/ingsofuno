import axios from 'axios';


const state = {
    products: [],
    message: '',
    

};

const getters = {};
const actions = {
    
    async getProducts({commit}, products){        
        console.log(products)
        const response = await axios.get("/products")
        commit('SET_DATA',response.data.products)
        
    }
};

const mutations = {
    //es para poder modificar las variables del state
    SET_DATA(state, data){
        state.products = data;
    },
    
};

export default {
    namespaced: true, 
    state, 
    getters, 
    actions, 
    mutations
}
