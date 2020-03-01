<template>
    <div>
        <h4>Posts</h4>
        <ul style="list-style-type:none;">
            <li v-for="(post, x) in posts" :key="x" style="margin-bottom:40px;">
                <div>
                    <a v-bind:id="post.id" href="#" v-on:click="postClicked(post.id)">
                        <div class="d-flex flex-row">
                            <p>
                            <img src="http://via.placeholder.com/60x60/447744/292929?text=FGB" />
                            </p>
                            <div class="d-flex flex-column">
                                <h4 style="margin-left:10px; color:#a9a9a9">{{post.name}}</h4>
                                <div style="margin-left:10px; color:#a9a9a9" v-html="post.short_content"></div>
                            </div>
                        </div>
                    </a>
                </div>
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        props: {
            posts: Array
        },
        methods: {
            postClicked: function (id) {
                window.location.href = "/posts/" + id;
            }
        }
    }
</script>
