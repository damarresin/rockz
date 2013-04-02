			<div class="main">
				<div class="indent-left">
					<div class="wrapper">
						<article class="col-1">
							<h3>Kontak Person</h3>
							<div class="p1">
							</div>
							<dl>
								<dt>Ringroad Barat,<br>Yogyakarta.</dt>
								<dd><span>Freephone:</span>  +1 123 456 7890</dd>
								<dd><span>Telephone:</span>  +1 321 654 0987</dd>
								<dd><span>FAX:</span>  +1 100 100 1000</dd>
								<dd><span>E-mail:</span> <a class="link-2" href="#">damar@withmeinfo.com</a></dd>
							<img src="gambar/IKLAN.gif" />
							<img src="gambar/promo1.gif" />
							</dl>
						</article>
						<article class="col-2">
							
					<?php if ($logged_in) { ?>
					<h3>Kirim Kritik dan Saran</h3>
					<?php
					$username = $_SESSION['username'];
					$query_user_login = mysql_query("select * from users where username='$username'");
					$user_login = mysql_fetch_array($query_user_login);?>					
							
							<form name="contact" onsubmit="return validateForm()" action="modul/contact/send.php" method="post" id="contact-form">
								<fieldset>
									<label>
										<input type="text" name="dari" value="<? echo $user_login['username']; ?>" onBlur="if(this.value=='') this.value='From Name (di isi)'" onFocus="if(this.value =='From Name (di isi)' ) this.value=''" />
									</label>
									<label>
									  <input type="text" value="to Withmeinfo" onBlur="if(this.value=='') this.value='to Withmeinfo'" onFocus="if(this.value =='to Withmeinfo' ) this.value=''" />
									</label>
									<textarea name="pesan">Message</textarea>
									<div class="buttons-wrapper">
										<a class="button" onClick="document.getElementById('contact-form').reset()">Clear</a>
										<a class="button" onClick="document.getElementById('contact-form').submit()">Send</a>
									</div>
								</fieldset>
							</form>
							
				<?php } ?>			
						</article>
					</div>
				</div>
			</div>