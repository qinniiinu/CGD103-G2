import { createApp } from "vue";
import App from "./App.vue";
import router from "./router";
import store from "./store";
// import "sass/main.scss";
// import "bootstrap";
// import "bootstrap/dist/css/bootstrap.min.css";
// import "@/assets/sass/main.scss";
// import "bootstrap/sass/bootstrap.scss";

import { library } from "@fortawesome/fontawesome-svg-core";

/* import font awesome icon component */
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";

/* import specific icons */
import {
<<<<<<< HEAD
	faUserSecret,
	faCartShopping,
	faUser,
	faHeart,
} from "@fortawesome/free-solid-svg-icons";

/* add icons to the library */
library.add(faUserSecret, faCartShopping, faUser,faHeart
	);
=======
    faUserSecret,
    faCartShopping,
    faUser,
    faStar,
    faBook,
} from "@fortawesome/free-solid-svg-icons";

/* add icons to the library */
library.add(faUserSecret, faCartShopping, faUser, faStar, faBook);
>>>>>>> develop

createApp(App)
    .use(store)
    .use(router)
    .component("font-awesome-icon", FontAwesomeIcon)
    .mount("#app");
