<template>
    <div class="d-flex flex-row" style="width:100%;">
        <div style="width:30%;
         background-color: #191919;
         border-color: #a9a9a9a9;
         ">
            <categories v-bind:categories="categories"></categories>
        </div>
        <div style="width:70%;">
            <posts v-bind:posts="posts">Category Posts</posts>
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
