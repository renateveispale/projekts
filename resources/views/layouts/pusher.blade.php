<script>

var pusher = new Pusher('486966c05c3e722f0e09', {
		    encrypted: true,
        cluster: "eu",
	  });

	  // Subscribe to the channel we specified in our Laravel Event
	  var channel = pusher.subscribe('status-liked');

	  // Bind a function to a Event (the full Laravel class)
	  channel.bind('App\\Events\\StatusLiked', function(data) {
        var input_val = document.getElementById("input_field").value;
        console.log(input_val);
        document.getElementById("text-area").innerHTML = "";
        document.getElementById("input_field").innerHTML = "";
        document.getElementById("text-area").innerHTML = input_val + data.message;
        document.getElementById("input_field").value = input_val + data.message;

	  });

</script>
