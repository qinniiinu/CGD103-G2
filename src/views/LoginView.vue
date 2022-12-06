<template>
	<router-link :to="{ name:'MyPage' }" class="btn_s">會員頁</router-link>	
	<SigninIn></SigninIn>
	<Signup></Signup>
	<SignupSet></SignupSet>

</template>

<script>
import SigninIn from "@/components/loginpage/SigninIn.vue";
import Signup from "@/components/loginpage/Signup.vue";
import SignupSet from "@/components/loginpage/SignupSet.vue";

export default {
	name: "login",
	components: {
		SigninIn,
		Signup,
		SignupSet,
	},
	  data() {
    return {
    }
  },
};
</script>
