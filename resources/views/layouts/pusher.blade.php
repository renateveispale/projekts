<script src="https://js.pusher.com/7.2/pusher.min.js"></script>
<script>
	
var pusher = new Pusher('486966c05c3e722f0e09', {
		    encrypted: true,
        cluster: "eu",
	  });

	  Pusher.logToConsole = true;
	  // Subscribe to the channel we specified in our Laravel Event
	  var channel = pusher.subscribe('status-liked');


	  // Bind a function to a Event (the full Laravel class)
	  channel.bind('App\\Events\\StatusLiked', function(data) {

        console.log(data);

        document.getElementById("body").innerHTML = data.message;
        document.getElementById("title").innerHTML = data.title;
		
	  });
</script>
