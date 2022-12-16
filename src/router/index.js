import { createRouter, createWebHistory } from "vue-router";
import HomeView from "../views/HomeView.vue";

const routes = [
	{
		path: "/",
		name: "home",
		component: HomeView,
		meta:{
			title:'首頁'
		}
	},
	{
		path: "/about",
		name: "about",
		component: () => import("../views/AboutView.vue"),
	},
	{
		path: "/Faq",
		name: "Faq",
		component: () => import("../views/FaqView.vue"),
	},
	{
		path: "/ootd",
		name: "ootd",
		component: () => import("../views/OotdView.vue"),
	},
	{
		path: "/product",
		name: "product",
		component: () => import("../views/product/ProductView.vue"),

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
		path:"/SubCheckout",
		name:"SubCheckout",
		component: () => import("../views/SubCheckoutView.vue")
	},
	{
		path: "/fittingroom",
		name: "fittingroom",
		component: () => import("../views/FittingRoomView.vue"),
		meta:{
			title:'試衣間'
		}
	},
	{
		path: "/fittingroom1",
		name: "fittingroom1",
		component: () => import("../views/FittingRoom1View.vue"),
	},
	{
		path: "/fittingroom2",
		name: "fittingroom2",
		component: () => import("../views/FittingRoom2View.vue"),
	},
	{
		path: "/fittingroom3",
		name: "fittingroom3",
		component: () => import("../views/FittingRoom3View.vue"),
	},
	// {
	// 	path: "/login",
	// 	name: "login",
	// 	component: () => import("../views/LoginView.vue"),
	// },
	{
		path: "/login", //登入
		name: "SigninIn",
		component: () => import("../components/loginpage/SigninIn.vue"),
	},
	{
		path: "/Signup", //註冊
		name: "Signup",
		component: () => import("../components/loginpage/Signup.vue"),
	},
	{
		path: "/SignupSet", //身形建置
		name: "SignupSet",
		component: () => import("../components/loginpage/SignupSet.vue"),
	},
	{
		path: "/productdetails/:id",
		component: () => import("../views/product/ProductDetailsView.vue"),
	},
	{
		path: "/productlist",
		name: "productlist",
		component: () => import("../views/product/ProductListView.vue"),
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
		meta:{
			title:'一週穿搭'
		}
	},


	// ----------myaccount START----------

	{
		path: "/MyPage",
		name: "MyPage",
		component: () => import("../views/myaccount/MyPageView.vue"),
		children: [
			{
				path: '',
				name: "Over",
				component: () => import("../views/myaccount/OverView.vue")
			},
			{
				path: "BodyType",
				name: "BodyType",
				component: () => import("../views/myaccount/BodyTypeView.vue"),
			},
			{
				path: "memQuiz",
				name: "memQuiz",
				component: () => import("../views/myaccount/MemQuizView.vue"),
			},
			{
				path: "MemMaintain",
				name: "MemMaintain",
				component: () => import("../views/myaccount/MemMaintainView.vue"),
			},
			{
				path: "Consultation",
				name: "Consultation",
				component: () => import("../views/myaccount/ConsultationView.vue"),
			},
			{
				path: "memSubscription",
				name: "memSubscription",
				component: () => import("../views/myaccount/MemSubscriptionView.vue"),
			},
			{
				path: "Favorites",
				name: "Favorites",
				component: () => import("../views/myaccount/FavoritesView.vue"),
			},
		]
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
		if (to.name !== from.name) return {
			top: 0,
			left: 0,
			behavior: 'smooth'
		}
	},
});

export default router;
