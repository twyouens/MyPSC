<html>
    <head>
    <link rel="stylesheet" type="text/css" href="style.css">
        <script src="https://data.psc.ac.uk/js/psc.js"></script>

        <script type="text/javascript">
            var clientId = '132_t798rfy7n0gw08004soc8gg40k4c8oogw8kcg0cwskgwocc0k';
            // Check for an access token
            function checkAuth() {
                psc.auth.authorise({clientId:clientId},'handleAuthResult');
            }
            function handleAuthResult(authResult) {
                var authoriseButton = document.getElementById('authorise-button');
                if (authResult && !authResult.error) {
                  authoriseButton.style.visibility = 'hidden';
                  readTimetable();
                } else {
                  console.log(authResult.message);
                  window.location.replace("login.html");
                  authoriseButton.style.visibility = '';
                  authoriseButton.onclick = checkAuth;
                }
            }
            function readTimetable() {
                // Load the timetable for the current week
                psc.api.call("timetable",{
  start: 1571007600,
  end: 1571612340,
  includeBlanks: false
}).then(function(data) {
                    var HTML = '';
                    for (var key in data.timetable) {
                        if (data.timetable.hasOwnProperty(key)) {
                            HTML += "<tr><td>"+data.timetable[key].Type+ "</td> <td>"+data.timetable[key].Title+ "</td> <td>" +data.timetable[key].Room+  "</td> <td>" +data.timetable[key].Staff+  "</td> <td>" +data.timetable[key].Start+ "</td> <td>" +data.timetable[key].End+"</td> </tr>";
                        }
                    }
                    document.getElementById('timestables').innerHTML = HTML;
                }, function(error) {
                    console.log(error);
                });
            }
        </script>
    </head>
    <body class="body" onload="checkAuth()">
        <button id="authorise-button" style="visibility: hidden">Log in</button>
        <h1 class="pagetitle">My Timetable</h1>
<table class="table" id="timestables">
    <tr>
            <th>Type</th>
            <th>Title</th>
            <th>Room</th>
            <th>Staff</th>
            <th>Start</th>
            <th>End</th>
        </tr>
</table>
    </body>
</html>