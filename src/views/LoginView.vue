<template>
	<router-link to="/MyPage" class="btn_s">會員頁</router-link>	
	<SigninIn></SigninIn>
	<Signup></Signup>
	<SignupSet></SignupSet>

</template>

<script>
import SigninIn from "@/components/loginpage/SigninIn.vue";
import Signup from "@/components/loginpage/Register.vue";
import SignupSet from "@/components/loginpage/BodyTyping.vue";

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
