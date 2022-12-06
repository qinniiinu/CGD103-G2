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
		component: () => import("../views/AboutView.vue"),
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
		path: "/FindStyle",
		name: "FindStyle",
		component: () => import("../views/FindStyleView.vue"),
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
		path: "/checkout1",
		name: "checkout1",
		component: () => import("../views/Checkout1View.vue"),
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
		path: "/productdetails/:id",
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


	// ----------myaccount START----------
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
		path: "/MyPage",
		name: "MyPage",
		component: () => import("../views/myaccount/MyPageView.vue"),
	},
	{
		path: "/OrderDetails",
		name: "OrderDetails",
		component: () => import("../views/myaccount/OrderDetailsView.vue"),
	},
	{
		path: "/OrderHistory",
		name: "OrderHistory",
		component: () => import("../views/myaccount/OrderHistoryView.vue"),
	},
	{
		path: "/OrderHistoryPhoto",
		name: "OrderHistoryPhoto",
		component: () => import("../views/myaccount/OrderHistoryPhotoView.vue"),
	},
	{
		path: "/OrderHistoryDetail",
		name: "OrderHistoryDetail",
		component: () => import("../views/myaccount/OrderHistoryDetailView.vue"),
	},
	{
		path: "/memSubscription",
		name: "memSubscription",
		component: () => import("../views/myaccount/MemSubscriptionView.vue"),
	},
	{
		path: "/memQuiz",
		name: "memQuiz",
		component: () => import("../views/myaccount/MemQuizView.vue"),
	},
	// ----------myaccount END----------
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
		path: "/Chat",
		name: "Chat",
		component: () => import("../views/style/ChatView.vue"),
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
		path: "/QuestionBox",//風格測驗題目
		name: "QuestionBox",
		component: () => import("../views/style/quiz/QuestionBoxView.vue"),
	},
	{
		path: "/ResultSport",//測驗結果-運動風
		name: "ResultSport",
		component: () => import("../views/style/quiz/ResultSportView.vue"),
	},
	{
		path: "/ResultHipster",//測驗結果-文青風
		name: "ResultHipster",
		component: () => import("../views/style/quiz/ResultHipsterView.vue"),
	},
	{
		path: "/ResultFashion",//測驗結果-時尚風
		name: "ResultFashion",
		component: () => import("../views/style/quiz/ResultFashionView.vue"),
	},
	{
		path: "/ResultMinimalist",//測驗結果-極簡風
		name: "ResultMinimalist",
		component: () => import("../views/style/quiz/ResultMinimalistView.vue"),
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
	scrollBehavior(to, from, savedPosition) {
		if (savedPosition) {
			return savedPosition
		} else {
			return { top: 0 }
		}
	},
});

export default router;
