<!DOCTYPE html>
<html>
<body>

<script>
if(typeof(EventSource) !== "undefined") {
    var source = new EventSource("demo_sse.php");
    source.onmessage = function(event) {
        document.getElementById("result").innerHTML += event.data + "<br>";
    };
} else {
    document.getElementById("result").innerHTML = "you have new notification please <b> click here </b> to reload it";
}
</script>




<h1>Getting server updates</h1>
<div id="result">students info will be displayed here </br></div>


</body>
</html>
