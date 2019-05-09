@extends('frontend.master')
@section('title','Danh mục sản phẩm')
@section('main')
	<link rel="stylesheet" href="css/category.css">

					<div id="wrap-inner">
						<div class="products">
							<h3>SamSung</h3>
							<div class="product-list row">
							@foreach($items as $item)
								<div class="product-item col-md-3 col-sm-6 col-xs-12">
									<a href="#"><img width ="130px"  src="{{asset('storage/app/avatar/'.$item->prod_img)}}" class="img-thumbnail"></a>
									<p><a href="#">{{$item->prod_name}}</a></p>
									<span>{{number_format($item->prod_price,0,',','.')}}VND</span>	  
									<div class="marsk">
									<a href="{{asset('detail/'.$item->prod_id.'/'.$item->prod_slug.'.html')}}">Xem chi tiết</a>
									</div>                                    
								</div>
							@endforeach	
							</div>                	                	
						</div>

						<div id="pagination">
							<ul class="pagination pagination-lg justify-content-center">
							{{$items->links()}}
								</li>
							</ul>
							
						</div>
					</div>

					
					<!-- end main -->
				</div>
			</div>
		</div>
	</section>
	<!-- endmain -->
@stop