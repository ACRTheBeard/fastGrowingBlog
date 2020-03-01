<template>
    <div class="d-flex flex-column" style="width:100%; margin:40px;">
        <p>
            <img src="http://via.placeholder.com/60x60/447744/292929?text=FGB" />
        </p>
        <h3>{{post.name}}</h3><br />
        <p v-html="post.content"></p>
    </div>
</template>

<script>
    export default {
        props: {
            post: Object,
        },
        mounted() {
        }
    }
</script>
