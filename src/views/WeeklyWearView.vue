<template>
  <div class="weeklywear">
    <!-- <BreadCrumbs></BreadCrumbs> -->
    <div class="title_box">
      <div class="img_box">
        <img class="deco1" src="/weeklywear_pic/deco01.png" />
      </div>
      <h1 class="title">一週穿搭公式<br />讓你/妳有更多穿搭靈感</h1>
      <div class="img_box">
        <img class="deco2" src="/weeklywear_pic/deco02.png" />
      </div>
    </div>

    <section class="section_one">
      <ul class="weekbox">
        <template v-for="day in days" :key="day.name">
          <li @click="day.selected = !day.selected">
            <label :for="day.name">
              <input
                class="input"
                type="radio"
                :id="day.name"
                v-model="picked"
                :value="day.name"
              />{{ day.name }}
            </label>
          </li>
        </template>
      </ul>
      <div class="imgbox">
        <transition name="slideDown">
          <img class="img_left" v-bind:src="imageUrlGirl" :key="imageUrlGirl" />
        </transition>

        <transition name="slideUp">
          <img class="img_right" v-bind:src="imageUrlBoy" :key="imageUrlBoy" />
        </transition>
      </div>

      <div class="bgpic">
        <div class="line"></div>
        <img class="bg_right" src="/weeklywear_pic/bg_blue.png" alt="背景圖" />
        <img class="bg_left" src="/weeklywear_pic/bg_blue.png" alt="背景圖" />
      </div>
    </section>

    <section class="section_two">
      <h2 class="subtitle">利用多層次搭配，即使是寒冷季節也能穿出輕盈感</h2>
      <p class="text">
        輕盈溫暖的夾層外套，本季依然大受歡迎。
        衣寬恰到好處，內搭針織上衣也不顯臃腫，
        適合搭配各種下半身單品的衣長設計更是加分。
        能穿出高品味的優美色調，搭配白色讓冬季造型也擁有輕快氣息。
      </p>
      <div class="line_second"></div>
      <div class="box_videonpic">
        <div class="videobox">
          <div
            style="
              width: 100%;
              height: 0px;
              position: relative;
              padding-bottom: 189.947%;
            "
          >
            <iframe
              src="https://streamable.com/e/n1flxb?autoplay=1&nocontrols=1"
              frameborder="0"
              width="100%"
              height="100%"
              allowfullscreen
              allow="autoplay"
              style="
                width: 100%;
                height: 100%;
                position: absolute;
                left: 0px;
                top: 0px;
                overflow: hidden;
              "
            ></iframe>
          </div>
        </div>
        <img class="img_female" src="/weeklywear_pic/female.jpg" alt="女裝" />
      </div>
    </section>

    <section class="section_two">
      <h2 class="subtitle">利用多層次搭配，即使是寒冷季節也能穿出輕盈感</h2>
      <p class="text">
        輕盈溫暖的夾層外套，本季依然大受歡迎。
        衣寬恰到好處，內搭針織上衣也不顯臃腫，
        適合搭配各種下半身單品的衣長設計更是加分。
        能穿出高品味的優美色調，搭配白色讓冬季造型也擁有輕快氣息。
      </p>
      <div class="line_second"></div>
      <div class="box_videonpic">
        <div class="videobox">
          <div
            style="
              width: 100%;
              height: 0px;
              position: relative;
              padding-bottom: 189.947%;
            "
          >
            <iframe
              src="https://streamable.com/e/6fcuis?autoplay=1&nocontrols=1"
              frameborder="0"
              width="100%"
              height="100%"
              allowfullscreen
              allow="autoplay"
              style="
                width: 100%;
                height: 100%;
                position: absolute;
                left: 0px;
                top: 0px;
                overflow: hidden;
              "
            ></iframe>
          </div>
        </div>
        <img class="img_female" src="/weeklywear_pic/male.jpg" alt="男裝" />
      </div>
    </section>
  </div>
</template>
 
<script>
import BreadCrumbs from "@/components/BreadCrumbs.vue";
import { BASE_URL } from "../assets/js/common.js";

export default {
  name: "",
  components: {
    BreadCrumbs,
  },

  data() {
    return {
      picked: "Monday",
      days: [
        { name: "Monday" },
        { name: "Tuesday" },
        { name: "Wednesday" },
        { name: "Thursday" },
        { name: "Friday" },
        { name: "Weekend" },
      ],
      weeklywear: [],
    };
  },

  computed: {
    imageUrlGirl() {
      if (this.picked === "Monday") {
        return "./weeklywear_pic/" + this.weeklywear[6]?.weeklywear_pic;
      } else if (this.picked === "Tuesday") {
        return "./weeklywear_pic/" + this.weeklywear[7]?.weeklywear_pic;
      } else if (this.picked === "Wednesday") {
        return "./weeklywear_pic/" + this.weeklywear[8]?.weeklywear_pic;
      } else if (this.picked === "Thursday") {
        return "./weeklywear_pic/" + this.weeklywear[9]?.weeklywear_pic;
      } else if (this.picked === "Friday") {
        return "./weeklywear_pic/" + this.weeklywear[10]?.weeklywear_pic;
      } else if (this.picked === "Weekend") {
        return "./weeklywear_pic/" + this.weeklywear[11]?.weeklywear_pic;
      } else {
        return "";
      }
    },

    imageUrlBoy() {
      if (this.picked === "Monday") {
        return "./weeklywear_pic/" + this.weeklywear[0]?.weeklywear_pic;
      } else if (this.picked === "Tuesday") {
        return "./weeklywear_pic/" + this.weeklywear[1]?.weeklywear_pic;
      } else if (this.picked === "Wednesday") {
        return "./weeklywear_pic/" + this.weeklywear[2]?.weeklywear_pic;
      } else if (this.picked === "Thursday") {
        return "./weeklywear_pic/" + this.weeklywear[3]?.weeklywear_pic;
      } else if (this.picked === "Friday") {
        return "./weeklywear_pic/" + this.weeklywear[4]?.weeklywear_pic;
      } else if (this.picked === "Weekend") {
        return "./weeklywear_pic/" + this.weeklywear[5]?.weeklywear_pic;
      } else {
        return "";
      }
    },
  },

  methods: {
    getResource() {
      this.axios.get(`${BASE_URL}/WeeklyWear.php`).then((response) => {
        this.weeklywear = response.data;

        console.log(this.weeklywear);
      });
    },
  },

  created() {
    this.getResource();
  },
};
</script>


<style lang="scss" scoped>
@import "@/assets/sass/main.scss";
@import "@/assets/sass/grid";

@keyframes float {
  0% {
    transform: translatey(0px);
  }
  50% {
    transform: translatey(-20px);
  }
  100% {
    transform: translatey(0px);
  }
}
@keyframes line {
  from {
    width: 0%;
  }
  to {
    width: 100%;
  }
}

//  ============================ 桌機 ============================
.weeklywear {
  width: 100%;
  .title {
    width: 100%;
    font-size: 48px;
    font-weight: 700;
    font-family: $main_font;
    text-align: center;
    line-height: 130%;
    margin: 50px auto;
    color: $title_color;
  }
  .title_box {
    display: flex;
    width: 70%;
    margin: auto;
  }
  .title_box .img_box {
    width: 26%;
  }

  .title_box .img_box img {
    width: 100%;
    height: 100%;
    object-fit: contain;
    transform: translatey(0px);
    animation: float 4s ease-in-out infinite;
  }

  .section_one {
    height: 500px;
    margin: 100px auto 300px auto;
    position: relative;
    }

  .imgbox {
      display: flex;
      position: relative;
      width: 100%;
      max-width: 952px;
      margin: auto;
      .img_left {
        position: absolute;
        top: -30px;
        right: 62%;
        z-index: 4;
        width: 36%;
      }
      .img_right {
        position: absolute;
        top: 30px;
        left: 62%;
        z-index: 4;
        width: 36%;
      }
    }
    .slideDown-leave-active,
    .slideDown-enter-active {
      transition: all 0.9s ease-in-out;
    }

    .slideDown-enter-from {
      transform: translateY(-100%);
    }

    .slideDown-leave-to {
      transform: translateY(100%);
      opacity: 0;
    }

    .slideUp-leave-active,
    .slideUp-enter-active {
      transition: all 0.9s ease-in-out;
    }

    .slideUp-enter-from {
      transform: translateY(100%);
    }

    .slideUp-leave-to {
      transform: translateY(-100%);
      opacity: 0;
    }

    .weekbox {
      margin: auto;
      width: 40%;
      display: inline-block;
      position: absolute;
      top: 110px;
      right: 0;
      left: 0;
      z-index: 3;
      text-align: center;
      font-size: 32px;
      font-weight: 700;
      font-family: $main_font;
      color: $text_color;

      li {
        margin: 15px auto;
        label {
          cursor: pointer;
          .input {
            display: none;
          }
          &:hover {
            color: $main_color;
          }
        }
      }
    }

    .bgpic {
      display: flex;
      overflow: hidden;
      justify-content: space-between;
      .bg_right {
        margin-top: 40px;
      }
      .bg_left {
        margin-bottom: 100px;
      }
      .line {
        width: 0%;
        height: 60px;
        background-color: $second_color;
        position: absolute;
        top: 210px;
        z-index: 1;
        animation: line 1.5s ease-out forwards;
      }
    }
  }
  .section_two {
    position: relative;
    min-height: 1000px;
    .subtitle {
      font-size: 32px;
      font-weight: 700;
      font-family: $main_font;
      text-align: center;
      line-height: 100%;
      margin: 20px auto 15px auto;
      color: $title_color;
    }
    .text {
      width: 605px;
      font-size: 20px;
      font-family: $main_font;
      text-align: center;
      line-height: 160%;
      margin: auto;
      margin-bottom: 100px;
      color: $title_color;
    }
    .line_second {
      width: 100%;
      height: 180px;
      margin: 160px auto;
      background-color: $second_color;
      position: absolute;
      top: 250px;
    }
    .box_videonpic {
      position: relative;
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      align-items: center;
      max-width: 1050px;
      margin: auto;
      .videobox {
        width: 427px;
        height: 550px;
        overflow: hidden;
        iframe {
          width: 100%;
          height: 100%;
        }
      }
    }
  }

//  ============================ 手機 ============================
@media screen and (max-width: 767px) {
  .weeklywear {
    .title {
      font-size: 28px;
    }
    .section_one {
      height: 500px;
      margin: 100px auto 70px auto;
      position: relative;
      .deco1 {
        display: none;
      }
      .deco2 {
        display: none;
      }
      .imgbox {
        display: flex;
        width: 100%;
        .img_left {
          width: 40%;
          position: absolute;
          top: 80px;
          left: 25px;
          z-index: 4;
        }
        .img_right {
          width: 40%;
          position: absolute;
          top: 130px;
          right: 25px;
          z-index: 4;
        }
      }
      .weekbox {
        width: 100%;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
        position: absolute;
        top: -75px;
        right: 0px;
        font-size: 24px;
      }
      .bgpic {
        display: flex;
        justify-content: center;
        width: 100%;
        overflow: hidden;
        .bg_right {
          width: 80%;
          height: 80%;
          padding: 5px;
        }
        .bg_left {
          width: 80%;
          height: 80%;
          padding: 5px;
        }
        .line {
          position: absolute;
          top: 160px;
          z-index: 1;
        }
      }
    }
    .section_two {
      position: relative;
      height: 100%;
      .subtitle {
        width: 90%;
        padding: 10px;
        font-size: 24px;
      }
      .text {
        width: 90%;
        padding: 5px;
        font-size: 18px;
        line-height: 160%;
        margin: auto;
        margin-bottom: 50px;
      }
      .line_second {
        display: none;
      }
      .box_videonpic {
        width: 100%;
        position: relative;
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        margin: auto;
        .videobox {
          width: 90%;
          height: 550px;
          margin: auto;
        }
        .img_female {
          width: 90%;
          margin: 80px auto;
        }
      }
    }
  }
}
</style>
