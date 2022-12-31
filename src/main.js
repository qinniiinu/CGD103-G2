import { createApp } from "vue";
import App from "./App.vue";
import router from "./router";
import store from "./store";
import axios from 'axios';
import VueAxios from 'vue-axios';
import { library } from "@fortawesome/fontawesome-svg-core";

/* import font awesome icon component */
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";

/* 商品組件 */
import ProductCard from "@/components/product/ProductCard.vue";
import ProductMenu from "@/components/product/ProductMenu.vue";


/* import specific icons */
import {
	faUserSecret,
	faCartShopping,
	faUser,
	faStar,
	faBook,
	faHeart,
	faFeather,
	faCoffee,
	faMagnifyingGlass,
	faBars,
	faCheck,
	faList,
	faClipboard,
	faPlus,
	faAngleRight,
	faMinus, faCaretDown,
	faArrowRight,
	faFilter,
	faRecycle,
	faSpinner




} from "@fortawesome/free-solid-svg-icons";


/* add icons to the library */
library.add(
	faUserSecret,
	faCartShopping,
	faUser,
	faStar,
	faHeart,
	faBook,
	faFeather,
	faCoffee,
	faMagnifyingGlass,
	faBars,
	faCheck,
	faList,
	faClipboard,
	faPlus,
	faAngleRight,
	faMinus,
	faCaretDown,
	faArrowRight,
	faFilter,
	faRecycle,
	faSpinner



);


// import Vue from 'vue';
// import VueCarousel from 'vue-carousel';

createApp(App)
	.use(store)
	.use(router)
	.use(VueAxios, axios)
	.component("font-awesome-icon", FontAwesomeIcon)
	.component("ProductCard", ProductCard)
	.component("ProductMenu", ProductMenu)
	.mount("#app");
