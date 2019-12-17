@extends('layout.main')
@section('content')
<div class="amado_product_area pd_50">
    <div class="container-fluid">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#"></a>
  <button class="navbar-toggler pull-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <!-- <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li> -->
      
      <li class="nav-item dropdown">
        <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Danh mục
        </a>
        <div class="dropdown-menu box-price-range" aria-labelledby="navbarDropdown">
         <div class="widget price price-range">
                <!-- Widget Title -->
                <h6 class="widget-title mb-30"> Khoảng giá</h6>

                <div class="widget-desc">
                    <div class="slider-range">
                        <div data-min="1000000" data-max="100000000" data-unit="" class="slider-range-price ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" data-value-min="1000000" data-value-max="10000000" data-label-result="" id="priceR" onchange="priceRange()">
                            <div class="ui-slider-range ui-widget-header ui-corner-all"></div>
                            <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                            <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                        </div>
                        <div class="range-price">1000.000 - 100.000.000</div>
                    </div>
                </div>
            </div>
        </div>
      </li>
    </ul>
  </div>
</nav>
        <div class="row">
            <div class="col-12">
                <div class="product-topbar d-xl-flex align-items-end justify-content-between">
                    <!-- Total Products -->
                    <div class="total-products">
                        <p>Showing 8 0f 99</p>
                        <div class="view d-flex">
                            <a href="#"><i class="fa fa-th-large" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-bars" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <!-- Sorting -->
                    <div class="product-sorting d-flex">
                        <div class="sort-by-date d-flex align-items-center mr-15">
                            <p>Sort by</p>
                            <form action="#" method="get">
                                <select name="select" id="sortBydate">
                                    <option value="value">Date</option>
                                    <option value="value">Newest</option>
                                    <option value="value">Popular</option>
                                </select>
                            </form>
                        </div>
                        <div class="view-product d-flex align-items-center">
                            <p>View</p>
                            <form action="#" method="post">
                                <select name="view" id="viewProduct">
                                    <option value="12"><a href="&jshjg">12</a></option>
                                    <option value="24"><a href="&jshjg">24</a></option>
                                    <option value="48"><a href="&jshjg">48</a></option>
                                    <option value="96"><a href="&jshjg">96</a></option>
                                </select>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row" id="product">

            <!-- Single Product Area -->

            <div class="col-xl-3 col-lg-6 col-md-12 col-sm-12 col-12" id="">
                                    <div class="product-thumbnail">
                                        <div class="product-img-head">
                                            <div class="product-img">
                                                <img src="resources/img/product-img/pro-big-1.jpg" title="Lorem ipsum dolor " alt="" class="rounded"></div>
                                            <div class=""><a href="#" class="product-wishlist-btn"><i class="fas fa-heart"></i></a></div>
                                        </div>
                                        <div class="product-content">
                                            <div class="product-content-head">
                                                <h3 class="product-title">Lorem ipsum.</h3>
                                                <div class="product-rating d-inline-block">
                                                    <i class="fa fa-fw fa-star"></i>
                                                    <i class="fa fa-fw fa-star"></i>
                                                    <i class="fa fa-fw fa-star"></i>
                                                    <i class="fa fa-fw fa-star"></i>
                                                    <i class="fa fa-fw fa-star"></i>
                                                </div>
                                                <div class="product-price"><p>9999999999999 VNĐ</p>
                                                    <!-- <del class="product-del">$69.00</del> -->
                                                </div>
                                            </div>
                                            <div class="product-btn">
                                                <a href="javascript:void(0)" class="btn btn-dark" onclick="">Add to Cart</a>
                                                <a href="#" class="btn btn-outline-dark">Details</a>
                                                <a href="#" class="btn btn-outline-dark"><i class="fas fa-exchange-alt"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

            <!-- Single Product Area -->


            <!-- Single Product Area -->

            <!-- Single Product Area -->


            <!-- Single Product Area -->


            <!-- Single Product Area -->

        </div>

        <div class="row">
            <div class="col-12">
                <!-- Pagination -->
                <nav aria-label="navigation">
                    <ul class="pagination justify-content-end mt-50">
                        <li class="page-item active"><a class="page-link" href="">999</a></li>
                    
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>



@stop()