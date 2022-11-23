import { createRouter, createWebHistory } from "vue-router";
import HomeView from "../views/HomeView.vue";

const routes = [
	{
		path: "/",
		name: "home",
		component: HomeView,
	},
	{
		path: "/about",
		name: "about",
		// route level code-splitting
		// this generates a separate chunk (about.[hash].js) for this route
		// which is lazy-loaded when the route is visited.
		// component: () => import(/* webpackChunkName: "about" */ '../views/AboutView.vue')
		component: () => import("../views/AboutView.vue"),
	},
	{
		path: "/product",
		name: "product",
		// route level code-splitting
		// this generates a separate chunk (about.[hash].js) for this route
		// which is lazy-loaded when the route is visited.
		// component: () => import(/* webpackChunkName: "about" */ '../views/AboutView.vue')
		component: () => import("../views/product.vue"),
	},
	{
		path: "/subscription",
		name: "subscription",
		component: () => import("../views/Subscription.vue"),
	},
	{
		path: "/ootd",
		name: "ootd",
		component: () => import("../views/OotdView.vue"),
	},
	{
		path: "/product",
		name: "product",
		component: () => import("../views/Product.vue"),
	},
];

const router = createRouter({
	history: createWebHistory(process.env.BASE_URL),
	routes,
});

export default router;
