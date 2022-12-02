<template>
  <section class="quiz_result">
      <div class="title_box">
        <p>你的測驗結果是</p>
        <h2>時尚風</h2>
      </div>
      <div class="wrap">
        <div class="img_box">
          <StyleCard1 link="https://picsum.photos/600/600/?random=10" />
          <Button content="記錄我的風格"/>
        </div>
        <div class="txt_box">
            <h3>適合您的穿搭公式</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis quod qui, cumque quis consequatur asperiores consequuntur odio reiciendis debitis officia mollitia. Laborum cupiditate odio incidunt laboriosam distinctio debitis atque pariatur?</p>
        </div>
      </div>
  </section>
  <section class="recommend">
    <h3>適合您的商品</h3>
    <div class="wrap">
        <ProductCard/>
        <ProductCard/>
        <ProductCard/>
    </div>
  </section>
  <section class="recommend">
    <h3>適合您的穿搭</h3>
    <div class="wrap">
        <ProductCard/>
        <ProductCard/>
        <ProductCard/>
    </div>
  </section>
</template>
<script>
import StyleCard1 from "@/components/StyleCard1.vue";
import Button from "@/components/Button.vue";
import ProductCard from "@/components/product/ProductCard.vue";
export default {
  name: "QuizResult1",
  components: {
    StyleCard1,
    Button,
    ProductCard,
  },
};
</script>
<style lang="scss" scoped>
*{
    box-sizing: border-box;
}
.quiz_result{
    .title_box{
        text-align: center;
        padding: 20px 0;
        p{
            font-size: 16px;
            margin-bottom: 5px;
            color: $title_color;
        }
        h2{
            color: $title_color;
            font-weight: 600;
            font-size: 24px;
        }
    }
    .wrap{
        width: 80%;
        position: relative;
        margin: 0 auto;

    .img_box{
        width: 100%;
        position: relative;
        .item{
            margin-left: -15px;
        }
        button {
          margin: auto;
          display: block;
        }
    }
    .txt_box{
        padding: 20px 0;
        h3{
            color: $title_color;
            margin-bottom: 10px;
            font-size: 16px;
        }
        p{
            font-size: 12px;
            color: $text_color;
        }
    }
    }

}
 @media screen and (min-width:768px) {
    .quiz_result{
    .title_box{
        text-align: center;
        padding: 20px 0;
        p{
            display: inline-block;
            margin-right: 10px;
            font-size: 32px;
        }
        h2{
            display: inline-block;
            font-size: 48px;
        }
    }
    .wrap{
        width: 100%;
        max-width: 1200px;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;

    .img_box{
        width: 50%;
    }
    .txt_box{
        width: 50%;
        order: -1;
        h3{
            font-size: 24px;
        }
        p{
            font-size: 22px;
        }
    }
    }

}
 }
.recommend{
    padding: 50px 0;
    width: 80%;
    position: relative;
    margin: 0 auto;
    h3{
        color: $title_color;
        margin-bottom: 10px;
        font-size: 16px;
    }
    .wrap{
        .product_card{
            margin: 0;
        }
    }
}
 @media screen and (min-width:768px) {
    .recommend{
        h3{
            font-size: 24px;
        }
        .wrap{
            display: flex;
            flex-wrap: wrap;
              .product_card{
                width: 33%;
            }
        }
    }
 }

</style>