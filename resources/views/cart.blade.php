<!-- Cart -->
@extends('layouts.master')
@section('title')
My Cart
@endsection

@section('content')


<div class="container child-content">
<div class="row">
  @if(Session::has('cart'))
  <div class="col-md-12">
    <h3>My Cart </h3>
  </div>
    <div class="col-md-12">
        <table id="cart" class="table table-hover table-condensed">
    				<thead>
						<tr>
							<th style="width:25%">Product</th>
              <th style="width:10%">Product type</th>
							<th style="width:10%">Price</th>
							<th style="width:8%">Quantity</th>
							<th style="width:10%"> Action</th>
						</tr>
					</thead>
					<tbody>
              @foreach($products as $product)
						<tr>
							<td data-th="Product">

								<div class="row">
									<div class="col-sm-2 hidden-xs"><img src="{{ URL::to('img/placehold100.png') }}" alt="" class="img-responsive"></div>
									<div class="col-sm-10">
										<h4 class="nomargin">{{ $product['item']['name'] }}</h4>
										<br/><br/>
									</div>
								</div>

							</td>
              <td data-th="type">{{ $product['item']['type']['name'] }}</td>
							<td data-th="Price">${{number_format($product['price'], 2)}}</td>
							<td data-th="Quantity">
						  <span class="badge">	{{ $product['qty'] }} <span>
							</td>
							<td class="actions" data-th="">
                <div class="btn-group">
                    <button type="button" class="btn btn-primary btn-xs dropdown-toogle" data-toggle="dropdown">Action <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('reduce-by-one', ['id'=> $product['item']['id']]) }}">Reduce by 1</a></li>
                        <li><a href="{{ route('remove-item', ['id'=> $product['item']['id']]) }}">Reduce All</a></li>
                    </ul>
                </div>
							</td>
						</tr>
            @endforeach
					</tbody>
					<tfoot>
						<tr class="visible-xs">
							<td class="text-center"><strong>Total ${{number_format($totalPrice, 2)}}</strong></td>
						</tr>
						<tr>
							<td><a href="{{route('member-products')}}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
							<td colspan="2" class="hidden-xs"></td>
							<td class="hidden-xs text-center"><strong>Total ${{number_format($totalPrice, 2)}}</strong></td>
							<td><a href="#" class="btn btn-success btn-block" data-toggle="modal" data-target="#PayModal">Checkout <i class="fa fa-angle-right"></i></a></td>
						</tr>
					</tfoot>
				</table>


    </div>
    @else
    <div class="col-md-12 no-item">
    <h2>No Items in Cart!</h2>
    </div>
    @endif
  </div>
</div>



<!-- Pay Modal -->
<div id="PayModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Checkout Modal content-->
    <div class="modal-content">
      <div class="modal-body">
        <div class="row">
              <div class="col-xs-12 col-md-12">
                  <div class="panel panel-default">
                      <div class="panel-heading">
                          <h3 class="panel-title">
                              Payment Details
                          </h3>
                          <div class="checkbox pull-right">
                              <label>
                                  <input type="checkbox" />
                                  Remember
                              </label>
                          </div>
                      </div>
                      <div class="panel-body">
                          <form role="form">
                          <div class="form-group">
                              <label for="cardNumber">
                                  CARD NUMBER</label>
                              <div class="input-group">
                                  <input type="text" class="form-control" id="cardNumber" placeholder="Valid Card Number"
                                      required autofocus />
                                  <span class="input-group-addon"><i class="fa fa-credit-card-alt" aria-hidden="true"></i></span>
                              </div>
                          </div>
                          <div class="row">
                            <div class="col-xs-7 col-md-7">
                              <div class="form-group">
                                <label for="expityMonth" class="pull-left">EXPIRY DATE</label>
                                <div class="clearfix"> </div>
                                  <div class="col-xs-5 col-lg-5 pl-ziro">
                                    <input type="text" class="form-control" id="expityMonth" placeholder="MM" required />
                                  </div>
                                  <div class="col-xs-5 col-lg-5 pl-ziro">
                                    <input type="text" class="form-control" id="expityYear" placeholder="YY" required />
                                  </div>
                                </div>
                              </div>

                              <div class="col-xs-4 col-md-4 pull-right">
                                  <div class="form-group">
                                      <label for="cvCode">
                                          CV CODE</label>
                                      <input type="password" class="form-control" id="cvCode" placeholder="CV" required />
                                  </div>
                              </div>
                          </div>

                      </div>
                  </div>
                  <ul class="nav nav-pills nav-stacked">
                      <li class="active"><a href="#"><span class="badge pull-right"><span class="glyphicon glyphicon-usd"></span> @if(isset($totalPrice)) $Total ${{number_format($totalPrice, 2)}} @endif</span> Final Payment</a>
                      </li>
                  </ul>
                  <br/>
                  <a href="#" class="btn btn-success btn-lg btn-block" role="button">Pay</a>
                    </form>
              </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
  <div class="clearfix"> </div>
@endsection
