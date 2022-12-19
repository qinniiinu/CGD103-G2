<template>
  <el-breadcrumb separator="/">
    <el-breadcrumb-item v-for="breadCrumbItem in breadCrumbList" :key="breadCrumbItem.path">
    {{breadCrumbItem.meta.title}}
    </el-breadcrumb-item>
  </el-breadcrumb>
</template>



<script>
export default {
  computed: {
    breadCrumbList() {
      return this.$route.matched;
    },
  },
  mounted() {
    console.log(this.$route);
  },
};
</script>