
<!DOCTYPE html>
<html>
<head>
	<base href="http://localhost/tarihi_kategori/" />
	<title>Bulutasarim.com</title>
	<style type="text/css">
		body{
			margin: 0 auto;
			padding: 0;
		}
		nav{
			height: 50px;
			background-color: red;
			margin-bottom: 25px;
		}
		section{
			margin: 0 auto;
			width: auto;
			text-align: center;
		}
		.sub{
			background-color: burlywood;
			width: 25%;
			text-align: center;
			margin: 0 auto;
			margin-bottom: 15px;
			position: relative;
			top: -4px;
		}
		.sub a{
			text-decoration: none;
			font-size: 15px;
			font-weight: 600;
			font-family:sans-serif;
			color:#421916;
		}
		.tarih{
			width: 200px;
			margin: 0 auto;
		}

ul{
	list-style: none;
	text-align: -webkit-auto;
}
li a {
	background-color: #ccc;
	padding-right: 3px;
	padding-left: 3px;
	color: black;
	text-decoration-line: none;
	font-family: sans-serif;

}
ul li{
	border-bottom: 1px solid white;
}

	</style>
	<link rel="icon" href="fav/favicon.ico" type="image/x-icon">
</head>
<body>
	<nav>
		<div>

		</div>
	</nav>
	<section>
		<div>
			<?php
			include 'baglan.php';
//$yil = $_GET['icerik_tarih'];
//$tarih  = $_GET['icerik_ay'];

			$icerik_turu ="Tum-Yazilar";

			function tarihlist($ay)
			{
				$ing_aylar = array("12","11","10","9","8","7","6","5","4","3","2","1","0");
				$tr_aylar = array("Aralık","Kasım","Ekim","Eylül","Ağustos","Temmuz","Haziran","Mayıs","Nisan","Mart","Şubat","Ocak","");

				$tarih = str_replace($ing_aylar,$tr_aylar,$ay);

				echo $tarih;
			};

            function tarihlink($ay)
            {
            $tr_aylar = array("aralik","kasim","ekim","eylul","agustos","temmuz","haziran","mayis","nisan","mart","subat","ocak","");
			$ing_aylar = array("12","11","10","9","8","7","6","5","4","3","2","1","0");
            $tarihseo = str_replace($ing_aylar,$tr_aylar,$ay);
            return $tarihseo;
            }
            function linktarih($ay)
            {
            $tr_aylar = array("aralik","kasim","ekim","eylul","agustos","temmuz","haziran","mayis","nisan","mart","subat","ocak");
			$ing_aylar = array("12","11","10","09","08","07","06","05","04","03","02","01");
            $tarihseo = str_replace($tr_aylar,$ing_aylar,$ay);
            return $tarihseo;
            }
			function arsiv($yil)
			{
				global $db;
				$icerik=$db->prepare('
					SELECT
					MONTH(icerik_tarih) as ay
					FROM
					icerikler
					WHERE YEAR(icerik_tarih)=?
					GROUP BY
					icerik_tarih 

					');
				$icerik-> execute(array($yil));
				if($icerik-> rowCount() >0)
				{
					$icerikay=$icerik->fetchAll(PDO::FETCH_ASSOC);
								echo "<ul>";
								foreach ($icerikay as $key) {
									echo '<li><a href="'.$yil.'/'.tarihlink($key["ay"]).'">';
									echo tarihlist($key["ay"]);
									echo "</a></li>";
								}
								echo "</ul>";
							}
			};





/*Kategori listeleme alanı*/
$icerik=$db->prepare('SELECT YEAR(icerik_tarih) as tarih from icerikler GROUP BY
					tarih  order by id asc');
			$icerik->execute();
			$icerikgetir=$icerik->fetchAll(PDO::FETCH_ASSOC);
			echo "<div class='tarih'><ul><li><a href='./'>Tüm Zaman</a></li>";
			foreach ($icerikgetir as $key => $value) {
                $yil = $value["tarih"];
				echo "<li><b>".$yil."</b>";
				arsiv($yil);
				echo "</li>";

			} 
			echo "</ul></div>"; 









/*İçerik listeleme alanı. */
/*Eğer kategoride seçili bir ay varsa GET için ayrılmış SELECT sorgusu çalışır.*/


				if(isset($_GET["yil"]) || isset($_GET["ay"])){
					$icerik=$db->prepare('
				SELECT
				YEAR(icerik_tarih),
				icerik_tarih,
				konu,seo,img
				FROM
				icerikler
				WHERE YEAR(icerik_tarih)=? AND MONTH(icerik_tarih)=?
				ORDER BY icerik_tarih DESC
				');
				$icerik-> execute(array($_GET["yil"],linktarih($_GET["ay"])));
							}else{
				$icerik=$db->prepare('
				SELECT
				*
				FROM
				icerikler
				ORDER BY icerik_tarih DESC
				
				');
				$icerik-> execute();	
							}

			$icerikgetir=$icerik->fetchAll(PDO::FETCH_ASSOC);

			foreach ($icerikgetir as $key => $value) {
				?>

				<img src="<?php echo $value['img'];?>" width="25%">
				<div class="sub"><a ><?php echo substr($value['icerik_tarih'],0,10);?></a><br>
					<a href="<?php echo $value['seo'];?>"><?php echo $value['konu'];?></a> 
				</div>			
			<?php }

			
			?>

		</div>

	</section>







</body>
</html>