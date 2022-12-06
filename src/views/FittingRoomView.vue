<template>
  <div class="fittingroom">
    <div class="sideMenu">
      <ProductSideMenu></ProductSideMenu>
      <HashTag></HashTag>
    </div>
    <div class="fittingArea">
      <div class="panel"></div>
      <ul class="products">
        <li v-for="(item, i) in items" :key="i">
          <img
            :src="item.products"
            :style="item.style"
            @mousedown="mouseDown"
            @mousemove="mouseMove(i, $event)"
            @mouseup="mouseUp"
          />
        </li>
      </ul>
    </div>
  </div>
</template>
 
<script>
import SearchBar from "@/components/product/SearchBar.vue";
import ProductSideMenu from "@/components/product/ProductSideMenu.vue";
import HashTag from "@/components/product/HashTag.vue";
export default {
  name: "Product",
  components: {
    SearchBar,
    // ProductSideMenu,
    HashTag,
  },
 
  data() {
    return {
      items: [
        { products: require("@/assets/fittingroom/item001.png") },
        { products: require("@/assets/fittingroom/item002.png") },
        { products: require("@/assets/fittingroom/item003.png") },
        { products: require("@/assets/fittingroom/item004.png") },
        { products: require("@/assets/fittingroom/item005.png") },
        { products: require("@/assets/fittingroom/item006.png") },
        { products: require("@/assets/fittingroom/item007.png") },
      ],
      left: 0,
      top: 0,
      offsetX: 0,
      offsetY: 0,
      moving: false,
      mouseX :0,
      mouseY :0,
    };
  },
 
  methods: {
    mouseDown(e) {
      this.offsetX = e.pageX;
      this.offsetY = e.pageY;
      this.moving = true;
      console.log(e)
    },
 
    mouseMove(i,e) {
      if (this.moving) {
        const dx = e.pageX - this.mouseX;
        const dy = e.pageY - this.mouseY;
        this.items[i].style = {transform:`translate(${this.offsetX + dx}px,${this.offsetY + dy}px)`}
      }
    },
 
    mouseUp(e) {
      if (this.moving) {
        this.offsetX += e.pageX - this.mouseX;
        this.offsetY += e.pageY - this.mouseY;
      }
      this.moving = false;
      // document.removeEventListener("mousemove", move);
    },
  },
};
</script>







<style lang="scss" scoped>
@import "@/assets/sass/main.scss";
.fittingroom {
  width: 100%;
  height: 900px;
  display: flex;
  justify-content: center;
  margin: 50px auto;
  .sideMenu {
    width: 20%;
  }
  .fittingArea {
    width: 60%;
    .panel {
      width: 100%;
      height: 530px;
      border: 1px solid black;
      background: url("../assets/fittingroom/reoutfit.png") no-repeat center;
    }
    .products {
      width: 100%;
      height: auto;
      border: 1px solid black;
      display: flex;
      flex-wrap: wrap;
      justify-content: flex-start;
      li {
        width: 100px;
        height: 150px;
        margin: 10px;
        img {
          width: 100%;
          height: 100%;
          object-fit: contain;
        }
      }
    }
  }
}
</style>