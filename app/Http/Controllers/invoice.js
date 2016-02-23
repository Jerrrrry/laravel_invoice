Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('value');
Vue.component('invoice',{
		template:'#invoice-template',
		computed:{
			sum:function(){
				var sum=0;
				this.list.forEach(function(item){
					sum+=item.price*item.quantity;
				});
				return sum;
			},
			total:function(){
				var total=0;
				total=this.newInvoice.time*this.newInvoice.hourly;
				this.newInvoice.total=total;
				return total;
			},
			vali:function(){
				if(this.newInvoice.description&&this.newInvoice.time&&this.newInvoice.name&&this.newInvoice.address&&this.newInvoice.date&&this.newInvoice.time&&this.newInvoice.email&&this.newInvoice.hourly){
					return true;
				}else{return false;}
			}
		},
		data:function(){
			return {
				newInvoice:{name:'',address:'',hourly:'',email:'',date:'',time:'',description:'',total:''},
				editlist:{name:'',address:'',hourly:'',email:'',date:'',time:'',description:'',total:'',id:''},
				
				list:[]

			};
		},
		created:function(){
				this.fetchData();
		},
		methods:{

			//list.editing change status
			toggleEdit:function(list){
				list.editing=!list.editing;
			},
			//create data for edit data 
			importList:function(list){
				this.editlist.id=list.id;
				this.editlist.name=list.name;
				this.editlist.address=list.address;
				this.editlist.date=list.date;
				this.editlist.time=list.time;
				this.editlist.total=list.total;
				this.editlist.description=list.description;
				this.editlist.email=list.email;
				this.editlist.hourly=list.hourly;

				
			},
			//end


			//

			updateList:function(editlist,list){
				this.$http.put('api/update/'+this.editlist.id,this.editlist).success(function(response){
					this.list.push(this.editlist);
					this.list.$remove(list);
					this.editlist={id:"",name:'',price:'',quantity:''};

				});
			},


		    printInvoice:function(){
		    	this.$http.get('testpdf',this.editlist).success(function(response){
		    		this.editlist={name:'',address:'',hourly:'',email:'',date:'',time:'',description:'',total:'',id:''};
		    	});
		    },
			//add method to update data input
			
			deleteList:function(list){
				this.list.$remove(list);
				this.$http.delete('api/total/'+list.id,list);
			},
			fetchData:function(){
				this.$http.get('api/invoice',function(list){
					this.list=list;
					//add new att to list[]
					this.list.forEach(function(list){
						list.editing=false;
					//end
					});
				}.bind(this));
			},
			addList:function(){
				if(this.newInvoice.name&&this.newInvoice.address&&this.newInvoice.email){
					this.$http.post('api/invoice',this.newInvoice).success(function(response){
						this.list.push(this.newInvoice);
						this.newInvoice={name:'',address:'',hourly:'',email:'',date:'',time:'',description:''};
						console.log('success');
					}).error(function(error){
						console.log(error);
					});
				}
			}
		}


});




new Vue({

	el:'body',
	


});
