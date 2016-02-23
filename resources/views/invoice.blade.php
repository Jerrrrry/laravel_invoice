@extends('layouts.app')

@section('content')
	    <div class="container" style="margin-top:10px">
            <div class="row">
                <invoice ></invoice>
            </div>
          
            
        </div>
        <template id="invoice-template">
            <!--add product -->
            <div class="col-md-12">
                <div class="pannel panel-info">
                    <div class="panel-heading">Generate New Invoice</div>
                    <div class="panel-body">
                        <div class="col-md-6">
                        	<div class="form-group">
                                <input type="date"  class="form-control"  v-model="newInvoice.date" required>

                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Customer Name" v-model="newInvoice.name" required>

                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Address" v-model="newInvoice.address" required>

                            </div>
                            
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input class="form-control" placeholder="Contact Infomation" v-model="newInvoice.email" required>

                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Hourly Rate" v-model="newInvoice.hourly" required number>

                            </div>
                            
                            <div class="form-group">
                                <input class="form-control" placeholder="Hours" v-model="newInvoice.time" required number>

                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="total"  v-model="total|currency"  disabled>

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <textarea class="form-control" placeholder="Description" v-model="newInvoice.description" required></textarea>

                            </div>
                        </div>


				 

                         <button class="btn btn-primary"  v-show="vali"   @click="addList">Submit</button>


                    </div>
                </div>
            </div>
            <!--end-->
            <!--show all list-->
            <div class="col-md-12">
                <div class="pannel panel-info">
                    <div class="panel-heading">Your Invoices</div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <tbody v-for="shop in list">
                                <tr>
					
                                    <td>
                                    	<strong v-show="!shop.editing" v-on:click="toggleEdit(shop)">@{{shop.name}}</strong>
                                    	<input v-show="shop.editing" @enter="toggleEdit(shop)"
                                    	v-model="shop.name">
                                    </td>
                                    <td>@{{shop.date}}</td>
                                    <td>@{{shop.total|currency}}</td>
                                    
                                    <!--

									
                                    <td>@{{shop.name}}</td>
                                    <td>@{{shop.price}}</td>
                                    <td>@{{shop.quantity}}</td>
                                    -->
                                    <td><strong @click="deleteList(shop)">X</strong></td>
                                    <td><a href="#" data-toggle="modal" data-target="#myModal@{{shop.id}}" @click="importList(shop)">Review</a></td>
                                    <td><a href="printpdf/@{{shop.id}}">Download PDF</a></td>
                                    <td>
                                        <div id="myModal@{{shop.id}}" class="modal fade" role="dialog">
                                      <div class="modal-dialog">

                                       
                                        <div class="modal-content">
                                       
                                          <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Modal Header</h4>
                                          </div>
                                          <div class="modal-body">
                                         
                                            <p>Your Invoice</p>
                                            <p>Bill To:@{{shop.address}}</p>
                                            <p>DATE:@{{shop.date}}</p>
                                                <div class="panel-body">
                                                    <table class="table table-striped">
                                                        <tbody>
                                                            <tr>
                                                                <td>CUSTOMER NAME</td>
                                                                <td>DESCRIPTION</td>
                                                                <td>HOUR RATE</td>
                                                                <td>HOUR</td>
                                                                <td>TOTAL</td>
                                                            </tr>
                                                            <tr>
                                                                <td>@{{shop.name}}</td>
                                                                <td>@{{shop.description}}</td>
                                                                <td>@{{shop.hourly|currency}}</td>
                                                                <td>@{{shop.time}}</td>
                                                                <td>@{{shop.total|currency}}</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            <!--hide form and add table -->
                                            <!--<div class="form-group">
                                                <input class="form-control" name="name" placeholder="@{{shop.name}}"   value="@{{editlist.name}}" v-model="editlist.name">

                                            </div>
                                            <div class="form-group">
                                                <input class="form-control" name="price" placeholder="@{{shop.price}}"    value="@{{editlist.price}}" v-model="editlist.price" >

                                            </div>
                                            <div class="form-group">
                                                <input class="form-control" name="quantity" placeholder="@{{shop.quantity}}" value="@{{editlist.quantity}}" v-model="editlist.quantity">

                                            </div>-->
                                          

                                          </div>
                                          <!--<div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal" @click="printInvoice">Update</button>
                                          </div>-->
                                          <div class="modal-footer">
                                              <a href="printpdf/@{{shop.id}}">Download PDF</a>
                                          </div>
                                          
                                        </div>

                                      </div>
                                    </div>
                                        



                                    </td>

                                </tr>
                                
                                <!--modal file
                                    <div id="myModal@{{shop.name}}" class="modal fade" role="dialog">
                                      <div class="modal-dialog">

                                       
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Modal Header</h4>
                                          </div>
                                          <div class="modal-body">
                                            <p>Some text in the modal.</p>
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                          </div>
                                        </div>

                                      </div>
                                    </div>
                                  modal end-->
                                    
                            </tbody>
                        </table>
                        <!--<table>
                            <tbody>
                                <tr>
                                  <td>Total:@{{sum|currency}}</td>
                                  
                                </tr>
                            </tbody>
                        </table>-->

                    </div>
                </div>
            </div>

      
        </template>
       
      
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-alpha1/jquery.min.js"></script>
        <script  src="/js/vue.js"></script>
        <script  src="/js/vue-resource.js"></script>
	<script src="https://cdn.jsdelivr.net/vue.validator/2.0.0-alpha.21/vue-validator.min.js"></script>
        <script  src="/js/invoice.js"></script>

@endsection
