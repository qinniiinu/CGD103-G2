import { createStore } from 'vuex'

export default createStore({
  state: {
    sub: [],
    cart: [],
    list:[],
    mem_id: null,
    user:null
  },
  getters: {
    // cartTotal(state) {
    //   if (state.cart.length > 0) {
    //     let total = 0
    //     for (const index in state.cart) {
    //       total += state.cart[index]['count'] * state.cart[index]['price']
    //     }
    //     return parseInt(total);
    //   } else {
    //     return 0
    //   }
    // },
    // setStorage(){
    //   const data = JSON.stringify(state.cart);
    //     localStorage.setItem("cart", data);
    // }
    
  },
  mutations: {
    // User(state,no){
    //   state.mem_id=no;
    // },
    // getCart(state,list){
    //   state.cart=list;
    // },
    // add(state,item){
    //   state.cart.push(item)
    // },
    // update(state,item){
    //   const pd_id=item.id
    // }
  },
  actions: {
    // async setSub(context){
    //   const res=
    // }
  },
  modules: {
  }
})
