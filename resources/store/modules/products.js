import axios from 'axios';


const state = {
    dataResponse: {},
    listProducts:[],
    message: '',
    

};

const getters = {};
const actions = {
    
    async getProducts({commit}){        
        const response = await axios.get("/products")
        commit('SET_LISTPRODUCTS',response.data.products)        
    },
    
    async saveProduct({commit}, product){        
        const response = await axios.post("/products/store",
        {
            nombre: product.nombre,
            img: product.img,
            precio_actual: product.precio_actual,
            precio_anterior: product.precio_anterior,
            cantidad: product.cantidad,
            active: product.active,
            eliminado: product.eliminado,
        })
        commit('SET_DATA',response.data.product)
    },

    async updateProduct({commit}, user){        
        console.log(user)
        const response = await axios.put("/products/update",
        {
            nombre: product.nombre,
            img: product.img,
            precio_actual: product.precio_actual,
            precio_anterior: product.precio_anterior,
            cantidad: product.cantidad,
            active: product.active,
            eliminado: product.eliminado,
        })
        commit('SET_DATA',response.data.product)
        
    }


};

const mutations = {
    //es para poder modificar las variables del state
    SET_LISTPRODUCTS(state, data){
        state.listProducts = data;
    },

    SET_DATA(state, data){
        state.dataResponse = data;
    },
    
};

export default {
    namespaced: true, 
    state, 
    getters, 
    actions, 
    mutations
}
