<template>
 <!-- CSS only -->
    <!-- bootstrap的cdn要看畫面在打開，推上去要關掉。 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> 
    <div class="container-fluid overflow-hidden">
        <div class="row g-5">
            <!-- aside模板 -->
            <Aside/>
            <!-- aside模板 end -->
            <div class="col-9">
                <!-- 在這邊寫 -->
                一週穿搭管理Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolorum consequatur molestias numquam illum, rem iure! Placeat omnis alias mollitia culpa beatae eveniet architecto ipsam ipsum. Alias reprehenderit vitae libero similique.
            </div>
        </div>
    </div>
</template>
<script>
import Aside from '@/components/back_end/Aside.vue'; //引入aside
    export default {
	name: "OneweekDressing",
      components: {
        Aside,
    },
};
</script>