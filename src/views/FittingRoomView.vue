<template>
  <div class="fittingroom">
    <div class="sideMenu">
      <ProductSideMenu></ProductSideMenu>
      <HashTag></HashTag>
    </div>
    <div class="fittingArea">
      <div class="container" @mousemove="mouseMove" @mouseup="mouseUp" ></div>
      <ul class="products">
        <li v-for="(item, i) in items" :key="i"  @mousedown="mouseDown" >
          <img :src="item.products" />
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
    ProductSideMenu,
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
    };
  },

    // const mouseX = 0
    // const mouseY = 0
    // const offsetX = 0
    // const offsetY = 0
    // const isDown = false

    // const items = document.querySelectorAll(".items");
    // const lists = document.querySelectorAll('.list');

      // mouseDown(e){
      //   deltaLeft = e.clientX - e.target.offsetLeft
      //   deltaTop = e.clientY - e.target.offsetTop
      //   move = true
      // } 

      // mouseMove(e){
      //   deltaLeft = e.clientX - e.target.offsetLeft
      //   deltaTop = e.clientY - e.target.offsetTop
      //   move = true
      // }

      // mouseUp(e){
      //   move = false
      // }
       
   

//     for (let i = 0; i < items.length; i++) {
//         items[i].addEventListener('mousedown', function (e) {
//             isDown = true
//             mouseX = e.pageX
//             mouseY = e.pageY
//             document.addEventListener('mousemove', move)
//         });

//         document.addEventListener('mouseup', function (e) {
//             if (isDown) {
//                 offsetX += e.pageX - mouseX
//                 offsetY += e.pageY - mouseY
//             }
//             isDown = false
//             document.removeEventListener('mousemove', move)
//         });


//         function move(e) {
//             if (isDown) {
//                 const dx = e.pageX - mouseX
//                 const dy = e.pageY - mouseY
//                 items[i].style.transform = `translate(${offsetX + dx}px,${offsetY + dy}px)`;
//             }
//         }

//     }

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
    .container {
      width: 100%;
      height: 530px;
      border: 1px solid black;
      background: url("../assets/fittingroom/reoutfit.png") no-repeat center;
    }
    .products {
      width: 100%;
      height: 300px;
      border: 1px solid black;
	  display: flex;
	  flex-wrap: wrap;
	  justify-content: center;
	  li{
		width: 14%;
		height: 150px;
		img{
			width: 100%;
			height: 100%;
			object-fit: contain;
		}
	  }
    }
  }
}
</style>