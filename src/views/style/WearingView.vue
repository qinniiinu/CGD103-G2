<template>
	<div class="main-part">
		
		<input type="checkbox" id="switch">
		<div  class="sidemenu_box">
			<label for="switch" class="filter">
				<font-awesome-icon class="f_icon" icon="fa-solid fa-filter" />
			</label>
			<styleSideMenu class="sidemenu"></styleSideMenu>
		</div>
		<div class="mask"></div>
		

		<div class="look-product">
			<!-- <SearchBar class="searchbar" /> -->
			  <div class="container">
					<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4">
						<div class="col" v-for="(look,index) of looks" :key="index" >
								<lookCard :link="`./look/${look.combo_main_pic}`" :tag1="cut1(look.hashtag)" :tag2="cut2(look.hashtag)" :tag3="cut3(look.hashtag)" :ootdName="look.combo_name" :heartId="look.combo_id" :idlink="look.combo_id"></lookCard>
						</div>
					</div>
			  </div>
			
		</div>
	</div>
</template>
<script>
import styleSideMenu from "@/components/styleSideMenu.vue";
import lookCard from "@/components/lookCard.vue";
import SearchBar from "@/components/product/SearchBar.vue";
import { BASE_URL } from "../../assets/js/common.js";
export default {
	name: "Wearing",
	components: {
		styleSideMenu,lookCard,SearchBar
	},

	data(){
		return{
			looks:[],
			tmp:[],
			// cols:[
			// 	{src:'/look/look-1.jpg',ootdName:'OOTD-001',tag:['#上班穿搭','＃沙漏形','素色'],id:'01'},
			// 	{src:'/look/look-2.jpg',ootdName:'OOTD-002',tag:['#約會穿搭','＃梨形'],id:'02'},
			// 	{src:'/look/look-3.jpg',ootdName:'OOTD-003',tag:['#上課穿搭','＃蘋果形'],id:'03'},
			// 	{src:'/look/look-4.jpg',ootdName:'OOTD-004',tag:['#上課穿搭','＃蘋果形','單寧'],id:'04'},
			// 	{src:'/look/look-5.jpg',ootdName:'OOTD-005',tag:['#開會穿搭','＃蘋果形'],id:'05'},
			// 	{src:'/look/look-6.jpg',ootdName:'OOTD-006',tag:['#旅行穿搭','＃蘋果形'],id:'06'},
			// 	{src:'/look/look-7.jpg',ootdName:'OOTD-007',tag:['#趴踢穿搭','＃蘋果形'],id:'07'},
			// 	{src:'/look/look-8.jpg',ootdName:'OOTD-008',tag:['#宴會穿搭','＃蘋果形'],id:'08'},
			// 	{src:'/look/look-9.jpg',ootdName:'OOTD-009',tag:['#運動穿搭','＃蘋果形'],id:'09'},
			// 	{src:'/look/look-10.jpg',ootdName:'OOTD-010',tag:['#運動穿搭','＃蘋果形'],id:'10'},
			// 	{src:'/look/look-11.jpg',ootdName:'OOTD-011',tag:['#運動穿搭','＃蘋果形'],id:'11'},
			// ]
		}
	},
	computed: {
//         bread() {
//             let arr = [{ name: "穿搭總覽", link: "/Wearing" }];
//             // if (JSON.stringify(this.$route.query) == "{}") {
//             //     return arr;
//             // }
//             if (this.$route.query.S) {
//                 arr.push({
//                     name: `搜尋關鍵字：` + this.$route.query.S,
//                     link: `/Wearing?S=${this.$route.query.S}`,
//                 });
//             }
// 
//             return arr;
//         },
    },
    watch: {
        $route: function () {
            this.getResource();
        },
    },
    methods: {
//         search(val) {
//             const query_current = location.search;
// 
//             if (val != "") {
//                 this.looks = this.looks.filter((look) => {
//                     if (JSON.stringify(look).indexOf(val) !== -1) {
//                         return look;
//                     }
//                 });
//                 this.$router.push(`/Wearing?${query_current}&S=${val}`);
//             } else {
//                 this.$router.push(`/Wearing?${query_current}`);
//             }
//         },
        // sort(val) {
        //     if (val == "StoB") {
        //         this.product = this.product.sort(function (a, b) {
        //             return a.unit_price - b.unit_price;
        //         });
        //     } else {
        //         this.product = this.product.sort(function (a, b) {
        //             return b.unit_price - a.unit_price;
        //         });
        //     }
        // },
        // resultproduct() {
        //     if (location.search !== "") {
        //         this.scrollBlock();
        //         let result = this.tmp;
        //         // if (this.$route.query.G) {
        //         //     this.looks = this.looks.filter((e) => {
        //         //         return e.product_gender == this.$route.query.G;
        //         //     });
        //         // }
        //         // if (this.$route.query.M) {
        //         //     this.looks = this.looks.filter((e) => {
        //         //         return e.looks_maintype == this.$route.query.M;
        //         //     });
        //         // }
        //         if (this.$route.query.T) {
        //             this.looks = this.looks.filter((look) => {
        //                 return look.looks_type == this.$route.query.T;
        //             });
        //         }
        //     } else {
        //         this.looks = this.tmp;
        //     }
        // },
        // scrollBlock() {
        //     console.log(window.innerWidth);
        //     const height =
        //         window.innerWidth >= 500 ? 650 : window.innerWidth * 0.85;
        //     window.scrollTo({
        //         top: height,
        //         behavior: "smooth",
        //     });
        // },
        getResource() {
            this.axios.get(`${BASE_URL}/look_list.php`).then((response) => {
                this.looks = this.tmp = response.data;
                // this.resultproduct();
            });
        },
		cut1(x) {
            if (x) return x.split(",")[0];
        },
		cut2(x) {
            if (x) return x.split(",")[1];
        },
		cut3(x) {
            if (x) return x.split(",")[2];
        },
    },
    created() {
        this.getResource();
    },
	
};
</script>
<style lang="scss" scoped>
	@import "@/assets/sass/grid";
	
	.main-part{
		position: relative;
			display: flex;
			width: 80%;
			max-width: 1200px;
			margin: auto;
			margin-bottom: 100px;

		}
	.look-product{
		// margin: auto;    
		@include xl{
			margin-top: 0px;
		}
	
		width: 75%;

		.searchbar{
			margin-right: 30px;
			@include m{
				margin-right: 0px;
			}
		}
		.container{
			margin-top:50px;
			
			.row{
				
				.col{
					margin-bottom: 30px;
					
				}
			}
		}
	}
	#switch{
		display: none;
	}
	#switch:checked+.sidemenu_box .sidemenu{
		opacity: 1;
		transition: transform .5s 0s;
		transform:scaleX(1);
		transform:translateX(0px) ;
		
		position: relative;
		// z-index: 2;
		
		
	}
	.sidemenu_box{
		
		margin-left:auto ;
		order: 1;
		position:absolute;
		top: 0;
		right: 0;
		z-index: 2;
		.filter{
			display: block;
			width: 30px;
			height: 30px;
			background-color: #fff;
			border: 1px solid $title_color;
			margin: 10px;
			margin-right: 0;
			margin-left: auto;
			@include m{
				display: none;
			}
			.f_icon{
				display: block;
				margin:8px auto;

				// padding-top:25px ;
			}


		}
		.sidemenu{
			transform:scaleX(0);
			transform:translateX(500px) ;
			background-color: #fff;
			border: 1px solid $title_color;
			margin-top:-2px ;
			margin-left: auto;
			transition: transform .5s 0s ,opacity .5s 0s;
			// border-right:0px ;
			opacity: 0;
			position:absolute;
			
			

			

			
			@include m{
				// display: none;
				margin-top:50px ;
				transform:scaleX(0);
				transform:translateX(0px) ;
				// border-right:1px  solid $title_color;
				opacity: 1;
				position:relative;
			}
		}
		
	
		
		@include m{
			order: -1;
			position: relative;
			width: 25%;
		}
	}
	.mask{
		background-color:rgb(255,255, 255,.5) ;
		backdrop-filter: blur(3px);
		width: 100%;
		height: 100%;
		position: fixed;
		top: 0;
		left: 0;
		// z-index: -1;
		opacity: 0;
		transition: opacity .5s 0s;
		@include m{display: none;}
				

	}

	#switch:checked+.sidemenu_box+.mask{
		opacity: 1;
		z-index: 1;
		transition: opacity .5s 0s;
	}
</style>
