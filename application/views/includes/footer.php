<footer class="theme-footer">
					<div class="container">
						<div class="inner-wrapper">
							<div class="top-footer-data-wrapper">
								<div class="row">
									<div class="col-lg-12 col-sm-12 footer-logo text-center">
										<div class="logo"><a href="<?=base_url()?>"><img src="<?=base_url()?>assets/images/logo/logo.png" alt="Logo"></a></div>
										
									</div> <!-- /.footer-logo -->
									
								</div> <!-- /.row -->
							</div> <!-- /.top-footer-data-wrapper -->

							
						</div>
					</div> <!-- /.container -->
				</footer>

				<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
    
      <!-- Modal content-->
      <div class="modal-content">
        
        <div class="modal-body">
			<form id="signUp">
        	<button type="button" class="close" data-dismiss="modal">&times;</button>
         	<img style="margin: auto" src="<?=base_url()?>assets/images/logo/logo.png" alt="Logo">
			<section id="lan">
				<button type="button" class="btn-1" onclick="selectLanguage(1)">English</button>
				<button type="button" class="btn-2" onclick="selectLanguage(2)">Urdu</button>
			</section>

			<section>
				<button type="button" class="btn-1" onclick="selectType(1)">Farmer</button>
				<button type="button" class="btn-2" onclick="selectType(2)">Buyer</button>
			</section>

			<section>
				<span class="bold">Sign Up</span>
				<input type="text" id="name" name="name" validate="name" placeholder="Name" required>
				<input type="number" id="lat" name="lat" validate="number" placeholder="Latitude" required>
				<input type="number" id="long" name="long" validate="number" placeholder="Logitude" required>
				<input type="number" id="number_of_years" name="number_of_years" validate="number" placeholder="Number of years at location" min="0" required/>
				<input type="number" id="area" name="area" placeholder="Farm Area (Acres)" validate="decimal" min="0" required/>
				<!-- <input type="text" id="crops" name="crops" placeholder="Crops" validate="alpha" required/> -->
				<select id="crops" name="crops" placeholder="Crops" required>
					<?php foreach ($crops as $crop) {?>
						<option value="<?=$crop->c_id?>"><?=$crop->crop?></option>
					<?php }?>
					<option value="" selected disabled hidden>Crops</option>
				</select>
				<input type="number" id="phone" name="phone" placeholder="Phone Number" validate="phone" min="0" required/>
			</section>

			<section id="account">
				<span class="bold">User Account</span>
				<input type="password" class="must_match" id="pass" name="pass" placeholder="password" required/>
				<input type="password" validate="match:.must_match" id="re_pass" name="re_pass" placeholder="Re-type the password" required/>
			</section>

			<section id="otpTab">
				<span class="bold">OTP Verification</span>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing
			elit, sed do eiusmod tempor incididunt ut labore et
			dolore magna aliqua</p>
				<input type="number" id="otp" name="otp" placeholder="Enter OTP" validate="max_length:5" required>
				<p style="font-size: 14px;">Didn't get <a href="">Resend OTP</a></p>
			</section>

			<section class="text-center" id="succesTab">
				<img src="<?=base_url()?>assets/images/successful.png" style="width: 200px; margin: auto;">
				<span id="successMsg"></span><br>
				<div class="button" id="ok" onclick="final_form()">ok</div>
			</section>
 
			<div class="text-center" id="submit_button">
				<div class="button" id="prev">&larr; Previous</div>
				<div class="button" id="next" onclick="checkSection()">Next &rarr;</div>
				<!-- <div class="button" id="submit"><a class="white" type="submit" id="submit" href="javascript:signUp_form()"> Submit</a></div> -->
				<div class="button center" id="submit"><input id="validSubmit" onclick="signUp_form()" type="submit" value="submit"></div>
				<!-- <button type="submit" id="submit">Submit</button> -->
			</div>
			</form>
			<div id="svg_wrap"></div>
			
		</div>  
	  </div> 
    </div>
  </div>