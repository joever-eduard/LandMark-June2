<html>
  <head>
    <meta charset="UTF-8">
    <title>Virtual Map</title>
    <style>
        .mapdiv {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 50px;
            padding: 50px 0px;
            border: 1px solid black;
            position: relative;
            background: green;
        }
        path {
            fill: #1da1f2;
        }
        path:hover {
            fill: purple;
            stroke: red;
            stroke-width: 0.5px;
            transition: fill 0.4s;
        }
        #detail-div {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 200px;
            height: 200px;
            background-color: rgba(0, 0, 0, 0.8);
            color: white;
            display: none;
            padding: 10px;
        }

    </style> 
    <link rel="stylesheet" href="/assets/css/adminmap.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
  </head>
  <body>
  <header>
    <div class="navbar">
        <img src="/assets/images/icon2.png" class="logo">
        <ul>
            <li><a href="/adminhome">Home</a></li>
            <li><a href="/adminabout">About</a></li>
            <li><a href="/adminmap">Virtual Map</a></li>
            <li><a href="/adminsearch">Search Land</a></li>
            <li><a href="/documents">Land Documents</a></li>
            <li><a href="/reports">Reports</a></li>
            <li>
                <a href="/profile">
                    <img src="/assets/images/user.png" alt="Profile" class="user">
                </a>
                <ul class="dropdown">
                    <li><a href="/" onclick="logout()">Logout</a></li>
                </ul>
            </li>
        </ul>
    </div>
</header>

    <div class="virtual-page">
        <div class="container">
        <h1>Virtual Map</h1>
        </div>
    </div>

    <div class="mapdiv">
        <svg baseprofile="tiny" fill="#7c7c7c" height="509" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" version="1.2" viewbox="0 0 1000 509" width="1000" xmlns="http://www.w3.org/2000/svg">
            <a 
            xlink:title="Lot #1"
            id = "lot1"
            target="_blank"
            >
                <path d="M740.6 100.1l-12.9 17-10.7 26.7-5.3 28.5-23.2 8.9-17.7 8.9-19.6 19.5-10.7 26.7 0 26.8 5.3 28.4 16.1 26.7 19.5 30.3 19.6 32.1 8.5 14.8-28.6 11-96.2 65.9-15.9 14.8-19-5.1-32.1-12.4-24.9-14.3-26.7-28.5-7.1-26.7 1.8-23.1-3.6-35.6 23.2-17.8 24.9-24.9 0-28.5-12.5-19.6 14.3-21.4 28.4-16 21.4-17.8-3.6-21.4-10.7-21.3-17.8-19.6 7.2-23.2 21.3-21.3 24.9-1.8 33.8 1.8 32.1-3.6 19.6-23.3 76.9 38.4z" id="SGP4871" name="Central Singapore">
                </path>
            </a>
            <a
            xlink:title="Lot #2"
            id = "lot2"
            target:="_blank"
            >
                <path d="M457.2 341.4l3.6 35.6-1.8 23.1 7.1 26.7 26.7 28.5 24.9 14.3 32.1 12.4 19 5.1-7.8 9.4-14.4 6.1-35.3 5.4-67.1-1.3-33.1-8.5-14.1-16.5-23.5-37.7-57.1-26.2-68.6-16-58.9-6.4-119.4 3.1-48.6-11.8-19.9-38.1 11.9-43.4 82.1-116.3 11.8-52 13.7-29.3 30.8-31.5 36.5-22.2 26.4-4.3 60 7.8 61.7-7.8-3.2 26.5-5.4 30.3-1.7 23.1 0 32.1 14.2 19.6 19.6 19.5 19.5 16.1 26.7 21.3 1.8 17.8-10.7 12.5-10.6 10.7 5.3 12.4 21.3 7.2 21.4 17.8 23.1 24.9z" id="SGP4872" name="South West">
                </path>
            </a>    
            <a
            xlink:title="Lot #3"
            id = "lot3"
            target="_blank"
            >
                <path d="M663.7 61.7l-19.6 23.3-32.1 3.6-33.8-1.8-24.9 1.8-21.3 21.3-7.2 23.2 17.8 19.6 10.7 21.3 3.6 21.4-21.4 17.8-28.4 16-14.3 21.4 12.5 19.6 0 28.5-24.9 24.9-23.2 17.8-23.1-24.9-21.4-17.8-21.3-7.2-5.3-12.4 10.6-10.7 10.7-12.5-1.8-17.8-26.7-21.3-19.5-16.1-19.6-19.5-14.2-19.6 0-32.1 1.7-23.1 5.4-30.3 3.2-26.5 76.5-36.6 41-12 73.1 4.3 70.5 23 66.7 33.4z" id="SGP4873" name="North West">
                </path>
            </a>
            <a
            xlink:title="Lot #4"
            id = "lot4"
            target="_blank"
            >
                <path d="M895.6 162.4l-9.5 18.8-21.4 17.8-24.9 10.6 0 21.4-8.9 30.3-19.6 0-14.2-12.5-35.6-16-30.2-10.7-23.2-17.8 3.6-32 5.3-28.5 10.7-26.7 12.9-17 63.3 31.6 77.9 27.6 13.8 3.1z" id="SGP4874" name="North East">
                </path>
            </a>
            <a
            xlink:title="Lot #5"
            id = "lot5"
            target="_blank"
            >
                <path d="M709.5 395.4l-8.5-14.8-19.6-32.1-19.5-30.3-16.1-26.7-5.3-28.4 0-26.8 10.7-26.7 19.6-19.5 17.7-8.9 23.2-8.9-3.6 32 23.2 17.8 30.2 10.7 35.6 16 14.2 12.5 19.6 0 8.9-30.3 0-21.4 24.9-10.6 21.4-17.8 9.5-18.8 54.6 12.4 38.1 14.1 10.7 16.9-31.8 53-46.7 56.3-56.4 44.9-61.7 18.3-67.8 7.5-25.1 9.6z" id="SGP4875" name="South East">
                </path>
            </a>
        </svg>

        <div id="detail-div">
            <?php foreach ($lots as $lot) { ?>
            <p>Lot Number:<?= isset($lot['lot_no']) ? esc($lot['lot_no']) : '' ?></p>
            <p>Cad Number:<?= isset($lot['cad_no']) ? esc($lot['cad_no']) : '' ?></p>
            <p>Size of Area:<?= isset($lot['size_of_area']) ? esc($lot['size_of_area']) : '' ?></p>
            <p>Location:<?= isset($lot['location']) ? esc($lot['location']) : '' ?></p>
            <?php } ?>
            <table>

            </table>
            <!-- <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                echo '<h3>Selected Row:</h3>';
                if (isset($_POST['lot'])) {
                    $lot = $_POST['lot'];
                    switch ($lot) {
                        case '1':
                            echo $lots;
                            break;
                        case '2':
                            echo $lots;
                            break;
                        default:
                            echo 'Invalid lot selection';
                            break;
                    }
                } else {
                    echo 'No lot selected';
                }
            }
            ?> -->

        </div>

    </div>
    <script>

            document.getElementById('lot1').addEventListener('click', function() {
                var lotId = 1;
                var detailDiv = document.getElementById('detail-div');
                detailDiv.style.display = 'block';
                // document.getElementById('selected-lot').value = '1';
            });

            document.getElementById('lot2').addEventListener('click', function() {
                var lotId = 2;
                var detailDiv = document.getElementById('detail-div');
                detailDiv.style.display = 'block';
                // document.getElementById('selected-lot').value = '1';
            });

            document.getElementById('lot3').addEventListener('click', function() {
                var lotId = 3;
                var detailDiv = document.getElementById('detail-div');
                detailDiv.style.display = 'block';
                // document.getElementById('selected-lot').value = '1';
            });

            document.getElementById('lot4').addEventListener('click', function() {
                var lotId = 4;
                var detailDiv = document.getElementById('detail-div');
                detailDiv.style.display = 'block';
                // document.getElementById('selected-lot').value = '1';
            });

            document.getElementById('lot5').addEventListener('click', function() {
                var lotId = 5;
                var detailDiv = document.getElementById('detail-div');
                detailDiv.style.display = 'block';
                // document.getElementById('selected-lot').value = '1';
            });

        </script>    

  </body>
</html>