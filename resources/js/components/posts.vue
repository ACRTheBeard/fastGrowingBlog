<template>
    <div>
        <h5>Posts</h5>
        <ul style="list-style-type:none;">
            <li v-for="(post, x) in posts" :key="x" style="margin-bottom:40px;">
                <div>
                    <a v-bind:id="post.id" href="/post/" v-on:click="postClicked">
                        <div class="d-flex flex-row">
                            <p>
                            <img
                                src="http://via.placeholder.com/60x60/447744/292929?text=Img"

                            />
                            </p>
                            <div class="d-flex flex-column">
                                <h4 style="margin-left:10px; color:#a9a9a9">{{post.name}}</h4>
                                <div style="margin-left:10px; color:#a9a9a9" v-html:text="post.short_content"></div>
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
            postClicked: function (event) {
                 window.location.href = "/posts/" + event.target.id;
            },
            decode: function (codedString) {
                codedString = codedString.replace('"', '')
                return unescape(codedString)
            }
        }

    }
</script>
