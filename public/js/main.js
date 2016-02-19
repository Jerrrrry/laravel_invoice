Vue.component('task',{
		template:'#tasks-template',
		data:function(){
			return{
				list:[]
			};
		},

		created:function(){
			this.fetchTaskList();

		} ,
		methods:{
			fetchTaskList:function(){
					//$.getJSON('api/gettasks',function(task){
					//	this.list=task;
					//	}.bind(this));
					this.$http.get('api/gettasks',function(task){

							this.list=task;



					}.bind(this));



			}
		}   
});
new Vue({
	el:'body'
});