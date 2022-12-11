<template id="post-view">
	<div class="row">
		<div class="pull-right">
			<router-link class="btn btn-xs btn-primary" v-bind:to="{path:'/'}">
				Home
			</router-link>
			<br>
		</div>
		<div class="col-12">
                    <h4 class="card-title font-20 mt-0">Add New Post</h4>
                    <p class="font-14">what post are you adding </p>
                    <div class="row">
                        <div class="col-12">
                            <form method="post" @submit.prevent="editPost">
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label>Title</label>
                                        <input type="text" class="form-control" id="title"  v-model="post.title" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" rows="5" v-model="post.body" required></textarea>
                                </div>
                                <div class="col-auto p-0">
                                    <button type="submit" class="btn btn-primary">Submit</button>
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
            this.fetchPost();
        },
        methods:{
            fetchPost(){
                axios.get('/posts/'+this.$route.params.id+ '/edit').then((response) => {
                this.post = response.data;
                })
            },
        	editPost(){
        		axios.patch('/posts/'+this.$route.params.id+ '/edit', {title:this.post.title, body:this.post.body })
        		.then(response=>{
        			//alert('New service created Successfully');
                	this.$router.push({name:'listPost'})
            	})
        		.catch(err =>console.log(err));
        	}

    }
}
</script>