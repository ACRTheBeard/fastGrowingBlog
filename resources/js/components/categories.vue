<template>
    <div>
        <h5>Categories</h5>
        <ul>
            <li v-for="(category, x) in categories" :key="x">
                <a v-bind:id="category.id" href="#" v-on:click="categoryClicked">{{category.name}}</a>
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        props: {
            categories: Array
        },
        mounted() {
            console.log('Component mounted.', this.props)
        },
        methods: {
            categoryClicked: function (event) {
                window.location.href = "/categories/" + event.target.id;
            }
        }
    }
</script>
