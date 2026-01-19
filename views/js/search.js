function getData() {
			const roomName = document.getElementById("room_name").value;
			const xhttp = new XMLHttpRequest();
			xhttp.onload = function() {
				const data = JSON.parse(xhttp.responseText);
				let display = "";
				if(data.length === 0){
					display += "<tr>";
					display += "<td colspan='5' style='text-align: center;'>No data found</td>";
					display += "</tr>";
				}
				else{
					for (let i = 0; i < data.length; i++) {
						display+= "<tr>";
						display += "<td>" + data[i].room_type + "</td>";
						display += "<td>" + data[i].check_in_date + "</td>";
						display += "<td>" + data[i].check_out_date + "</td>";
						display += "<td>" + data[i].guest + "</td>";
						display += "<td>" + data[i].status + "</td>";
						display += "</tr>";
					}
						
														
				}
				document.getElementById("i1").innerHTML = display;
				
				
			}
			xhttp.open("GET", "../model/summaryQueryJson.php?roomName=" + roomName, true);	
			xhttp.send();
		}