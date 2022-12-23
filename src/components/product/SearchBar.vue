<template>
    <div class="left_right searchbar">
        <div class="search">
            <input
                type="search"
                placeholder="Search.."
                :value="searchVal"
                @keyup.enter="changesearch($event)"
            />
        </div>
        <select :value="sort" @change="changesort($event)">
            <option value="">排序</option>
            <option value="StoB">價格小到大</option>
            <option value="BtoS">價格大到小</option>
        </select>
    </div>
</template>
<script>
export default {
    props: {
        searchVal: String,
        sort: String,
    },
    methods: {
        changesearch(event) {
            this.$emit("update:searchVal", event.target.value);
        },
        changesort(event) {
            this.$emit("update:sort", event.target.value);
        },
    },
};
</script>
<style lang="scss" scoped>
.left_right {
    padding: 10px;
    gap: 10px;
    justify-content: flex-end;
    .search {
        max-width: 250px;
        min-width: 150px;
        position: relative;
        input {
            width: 100%;
            height: 30px;
            border: $line solid $title_color;
        }
        // .fa-magnifying-glass {
        //     color: $title_color;
        //     position: absolute;
        //     right: 5px;
        //     top: 0;
        //     bottom: 0;
        //     margin: auto;
        // }
    }
    select {
        min-width: 50px;
        height: 30px;
        border: $line solid $title_color;
    }
}
</style>