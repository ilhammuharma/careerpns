<?
	$data ="SELECT v.idvacancy, kk.namaKategori as pos, v.duedate FROM vacancy v ";
	$data .= "INNER JOIN kategoriKerja kk ON kk.idKategori = v.position ";
	$data .= "where v.duedate>='".date('Y-m-d')."' ORDER BY v.duedate DESC LIMIT 7";
	$execdata = mysql_query($data);
?>
<!-- Site footer -->
    <footer class="site-footer">
		<!-- Top section -->
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-4">
					<h6>About</h6>
					<p class="text-justify">PT Pratama Nusantara Sakti is a joint venture company of 3 conglomerates group in Indonesia consists of Djarum Group, Wings group, and Central Proteina Prima. We are moved in sugarcane plantation, located in OKI, South Sumatera. Our company was established since 2009 and started operating on 2012.</p>
				</div>
				<div class="col-xs-6 col-md-4">
					<h6>Trendeing jobs</h6>
					<ul class="footer-links">
						<? while($cet_data=mysql_fetch_array($execdata)){?>
						<li><a href="<?=$base_url?>vacancy-detail.php?r=<?=$cet_data['idvacancy']?>"><?=$cet_data['pos']?></a></li>
						<?}?>
					</ul>
				</div>
				<div class="col-xs-6 col-md-4">
					<h6>Contact</h6>
					<p><strong>Head Office - PT Pratama Nusnatara Sakti</strong></p>
					<p>Office Park Kuningan<br>
					Wisma Gawi 3rd Floor, Suite 303<br>
					Setiabudi Selatan St., Kav. 16-17 <br>
					South Jakarta - 12920 <br>
					<span class="fa fa-phone"></span> +62 21 5794 1785<br>
					<span class="fa fa-fax"></span> +62 21 5794 1786
					</p>
				</div>
			</div>
			<hr>
		</div>
		<!-- END Top section -->
		<!-- Bottom section -->
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-sm-6 col-xs-12">
					<p class="copyright-text">Copyrights &copy; 2017 PT. Pratama Nusantara Sakti</p>
				</div>
				<div class="col-md-4 col-sm-6 col-xs-12">
					<ul class="social-icons">
						<li><a class="linkedin" href="https://www.linkedin.com/in/pt-pratama-nusantara-sakti-881a9885/"><i class="fa fa-linkedin"></i></a></li>
						<li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
						<li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
						<li><a class="instagram" href="#"><i class="fa fa-instagram"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
		<!-- END Bottom section -->
    </footer>
    <!-- END Site footer -->
    <!-- Back to top button -->
    <a id="scroll-up" href="#"><i class="ti-angle-up"></i></a>
    <!-- END Back to top button -->
    <!-- Scripts -->
    <script src="assets/js/app.min.js"></script>
    <script src="assets/js/custom.js"></script>