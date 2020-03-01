<template>
    <div class="d-flex flex-row" style="width:100%; padding:5px 20px 0px 20px;">
        <div style="width:20%;
         background-color: #191919;
         border-color: #a9a9a9a9;
         padding:40px;
         ">
            <categories v-bind:categories="categories"></categories>
        </div>
        <div style="width:80%; padding:40px;">
            <posts v-bind:posts="posts"></posts>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            categories: Array,
            posts: Array,
        },
        mounted() {
        }
    }
</script>
