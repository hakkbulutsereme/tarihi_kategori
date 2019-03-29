<?php

			include 'baglan.php';
			$icerik=$db->prepare("select * from icerikler where seo=:seo");
			$icerik->execute(array('seo' => $_GET['seo']));
			$icerikgetir=$icerik->fetch(PDO::FETCH_ASSOC);
			if(!isset($_COOKIE[$icerikgetir['seo']])){
				$up=$db->prepare("UPDATE icerikler SET hit=hit+1
	where  seo=:seo ");
				$hit=$up->execute(array("seo"=>$icerikgetir['seo']));
				if ($hit) {
					$url = 'http://localhost/hit/'.$icerikgetir['seo'];
					setcookie($icerikgetir['seo'],'okundu',time()+(60*60*24*30), $url);
				}
			}

			?>
<!DOCTYPE html>
<html>
<head>
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
		
		width: 25%;
		text-align: center;
		margin: 0 auto;
		margin-bottom: 15px;
		position: relative;

	}
	.sub a{
		text-decoration: none;
		font-size: 20px;
		font-weight: 600;
		font-family:sans-serif;
		color:#421916;
	}
	.metin{
		max-width: 900px;
		text-align: center;
		margin: 0 auto;
	}
	.kutu{
		margin-bottom: 25px

	}
	.hit{
		background: gray;
		color: white;
		padding: 3px;
		font-family: sans-serif;
	}

	nav .geri{
		background-color: white;
		width: fit-content;
		padding: 16px;
	}
	nav .geri a{
		font-family: sans-serif;
		font-weight: 700;
		text-decoration: none;
		color: cornflowerblue;
	}
</style>



</head>
<body>
	<nav>
		<div class="geri">
			<a href="./"> GERİ</a>
		</div>
	</nav>
	<section>
		<div>
			
			<div class="kutu">
				<img src="<?php echo $icerikgetir['img'];?>" width="25%">
				<div class="sub">
					<a href="<?php echo $icerikgetir['seo'];?>"><?php echo $icerikgetir['konu'];?></a>
				</div>
				<p class="metin"><?php echo $icerikgetir['metin'];?></p>
				<p class="metin"><?php echo ($icerikgetir['icerik_tarih']);?></p>
			</div>
			
			
			</div>

		</section>







	</body>
	</html>