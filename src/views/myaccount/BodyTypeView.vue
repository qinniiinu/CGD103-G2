<template>
  <!-- 會員 container -->
  <div class="mem_container">
    <!-- 側邊欄組件 -->
    <MemberSideMenu></MemberSideMenu>
    <!-- 右側會員資料-->
    <div class="mem_data">
      <p class="title">我的身型</p>
      <div class="data">
        <!-- 這裡開始寫 -->
		<div class="wrap">
			<section class="body_tyle">
				<div class="item">
					<p>屬於:</p>
					<h2>#文青風</h2>
				</div>
				<div class="item">
					<img src="hipster2.png" alt="文青">
				</div>
				<div class="item">
					<p>沙漏型身材是俗稱的完美身材，所以在穿搭上可以選擇可以凸顯自己凹凸有致的身材的單品。直筒寬鬆款都是雷區哦，上身後曲線全無。擁有彈性的針織背心連衣裙就是很好的選擇，完美凸顯身材</p>
				</div>
				<!-- 性別/身高體重/鞋碼 -->
				<div class="item">
					<div class="sex">
						<button class="btn_l">男</button>
						<button class="btn_l">女</button>
					</div>
					<div class="my_body">
						<div class="input_group">
							<input type="text" required/>
							<label for="">身高 cm</label>
						</div>
						<div class="input_group">
							<input type="text" required/>
							<label for="">體重 kg</label>
						</div>
						<div class="input_group">
							<input type="text" required/>
							<label for="">鞋碼 cm</label>
						</div> 
					</div>
				</div>
				<!-- 其他數據 rage bar -->
				<div class="item">
					<div class="rage_group">
						<span>肩寬</span>
						<span class="value"></span>
						<span>cm</span>
						<input type="range" min="1" max="100" value="1" class="slider" oninput="displaySliderValue(this)">
					</div>
					<div class="rage_group">
						<span>肩寬</span>
						<span class="value">1</span>
						<span>cm</span>
						<input type="range" min="1" max="100" value="1" oninput="displaySliderValue(this);">
					</div>
					<div class="rage_group">
						<span>肩寬</span>
						<span class="value"></span>
						<span>cm</span>
						<input type="range" min="1" max="100" value="1" oninput="displaySliderValue">
					</div>
				</div>
			</section>
      </div>
    </div>
  </div>
  </div>
</template>

<script>
import MemberSideMenu from "@/components/MemberSideMenu.vue";
export default {
	name: "BodyType",
	components: {
		MemberSideMenu
	},
	methods:{
		displaySliderValue(eSlider){   
    	eSlider.previousElementSibling.getElememtById('value').textContent = eSlider.value;
		}
	},
	data() {
		return {
			  
		}
	},
};
</script>

<style lang="scss" scoped>
@import "@/assets/sass/member_side_menu";
 .style{
        .item:nth-child(1){ //title
            padding: 20px 0;
            h2{
                font-size: 32px;
                font-weight: 600;
                text-align: center;
            }
            p{
                display: none;
            }
        }
        .item:nth-child(2){ //image
            position: relative;
			width: 150px;
			height: 150px;
            img{
                width: 100%;
                vertical-align: top;
            }
        }
        .item:nth-child(3){
            padding: 20px 0;
            p{
                color: $text_color;
                line-height: 27px;
                font-size: 16px;
            }
        }
		//  性別/身高體重/鞋碼 
        .item:nth-child(4){ 

        }
		//  其他數據 rage bar
        .item:nth-child(5){ 

        }
    }
	
			//  input
	        .input_group {
			position: relative;
			margin-block-start: 35px;
			border-bottom: 2px solid;
			input {
				width: 100%;
				height: 40px;
				font-size: 16px;
				color: #333;
				padding: 0 5px;
				border: none;
				outline: none;
				&:focus ~ label {
				color: $main_color;
				top: -5px;
				}
				&:valid ~ label {
				color: $main_color;
				top: -5px;
				}
			}
			label {
				position: absolute;
				top: 50%;
				left: 5px;
				transform: translateY(-50%);
				font-size: 16px;
				pointer-events: none;
				transition: 0.5s;
				color: gray;
			}

        	}




</style>
