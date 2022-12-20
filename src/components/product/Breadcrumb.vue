<template>
    <div class="breadBox">
        <p class="breadTitle">現在位置：</p>
        <div class="breadcrumbList">
            <ol class="breadcrumb">
                <li v-for="(e, i) in arr" :key="i">
                    <router-link :to="e.link">{{ e.name }}</router-link>
                </li>
            </ol>
        </div>
    </div>
</template>
<script>
export default {
    props: { arr: Array },
};
</script>
<style lang="scss" scoped>
// .breadcrumbList {
//     // background-color: #333333;
// }
.breadBox {
    padding-left: 10px;
    display: flex;
    .breadTitle {
        padding: 15px 5px 15px 0px;
    }
    .breadcrumbList {
        // border-bottom: 3px solid #26ff93;
        // box-shadow: inset 0 0 11px 3px rgba(#000000, 0.6);
        .breadcrumb {
            display: flex;
            li {
                padding: 15px 10px 15px 0px;
                color: $text_color;

                & + li {
                    padding-left: 0;
                }
                & + li::before {
                    content: "/"; //+選取器，選到自己的下一層元素
                    padding-right: 10px;
                }
                &:last-child a {
                    color: $title_color; //選取到最後一個元素
                }
                a {
                    font-weight: 100;
                    font-size: 16px;
                    color: $text_color;
                    cursor: pointer;
                    &:hover {
                        color: $main_color;
                    }
                }
            }
        }
    }
}
</style>