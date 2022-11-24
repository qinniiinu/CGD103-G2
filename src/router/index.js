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
		path: "/MulStylesView",
		name: "MulStylesView",
		component: () => import("../views/style/MulStylesView.vue"),
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
	// ------------後台區------------
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
		path: "/CommodityMgnt",
		name: "CommodityMgnt",
		component: () => import("../views/back_end/CommodityMgntView.vue"),
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
	// ------------後台區 end------------
	{
		path: "/BodyType",
		name: "BodyType",
		component: () => import("../views/myaccount/BodyTypeView.vue"),
	},
	{
		path: "/Consultation",
		name: "Consultation",
		component: () => import("../views/myaccount/ConsultationView.vue"),
	},
	{
		path: "/Favorites",
		name: "Favorites",
		component: () => import("../views/myaccount/FavoritesView.vue"),
	},
	{
		path: "/MemMaintain",
		name: "MemMaintain",
		component: () => import("../views/myaccount/MemMaintainView.vue"),
	},
	{
		path: "/OrderDetails",
		name: "OrderDetails",
		component: () => import("../views/myaccount/OrderDetailsView.vue"),
	},
	{
		path: "/Subscription",
		name: "Subscription",
		component: () => import("../views/myaccount/SubscriptionView.vue"),
	},
	{
		path: "/Confirm",
		name: "Confirm",
		component: () => import("../views/style/ConfirmView.vue"),
	},
	{
		path: "/Consultating",
		name: "Consultating",
		component: () => import("../views/style/ConsultatingView.vue"),
	},
	{
		path: "/ConsultIntro",
		name: "ConsultIntro",
		component: () => import("../views/style/ConsultIntroView.vue"),
	},
	{
		path: "/List",
		name: "List",
		component: () => import("../views/style/ListView.vue"),
	},
	{
		path: "/MulStyles",
		name: "MulStyles",
		component: () => import("../views/style/MulStylesView.vue"),
	},
	{
		path: "/Quiz",
		name: "Quiz",
		component: () => import("../views/style/QuizView.vue"),
	},
	{
		path: "/Set",
		name: "Set",
		component: () => import("../views/style/SetView.vue"),
	},
	{
		path: "/Wearing",
		name: "Wearing",
		component: () => import("../views/style/WearingView.vue"),
	},
];

const router = createRouter({
	history: createWebHistory(process.env.BASE_URL),
	routes,
});

export default router;
