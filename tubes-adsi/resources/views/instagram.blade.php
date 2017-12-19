@include('header.index')
<!DOCTYPE html>
<html>
<head>
	<title>AcademyOtaku | Instagram</title>
</head>
<body>
<script type="text/javascript">
	function get_media(id='') {
		var token = '2052574873.7004808.56fd8f03c3de45ed983a1c20837e2f59';
		var ttl = 50;
		$.ajax({
			url: 'https://api.instagram.com/v1/users/self/media/recent',
			type: 'GET',
			dataType: 'jsonp',
			data: {
				access_token: token,
				count: ttl,
			}
		})
		.done(function(dt) {
			for (i in dt.data) {
				if (dt.data[i].caption === null) {
					var dk = '';
				}
				else {
					var dk = dt.data[i].caption.text;
				}
				var frame = '\
				<div class="frame-post">\
					<div class="panel">\
						<div class="profile" style="background-image: url('+dt.data[i].user.profile_picture+')"></div>\
						<div class="info">\
							<div class="name">'+dt.data[i].user.full_name+'</div>\
							<div class="username">'+dt.data[i].user.username+'</div>\
						</div>\
					</div>\
					<div class="mid">\
						<img src="'+dt.data[i].images.low_resolution.url+'"</img>\
					</div>\
					<div class="bot">\
						<div class="desk">\
							<p>'+dk+'</p>\
						</div>\
					</div>\
					<div class="tool">\
						<ul>\
							<li>\
								<label class="ttl">'+dt.data[i].likes.count+'</label>\
								<label class="fa fa-lg fa-heart-o"></label>\
							</li>\
							<li>\
								<label class="ttl">'+dt.data[i].comments.count+'</label>\
								<label class="fa fa-lg fa-comment-o"></label>\
							</li>\
						</ul>\
					</div>\
				</div>';
				$('#data_ig').append(frame);
			}
		})
		.fail(function(dt) {
			console.log(dt);
		})
		.always(function() {
			console.log("complete");
		});
	}
	$(document).ready(function() {
		get_media();
	});
</script>
<div id="data_ig"></div>
</body>
</html>