


window.setTimeout("waktu()",1000);
		function waktu()
		{
			var tanggal = new Date();
			setTimeout("waktu()",1000);
			document.getElementById ("jamdigital").innerHTML = tanggal.getHours() + ":" + tanggal.getMinutes() + ":" + tanggal.getSeconds();
		}