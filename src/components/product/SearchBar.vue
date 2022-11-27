<template>
    <div class="left_right">
        <div class="search">
            <input type="search" placeholder="Search.." />
            <font-awesome-icon icon="fa-solid fa-magnifying-glass" />
        </div>
        <select name="name" id="select2-here">
            <option value="First value">First</option>
            <option value="Second value">Second</option>
            <option value="Third value">Third</option>
            <option value="Forth value">Forth</option>
            <option value="Fifth value">Fifth</option>
        </select>
    </div>
</template>
<style lang="scss" scoped>
.left_right {
    padding: 10px;
    gap: 10px;
    justify-content: flex-end;
    .search {
        max-width: 250px;
        position: relative;
        input {
            width: 100%;
            height: 30px;
            border: $line solid $title_color;
        }
        .fa-magnifying-glass {
            color: $title_color;
            position: absolute;
            right: 5px;
            top: 0;
            bottom: 0;
            margin: auto;
        }
    }
    select {
        width: 150px;
        height: 30px;
        border: $line solid $title_color;
    }
}
</style>