<template id="post-list">
	<div class="row">
		<div class="pull-right">
			<router-link class="btn btn-xs btn-primary" v-bind:to="{path:'/add-post'}">
				Add new Post
			</router-link>
			<br></br>
		</div>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>#</th>
					<th>Post Title</th>
					<th>Post Body</th>
					<th class="col-md-2">Actions</th>
				</tr>
			</thead>
			<tbody>
				<tr v-for ="(post, index) in posts">
					<td>{{ index+1 }}</td>
					<td>{{ post.title }}</td>
					<td>{{post.body }}</td>
					<td><router-link class="btn btn-info btn-xs" v-bind:to="{name:'viewPost', params:{id: post.id}}">view</router-link>,
						<router-link class="btn btn-info btn-xs" v-bind:to="{name:'editPost', params:{id: post.id}}">edit</router-link>,
						<button class="btn btn-info btn-xs" @click="deletePost(post.id)">delete</button></td>
				</tr>
			</tbody>
		</table>
	</div>
</template>
<script>
    export default {
        data(){
            return{
                posts: []
            }
        },
        created(){
            this.fetchPosts();
        },
        methods:{
            fetchPosts(){
                axios.get('/posts').then((response) => {
                this.posts = response.data;
                })
            },
            deletePost(id){
                if(id != undefined){
                  if(confirm("Are you sure you want to delete this?")) {
                    axios.delete('/posts/'+id).then(response =>{
                //alertify.success('Deleted successfully');
                this.fetchPosts();
                })
            }
                }
        }

    }
}
</script>