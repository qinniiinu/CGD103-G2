<template>

	<!-- 我的身型 -->
		<section class="body_style card">
			<div class="pic">
				<!-- <img :src="typeimg" alt=""> -->
				<img class="type_pic" :src="`/pic/${member.body_pic}`" :alt="member.body_shape" />
			</div>
			<div class="text">
				<h3 class="title">我的身型</h3>
				<!-- hashtag -->
				<type-tag :TypeTag="member.body_shape" class="type_tag"></type-tag>
				<bg-tag :Bgtag="member.body_shape" class="bgtag"></bg-tag>
				<router-link to="/MyPage/BodyType" class="more">
					<span class="text">查看更多</span>
					<font-awesome-icon icon="fa-solid fa-angle-right" />
				</router-link>
			</div>
		</section>


		<!-- 我的風格 無測驗紀錄 -->
		<section class="body_style card no_style" v-if="style_id==''">
			<div class="item">
				<h3 class="txt_box">尚未測驗</h3>
				<div class="btn_box">
					<router-link :to="{ name: 'Quiz' }">
						<button class="btn_s">測驗去</button>
					</router-link>
				</div>
    	</div>
		</section>

		<!-- 我的風格  -->
		<section v-else class="body_style card">
			<div class="pic">
				<!-- <img :src="typeimg" alt=""> -->
				<img class="type_pic" :src="`/pic/${style.style_pic}`" :alt="style.type_name" />
			</div>
			<div class="text">
				<h3 class="title">我的風格</h3>
				<!-- hashtag -->
				<type-tag :TypeTag="style.style_name" class="type_tag"></type-tag>
				<bg-tag :Bgtag="style.style_name" class="bgtag"></bg-tag>
				<router-link to="/MyPage/memQuiz" class="more">
					<span class="text">查看更多</span>
					<font-awesome-icon icon="fa-solid fa-angle-right" />
				</router-link>
			</div>
		</section>

	

</template>


<script>
import BgTag from "@/components/mypage/BgTag.vue";
import TypeTag from "@/components/mypage/TypeTag.vue";

export default {
  name: "MemCard",
  components: {
    BgTag,
    TypeTag,
  },
  data() {
    return {
		member:{},
		style:{},
		style_id:'',
    };
  },
  created(){
   
	},
	mounted() {
    this.getResource();
  },
	methods: {
    getResource() {
			this.axios.get('/api_server/memberInfo.php')
    	.then(res => {
			this.member = res.data
				if(res.data.style_id){ //有風格測驗
					this.style_id = res.data.style_id;
					this.axios.get(`/api_server/mem_style.php`)
					.then((res) => this.style = res.data)
					.catch(error =>console.log(error));
				}else{//無風格測驗
					this.style_id = '';
				}
			})
			.catch(error =>console.log(error));
	  }
	}, 
};
  
</script>
<style lang="scss" scoped>
.body_style {
	background-color: #fff;
  border: 1px solid black;
  padding: 25px;
  display: flex;
  position: relative;

  @include s() {
    justify-content: space-between;
  }
}
.card {
  margin-block: 25px;
  .pic {
    width: 135px;
    height: 170px;
    z-index: 1;
    aspect-ratio: 1/1;
    .type_pic {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }
    @include m() {
      width: 250px;
      height: 250px;
    }
  }
  .text {
		margin-left: $padding;
		display: flex;
		flex-direction: column;
		.title {
				font-size: 24px;
				display: block;
				font-weight: 700;
				color: $title_color;
			@include s() {
				font-size: 22px;
				z-index: 1;
			}
		}
		.type_tag {
			display: block;
			margin: auto;
			@include s() {
				font-size: 30px;
			}
		}
		.bgtag {
			display: block;
			position: absolute;
			right: $padding;
			@include s() {
				font-size: 40px;
			}
		}
		.more {
			display: flex;
			position: absolute;
			align-items: center;
			right: $padding;
			bottom: $padding;
			.text {
				font-family: $main_font;
				padding-right: 5px;
			}
 	 	}
  }
} 

// 無測驗
.no_style{
  border: 1px $title_color solid;
  min-height: 200px;
	@include l() {
		min-height: 250px;
	}
  position: relative;
  background-color: #fff;
  .item{
		margin: auto;
		h3{
			margin-bottom: 40px;
			font-weight: 600;
			color: $main_color;
			font-size: 24px;
			text-align: center;
			@include l() {
				font-size: 28px;
	}
		}
		.btn_box{
				margin: 0 auto;
				width: fit-content;
		}
  }
  
}
</style>