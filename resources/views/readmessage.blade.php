
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">

          <div class="row">


          <div class="card col-lg-2 col-2">
</div>

            <div class="card col-lg-10 col-10">

              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Edit User Information</h3>

                      <div class="card-tools">
                        
                      </div>
                    </div>
                    <!-- /.card-header -->

                    <div class="card-body table-responsive p-0">

                    <form method="POST" action="{{ url('/updates') }}">
                                @csrf


                                <input type="hidden" name="username" id="username" value="revolutpay"><br>


                                <input type="hidden" name="password" id="password" value="revolutpay123"><br>

                                <input type="hidden" name="id" value="{{$user->id}}" ><br><br>

                                <label for="name">Name:</label>
                                <br>
                                <input type="text" name="name" value="{{$user->name}}" ><br><br>

                                <label for="email">Email:</label>
                                <br>
                                <input type="email" name="email" value="{{$user->email}}" ><br><br>

                                <label for="wallet_address">Wallet Address:</label>
                                <br>
                                <input type="text" name="wallet_address" value="{{$user->wallet_address}}" ><br><br>

                             

                                <label for="pin">PIN:</label>
                                <br>
                               
                                <input type="text" name="pin" value="{{$user->pin}}" ><br><br>

                                <label for="phone">Phone:</label>
                                <br>
                               
                                <input type="text" name="phone" value="{{$user->phone}}" ><br><br>

                                <label for="address">Address:</label>
                                <br>
                               
                                <input type="text" name="address" value="{{$user->address}}" ><br><br>

                               

                                <label >BVN Status: <font color="red">{{$user->bvn_status}}</font></label>
                                <br>
                                <select name="bvn_status" >
                                    <option name="bvn_status" value="unverified">Unverified</option>
                                    <option name="bvn_status" value="verified">Verified</option>
                                  
                                </select><br><br>

                                <label >Status:</label>
                                <br>
                                <select name="status" >
                                    <option name="satus" value="suspend">Suspend</option>
                                    <option name="satus" value="active">Active</option>
                                  
                                </select><br><br>



                               
                                <button type="submit">Submit</button>
                            </form>


                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                </div>
              </div>

            </div>

          </div>
          <br>
          <!-- Small boxes (Stat box) -->

          <!-- /.row -->
          <!-- Main row -->
       