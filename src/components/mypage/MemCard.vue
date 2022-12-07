<template>
  <section class="body_style">
    <div class="pic">
      <!-- <img :src="typeimg" alt=""> -->
      <slot class="type_pic" name="pic"></slot>
    </div>
    <div class="text">
      <h3 class="title">{{ title }}</h3>
      <!-- hashtag -->
      <slot></slot>
    </div>
  </section>
</template> 


<script>
import BgTag from "@/components/mypage/BgTag.vue";
import TypeTag from "@/components/mypage/TypeTag.vue";

export default {
  props: {
    title: String,
    type: String,
  },
  components: {
    BgTag,
    TypeTag,
  },
  data() {
    return {};
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
  }
  @include s() {
    justify-content: space-between;
  }
}
</style>