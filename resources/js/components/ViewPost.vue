<template id="post-view">
	<div class="row">
		<div class="pull-right">
			<router-link class="btn btn-xs btn-primary" v-bind:to="{path:'/'}">
				Home
			</router-link>
			<br>
		</div>
		<div class="col-12">
                    <h4 class="card-title font-20 mt-0">Show Post</h4>
                    <div class="row">
                        <div class="col-12">
                            <form method="post">
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label>Title: </label>
                                        {{ post.title }}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Description: </label>
                                    {{ post.body }}
                                </div>
                            </form>
                        </div>                                           
                    </div>
        </div>
	</div>
</template>
<script>
    export default {
        data(){
            return{
                post:{
                    title:'',
                    body:''
                }
            }
        },
        created(){
            this.fetchViewPosts();
        },
        methods:{
            fetchViewPosts(){
                axios.get('/posts/'+this.$route.params.id).then((response) => {
                this.post = response.data;
                })
            }

    }
}
</script>