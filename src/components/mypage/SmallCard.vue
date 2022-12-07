<template>
  <section class="samll_card">
    <div class="title">
      <h3 class="tit">{{ title }}</h3>
      <span class="bg_tag">{{ Bgtag }}</span>
    </div>
    <div class="data">
      <slot></slot>
    </div>
  </section>
</template> 


<script>
export default {
  props: {
    title: String,
    Bgtag: String,
  },
  components: {},
  data() {
    return {};
  },
};
// console.log(tagName);
</script>

<style lang="scss" scoped>
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
      font-size: 24px;
      font-weight: 700;
      color: $title_color;
      @include s() {
        font-size: 22px;
      }
    }
    .bg_tag {
      color: $bg_violet;
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
</style>