import { createApp } from "vue";
import App from "./App.vue";
import router from "./router";
import store from "./store";

import { library } from '@fortawesome/fontawesome-svg-core'

/* import font awesome icon component */
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

/* import specific icons */
import { faUserSecret,faCartShopping,faUser } from '@fortawesome/free-solid-svg-icons'


/* add icons to the library */
library.add(faUserSecret,faCartShopping,faUser)


// import AccountCircleIcon from 'node_modules/@mui/icons-material/AccountCircle';
// import "bootstrap";
// import "sass/main.scss";
// import "bootstrap/sass/bootstrap.scss";
// import "bootstrap/dist/css/bootstrap.min.css";

createApp(App).use(store).use(router).component('font-awesome-icon', FontAwesomeIcon).mount("#app");
