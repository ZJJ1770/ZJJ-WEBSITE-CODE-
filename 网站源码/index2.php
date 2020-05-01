
<html>
	<head>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>网易云音乐下载</title>
		<link rel="shortcut icon" href="//s1.music.126.net/style/favicon.ico?v20180823">
		<script src="https://cdn.jsdelivr.net/npm/jquery@1.12.4/dist/jquery.min.js"></script>
		<script src="./jquery-1.11.3.min.js"></script>
		<!-- 最新版本的 Bootstrap 核心 CSS 文件 -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

		<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<style>
			.container-fluid{
				background:#E5E7E9;
			}
			.container{
				height:35px;
				line-height:35px;
			}
			.y_title{
				
				font-size:25px;
			}
			.idwt{
				height:20px;
				line-height:20px;
			}
			p a{
				
				font-size:30px;
			}
			@media only screen and (max-width:768px) {
				.bj {
					min-height:600px;
					background:url(./bj.jpg);
					background-repeat:no-repeat;
					background-size:768px;
				}
			}
			@media only screen and (min-width:768px) and (max-width:992px) {
				.bj {
					min-height:1200px;
					background:url(./bj.jpg);
					background-repeat:no-repeat;
					background-size:992px;
				}
			}
			@media only screen and (min-width:992px) and (max-width:9999px) {
				.bj {
					min-height:1200px;
					background:url(./bj.jpg);
					background-size:1920px 1200px;
				}
			}

			/*.bj{
					background:url(./bj.jpg);
					background-size:100% 100%;
			}*/
		</style>
	</head>
	<body>
		<div class="container-fluid">
			<div class="container">
				<div class="row">
					<div class="col-md-3 y_title">网易云音乐下载</div>
				</div>
			</div>
		
		</div>
		<div class="row bj">
			<div class="col-md-4 col-md-offset-4">
				<form action="?mod=xz" method="post">
				  <div class="form-group">
					<label for="exampleInputEmail1">音乐ID</label>
					<input type="text" class="form-control" name="id" id="exampleInputEmail1" placeholder="音乐ID">
				  </div>
				  <button type="submit" class="btn btn-info btn-lg btn-block">下载</button>
				</form>
				<p>
					<?php
						$yy = $_GET['mod'];
						if($yy == 'xz'){
							$id = $_POST['id'];
							if(!empty($id)){
								if(is_numeric($id) && strlen($id) > 4){
									$file = "./music/".$id.".mp3";
									$music_name = "".$id.".mp3";
									if(!file_exists($file)){
										$url = "http://music.163.com/song/media/outer/url?id=".$id.".mp3";
										$mp3 = file_get_contents($url);
										if(!empty($mp3) && !is_null(strlen($mp3))){
											$fp = fopen($file, "w");
											$cg = fwrite($fp,$mp3);
											fclose($fp);
											if(!empty($cg)){
												echo"<a href='".$file."' download='".$music_name."'>资源准备好啦,戳我下载吧</a>";
											}
										}else{
											echo"<script>alert('无ID:".$id."的歌曲，请检查ID是否正确')</script>";
										}
									}else{
										echo"<a href='".$file."' download='".$music_name."'>资源准备好啦,戳我下载吧</a>";
									}
									
								}else{
									echo "<script>alert('请输入正确的ID')</script>";
								}
							}else{
								echo"<script>alert('ID不能为空')</script>";
							}
						}
					?>
				</p>
				<!--源码来自三岁半资源网-sansuib.com-->
				<blockquote class="bs-callout-info">
					关于ID，请前往<a href="http://music.163.com" target="_blank">http://music.163.com</a>获取
				</blockquote>
				<button type="button" class="btn btn-success btn-block" data-toggle="modal" data-target=".bs-example-modal-lg">点击查看获取歌曲ID的方法</button><br>
		
              
				<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
				  <div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<h4 class="text-center" style="font-weight:bold;">获取ID方法</h4><hr/>
						<p class="" style="font-size:20px;">前往网易云音乐(<a href="http://music.163.com" target="_blank">http://music.163.com</a>)搜索想要下载的歌曲，进入歌曲页面，在地址栏查看歌曲的ID，复制过来就好啦~</p>
						<img src="./wyy.png" alt="id示例" width="100%"/>
					</div>
				  </div>
				</div>

			</div>
		</div>
	</body>
	<script>
		var aBtn = document.getElementsByTagName("button")[0]
		var aP = document.getElementsByTagName("p")[0]
		aBtn.onclick = function(){
			aP.innerHTML = "<span class='glyphicon glyphicon-cd'>正在准备资源,请稍等....</span>"
		}

	
	</script>
</html>


 
