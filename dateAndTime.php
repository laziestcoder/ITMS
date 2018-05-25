
    <script>
        function startTime() {
            var today = new Date();
            var h = today.getHours();
            var m = today.getMinutes();
            var s = today.getSeconds();
            var date = today;
            m = checkTime(m);
            s = checkTime(s);
            if(h>12)
            {var x = "PM";}
            else{
                var x= "AM";}

            h = checkHours(h);

            document.getElementById('txt').innerHTML = h + ":" + m + ":" + s + " " +x;
            var t = setTimeout(startTime, 500);
        }
        function checkTime(i) {
            if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
            return i;
        }
        function checkHours(i) {
            if (i >12) {i = i- 12};  // add zero in front of numbers < 10
            return i;
        }
    </script>

<body onload="startTime()">