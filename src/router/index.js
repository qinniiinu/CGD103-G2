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
		path: "/subscription",
		name: "subscription",
		component: () => import("../views/SubscriptionView.vue"),
	},
	{
		path: "/ootd",
		name: "ootd",
		component: () => import("../views/OotdView.vue"),
	},
	{
		path: "/product",
		name: "product",
		component: () => import("../views/ProductView.vue"),
	},
	{
		path: "/test",
		name: "test",
		component: () => import("../views/TestView.vue"),
	},
	{
		path: "/mulstyle",
		name: "mulstyle",
		component: () => import("../views/MulStyleView.vue"),
	},
	{
		path: "/cart",
		name: "cart",
		component: () => import("../views/CartView.vue"),
	},
	{
		path: "/checkout",
		name: "checkout",
		component: () => import("../views/CheckoutView.vue"),
	},
	{
		path: "/fittingroom",
		name: "fittingroom",
		component: () => import("../views/FittingRoomView.vue"),
	},
	{
		path: "/login",
		name: "login",
		component: () => import("../views/LoginView.vue"),
	},
	{
		path: "/productdetails",
		name: "productdetails",
		component: () => import("../views/ProductDetailsView.vue"),
	},
	{
		path: "/productlist",
		name: "productlist",
		component: () => import("../views/ProductListView.vue"),
	},
	{
		path: "/subscription",
		name: "subscription",
		component: () => import("../views/SubscriptionView.vue"),
	},
	{
		path: "/weeklywear",
		name: "weeklywear",
		component: () => import("../views/WeeklyWearView.vue"),
	},
	{
		path: "/OperationMgnt",
		name: "OperationMgnt",
		component: () => import("../views/back_end/OperationMgmtView.vue"),
	},
	{
		path: "/MemberMgmt",
		name: "MemberMgmt",
		component: () => import("../views/back_end/MemberMgmtView.vue"),
	},
	{
		path: "/SubscriptionMgmt",
		name: "SubscriptionMgmt",
		component: () => import("../views/back_end/SubscriptionMgmtView.vue"),
	},
	{
		path: "/StylistMgmt",
		name: "StylistMgmt",
		component: () => import("../views/back_end/StylistMgmtView.vue"),
	},
	{
		path: "/OneweekDressing",
		name: "OneweekDressing",
		component: () => import("../views/back_end/OneweekDressingMgntView.vue"),
	},
	{
		path: "/ClothingMatchMgnt",
		name: "ClothingMatchMgnt",
		component: () => import("../views/back_end/ClothingMatchMgntView.vue"),
	},
	{
		path: "/OrderMgnt",
		name: "OrderMgnt",
		component: () => import("../views/back_end/OrderMgntView.vue"),
	},
	{
		path: "/AppointmentMgnt",
		name: "AppointmentMgnt",
		component: () => import("../views/back_end/AppointmentMgntView.vue"),
	},
	{
		path: "/StaffMgnt",
		name: "StaffMgnt",
		component: () => import("../views/back_end/StaffMgntView.vue"),
	},
	{
		path: "/ClientMgmt",
		name: "ClientMgmt",
		component: () => import("../views/back_end/ClientMgmtView.vue"),
	},
];

const router = createRouter({
	history: createWebHistory(process.env.BASE_URL),
	routes,
});

export default router;
