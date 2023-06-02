<html>
    <head>
        <title>
            Reports
        </title>
    <link rel="stylesheet" href="/assets/css/reports.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    </head>
    <body>
        <Header>
            <div class="navbar">
            <img src="/assets/images/icon2.png" class="logo">
                <ul>
                    <li><a href="/adminhome">Home</a></li>
                    <li><a href="/adminabout">About</a></li>
                    <li><a href="/adminmap">Virtual Map</a></li>
                    <li><a href="/adminsearch">Search Land</a></li>
                    <li><a href="/documents">Land Documents</a></li>
                    <li><a href="/reports">Reports</a></li>
                    <li><a href="/profile">
                        <img src="/assets/images/user.png" alt="Profile" class="user">
                    </a>
                    <ul class="dropdown">
                        <li><a href="/" onclick="logout()">Logout</a></li>
                    </ul>
                    </li>
                </ul>
            </div>
        </Header>

        <div class="document-page">
            <h1>Generated Reports</h1>

        <main>
            <div class="report-container">
                <div class="report-box">
                    <h3>Total Area size of Lots without Papers:</h3>
                    <a href="/total-area-size">
                    <p id="total-area"><?php echo $totalArea; ?> m2</p>
                    </a>
                </div>
                <div class="report-box">
                    <h3>Total number of Lots:</h3>
                    <a href="/total-lots">
                    <p id="total-lots"><?php echo $totalLot; ?></p>
                    </a>
                </div>
                <div class="report-box">
                    <h3>Number of Document/Paper:</h3>
                    <a href="/land-with-paper">
                    <p id="total-reports"><?php echo $totalDocs; ?></p>
                    </a>
                </div>
                <div class="report-box">
                    <h3>Number of Lots without Paper:</h3>
                    <a href="/lots-without-paper">
                    <p id="total-no-paper"><?php echo $totalLotNoDoc; ?></p>
                    </a>
                </div>
            </div>
	    </main>
    </body>
</html>
    