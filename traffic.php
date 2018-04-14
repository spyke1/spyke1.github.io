<!DOCTYPE html>
<html>
  <head>
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <style>
		#updates {
			font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
			border-collapse: collapse;
			width: 100%;
		}

		#updates td, #customers th {
			border: 1px solid #ddd;
			padding: 8px;
		}

		#updates tr:nth-child(even){background-color: #f2f2f2;}

		#updates tr:hover {background-color: #ddd;}

		#updates th {
			padding-top: 12px;
			padding-bottom: 12px;
			text-align: left;
			background-color: #4CAF50;
			color: white;
		}
	</style>
   </head>
   <body>
		<table id="updates">
			<tr>
				<th>
					<h1>Affected Suburbs</h1>
				</th>
			</tr>	
		</table>
		
		<button id="refresh" class="btn btn-default">refresh</button>
	</body>
	</html>
	
	<script>
		$(document).ready(function() {
			getUpdates();
			
			$("#refresh").click(function() {
				getUpdates();
			});
			
		})
		
		function getUpdates() {
			$("#updates").html("<tr><th><h1>Affected Suburbs</h1></th></tr>");
			$.ajax({
				url : '/incidents.php',
				type : 'GET',
				DataType : 'json',
				data : {},
				success : function(d) {
					for (var i = 0; i < d.length; i++) {
						$("#updates").append(
							"<tr id='suburb'>" +
								"<td><h2>" + d[i].suburb + " - " + d[i].description + "</h2></td>" +
							"</tr>"
						);
					}
					
				}
			});
		}
		
	</script>
	
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
