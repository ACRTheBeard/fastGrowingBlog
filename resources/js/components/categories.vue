<template>
    <div class="d-flex flex-column">
        <h5 style="margin-left: -20px;">Categories</h5>
        <ul style="padding: 0px;">
            <li v-for="(category, x) in categories" :key="x">
                <a v-bind:id="category.id" href="#" v-on:click="categoryClicked(category.id)">{{category.name}}</a>
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
            categoryClicked: function (id) {
                window.location.href = "/categories/" + id;
            }
        }
    }
</script>
