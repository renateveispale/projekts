<script src="https://js.pusher.com/7.2/pusher.min.js"></script>
<script>
	
	var pusher = new Pusher('486966c05c3e722f0e09', {
		    encrypted: true,
        cluster: "eu",
	  });

	  // Subscribe to the channel
	  var channel = pusher.subscribe('status-liked');

	  // Bind a function to a Event (the full Laravel class)
	  channel.bind('App\\Events\\StatusLiked', function(data) {

        document.getElementById("text-body").innerHTML = data.message;
        document.getElementById("text-title").innerHTML = data.title;



	  });


</script>
