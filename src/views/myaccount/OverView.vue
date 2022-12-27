<template>
  <p class="title">{{member.mem_name}}, 歡迎回來</p>
    <div class="data">
      <!-- 這裡開始寫 -->
      <div class="box">
        <!-- 我的身型、我的風格 -->
        <!-- 我的身型 -->
        <section class="body_style card">
          <div class="pic">
            <!-- <img :src="typeimg" alt=""> -->
            <img class="type_pic" :src="`./pic/${member.body_pic}`" :alt="member.body_shape" />
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
          <div class="text">
            <h3 class="title">我的風格</h3>
          </div>
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
            <img class="type_pic" :src="`./pic/${style.style_pic}`" :alt="style.type_name" />
          </div>
          <div class="text">
            <h3 class="title">我的風格</h3>
            <type-tag :TypeTag="style.style_name" class="type_tag"></type-tag>
            <bg-tag :Bgtag="style.style_name" class="bgtag"></bg-tag>
            <router-link to="/MyPage/memQuiz" class="more">
              <span class="text">查看更多</span>
              <font-awesome-icon icon="fa-solid fa-angle-right" />
            </router-link>
          </div>
        </section>

      <div class="other_card">
        <!-- 帳號資料  -->
        <section class="samll_card account">
          <div class="title">
            <h3 class="tit">帳號資料</h3>
            <span class="bg_tag">#ACCOUNT</span>
          </div>
          <div class="data">
            <div class="content">
              <div class="txt"><span class="highlight">帳號 : </span>{{member.mem_mail}}</div>
              <div class="txt" v-if="member.phone"><span class="highlight">電話 : </span>{{member.phone}}</div>
              <div class="txt"><span class="highlight">生日 : </span>{{member.bday}}</div>
            </div>
            <router-link to="/MyPage/MemMaintain" class="more">
              <span class="text">查看更多</span>
              <font-awesome-icon icon="fa-solid fa-angle-right" />
            </router-link>
          </div>
        </section>

        <!-- 預約諮詢 -->
        <section class="samll_card consult">
          <div class="title">
            <h3 class="tit">風格諮詢</h3>
            <span class="bg_tag">#CONSULT</span>
          </div>
          <div class="data">
            <!-- 無預約 -->
            <div v-if="appointment_id==''" class="content">
              <div class="txt norecord">
                <span class="highlight">您目前無預約紀錄</span>
              </div>
              <div class="btn_box">
                <router-link to="/Chat">
                  <button class="btn_s">前往預約</button>
                </router-link>
              </div>
            </div>
            <!-- 有預約 -->
            <div v-else class="content appointment">
              <div class="txt"><span class="highlight">您的預約</span></div>
              <div class="date_time">
                <p>
                  <span class="time">{{appointment.appointment_date}}</span>
                  <span class="time">{{appointment.appointment_time}}</span>
                </p>
                <button class="btn_ns">進入聊天室</button>
              </div>
              <router-link to="/MyPage/Consultation" class="more">
                <span class="text">更改預約</span>
                <font-awesome-icon icon="fa-solid fa-angle-right" />
              </router-link>
            </div>
          </div>
        </section>

        <!-- 訂閱服務 -->
        <SmallCard title="訂閱服務" Bgtag="#PREMIUM" more="更改訂閱" class="premium">
          內容
          <router-link to="/MyPage/memSubscription" class="more">
            <span class="text">查看更多</span>
            <font-awesome-icon icon="fa-solid fa-angle-right" />
          </router-link>
        </SmallCard>

        <!-- 訂單紀錄 -->
        <OrderCard title="訂單紀錄" class="order">
          <OrdHisCard></OrdHisCard>
        </OrderCard>
      </div>
      <MySave></MySave>
    </div>
  </div>
</template>

<script>
import { BASE_URL } from "@/assets/js/common.js";
import BgTag from "@/components/mypage/BgTag.vue";
import TypeTag from "@/components/mypage/TypeTag.vue";
// import MemCard from "@/components/mypage/MemCard.vue";
import SmallCard from "@/components/mypage/SmallCard.vue";
import OrderCard from "@/components/mypage/OrderCard.vue";
import OrdHisCard from "@/components/mypage/OrdHisCard.vue";
import MySave from "@/components/mypage/MySave.vue";
export default {
  name: "OverView",
  components: {
    BgTag,
    TypeTag,
    // MemCard,
    SmallCard,
    OrderCard,
    OrdHisCard,
    MySave,
  },
  data() {
    return {
      member:{},
      style:{},
      style_id:'', //是否風格測驗
      appointment_id : '', //是否預約
    };
  },
  mounted(){
    this.getResource();

    // this.axios.get('/api_server/memberInfo.php')
    // .then(res => this.member = res.data)
    // .catch(error =>console.log(error));
  },
  methods:{
    getResource() {
			this.axios.get(`${BASE_URL}/memberInfo.php`)
			// this.axios.get('/api_server/memberInfo.php')
    	.then(res => {
			this.member = res.data
				if(res.data.style_id){ //有風格測驗
					this.style_id = res.data.style_id;
					this.axios.get(`${BASE_URL}/mem_style.php`)
					// this.axios.get(`/api_server/mem_style.php`)
					.then((res) => this.style = res.data)
					.catch(error =>console.log(error));
				}else{//無風格測驗
					this.style_id = '';
				}
			})
			.catch(error =>console.log(error));

      // 諮詢紀錄
      this.axios.get(`${BASE_URL}/member_appointment.php`)
      // this.axios.get(`/api_server/member_appointment.php`)
    	.then(res => {
        if(res.data.appointment_id){ //有預約紀錄
          this.appointment = res.data;
          this.appointment_id = res.data.appointment_id;
        }else{ //無預約紀錄
          this.appointment_id = '';
        }
      })
			.catch(error =>console.log(error));
    }
  }  
};
</script>
<style lang="scss" scoped>

.title {
  font-size: 24px;
  color: #292929;
  padding-bottom: $padding;
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

// grid 卡片
.other_card {
  width: 100%;
  min-height: max-content;
  display: grid;
  grid-template-columns: 50% 2fr;
  grid-template-rows: 1 3fr;
  gap: 25px;
  .account {
    grid-area: 1 / 1 / 2 / 2;
    @include s() {
      grid-area: 1/1/2/3;
    }
  }
  .consult {
    grid-area: 2 / 1 / 3 / 2;
    @include s() {
      grid-area: 2/1/3/3;
    }
  }
  .premium {
    grid-area: 3 / 1 / 4 / 2;
    @include s() {
      grid-area: 3/1/4/3;
    }
  }
  .order {
    grid-area: 1 / 2 / 4 / 3;
    @include s() {
      grid-area: 4/1/5/3;
      padding: 20px;
    }
  }
  @include s() {
    grid-template-rows: 1 4fr;
  }
}

// grid 
.samll_card {
  background-color: #fff;
  min-height: 15;
  border: 1px solid $title_color;
  padding: 25px;
  position: relative;
  .title {
    display: flex;
    justify-content: space-between;
    .tit {
      z-index: 1;
      font-size: 24px;
      font-weight: 700;
      color: $title_color;
      @include s() {
        font-size: 22px;
      }
    }
    .bg_tag {
      color: $bg_violet;
      position: absolute;
      right: 20px;
      @include font_set($second_font, $null, 900, italic);
      @include s() {
        font-size: 30px;
      }      
      @include m() {
        font-size: 40px;
      }
      @include l() {
        font-size: 36px;
      }

    }
  }
  .data {
    padding: 10px;
    .content{
      color: $text_color;
      margin: auto;
      .txt{
        margin-block: 10px;
       .highlight{
          font-weight: bold;
          margin-block: 15px;
        }
      }
      .norecord{
        text-align: center;
        margin-bottom: 40px;
      }
      .btn_box{
        text-align: center;
        cursor: pointer;
      }
      .date_time{
        text-align: center;
        margin-block: 20px;
        p{
          margin-block: 20px;
          .time{
          font-weight: 700px;
          margin-inline: 10px;
        }
        }

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



// 身形、風格
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
        z-index: 1;
			@include s() {
				font-size: 20px;

			}
		}
		.type_tag {
			display: block;
			margin: auto;
			@include s() {
				font-size: 24px;
			}
			@include m() {
				font-size: 34px;
			}
			@include l() {
				font-size: 40px;
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
  .text{
    position: absolute;
  }
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
        cursor: pointer;
		}
  }
}
// 身形、風格 end 

</style>
