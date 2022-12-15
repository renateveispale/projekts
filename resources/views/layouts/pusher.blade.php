<script>

var pusher = new Pusher('486966c05c3e722f0e09', {
		    encrypted: true,
        cluster: "eu",
	  });

	  // Subscribe to the channel we specified in our Laravel Event
	  var channel = pusher.subscribe('status-liked');

	  // Bind a function to a Event (the full Laravel class)
	  channel.bind('App\\Events\\StatusLiked', function(data) {
        var input_val = document.getElementById("text-area").value;
        console.log(data);

        document.getElementById("text-area").innerHTML = data.message;
        document.getElementById("title-area").innerHTML = data.title;
	  });
</script>
