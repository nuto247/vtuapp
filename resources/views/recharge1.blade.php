@include('logo')

@if($user->usertype=='admin')
    @include('adminsidebar')
    @else
    @include('sidebar')
    @endif
           
@include('logo1')
                <!-- main header @e -->
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            <h3 class="nk-block-title page-title">Buy Airtime</h3>
                                        </div><!-- .nk-block-head-content -->
                                     
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->
                                <div class="nk-block">
                                    <div class="row g-gs">
                                        <div class="col-xxl-3 col-sm-6">
                                            <div class="card">
                                                <div class="nk-ecwg nk-ecwg6">
                                                    <div class="card-inner">
                                                        <div class="card-title-group">
                                                            <div class="card-title">
                                                                <h6 class="title">Wallet Balance</h6>
                                                            </div>
                                                        </div>
                                                        <div class="data">
                                                            <div class="data-group">
                                                                <div class="amount">    ₦{{ $user->balance }}.00</div>
                                                                <div class="nk-ecwg6-ck">
                                                                  
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div><!-- .card-inner -->
                                                </div><!-- .nk-ecwg -->
                                            </div><!-- .card -->
                                        </div><!-- .col -->
                                        <div class="col-xxl-3 col-sm-6">
                                            <div class="card">
                                                <div class="nk-ecwg nk-ecwg6">
                                                    <div class="card-inner">
                                                        <div class="card-title-group">
                                                            <div class="card-title">
                                                                <h6 class="title">Refferal Bonus</h6>
                                                            </div>
                                                        </div>
                                                        <div class="data">
                                                            <div class="data-group">
                                                                <div class="amount">NGN 0.00</div>
                                                                <div class="nk-ecwg6-ck">
                                                      
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div><!-- .card-inner -->
                                                </div><!-- .nk-ecwg -->
                                            </div><!-- .card -->
                                        </div><!-- .col -->
                                    
                                    
                                
                                   
                                    </div><!-- .row -->
                                </div><!-- .nk-block -->

                                <div class="container">
  <div class="row">
    <div class="col">

    </div>
    <div class="col-6">

    </div>
    <div class="col">

    </div>
  </div>
  <div class="row">
    <div class="col-1">
    
    </div>
    <div class="col-10">
    <div class="card-body table-responsive p-0">

                                 @include('partials.alert-messages')

                                 <form method="GET" action="{{ url('/recharge-airtime') }}">
                                @csrf
                                <br>  <br>

                                <label for="phone">Phone Number:</label>
                                <br>
                                <input  type="text" name="phone" id="phone" class="form-control"><br><br>

                                <label for="network_id">Network:</label>
                                <br>
                                <select name="network_id" id="network_id" class="form-control">
                                    <option value="mtn">MTN</option>
                                    <option value="glo">Glo</option>
                                    <option value="airtel">Airtel</option>
                                    <option value="etisalat">9mobile</option>
                                </select><br><br>



                                <label for="amount">Amount:</label>
                                <br>
                                <input type="number" name="amount" id="amount" class="form-control"><br><br>

                                <button type="submit" class="btn btn-primary">Recharge</button>
                            </form>


                    </div>
    </div>
    <div class="col-1">
    
    </div>
  </div>
</div>

                                
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content @e -->
                <!-- footer @s -->
                <div class="nk-footer">
                    <div class="container-fluid">
                        <div class="nk-footer-wrap">
                            <div class="nk-footer-copyright"> &copy; 2022 DashLite. Template by <a href="https://softnio.com" target="_blank">Softnio</a>
                            </div>
                            <div class="nk-footer-links">
                                <ul class="nav nav-sm">
                                 
                              
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- footer @e -->
            </div>
            <!-- wrap @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->
    <!-- select region modal -->
    <div class="modal fade" tabindex="-1" role="dialog" id="region">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-bs-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
             
            </div><!-- .modal-content -->
        </div><!-- .modla-dialog -->
    </div><!-- .modal -->
    <!-- JavaScript -->
    <script src="./assets/js/bundle.js?ver=3.1.2"></script>
    <script src="./assets/js/scripts.js?ver=3.1.2"></script>
    <script src="./assets/js/charts/chart-ecommerce.js?ver=3.1.2"></script>
</body>

</html>


