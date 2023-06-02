<!DOCTYPE html>
<html>
<head>
	<title>Lot Information</title>
	<link rel="stylesheet" href="/assets/css/searchinfo.css">
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
            <li><a href="/profile">
                <img src="/assets/images/user.png" alt="Profile" class="user">
            </a>
            <ul class="dropdown">
                <li><a href="/" onclick="logout()">Logout</a></li>
            </ul>
            </li>
        </ul>
    </div>
</header>
<div class="document-page">
    <div class="container">
        <h1>Land Information Details</h1>
    </div>

    <div class="box">
        <table>
            <tr>
                <th>Lot No. :</th>
                <td><?= isset($lot['lot_no']) ? esc($lot['lot_no']) : '' ?></td>
            </tr>
            <tr>
                <th>Size of Area :</th>
                <td><?= isset($lot['size_of_area']) ? esc($lot['size_of_area']) : '' ?></td>
            </tr>
            <tr>
                <th>Cad No. :</th>
                <td><?= isset($lot['cad_no']) ? esc($lot['cad_no']) : '' ?></td>
            </tr>
            <tr>
                <th>Location :</th>
                <td><?= isset($lot['location']) ? esc($lot['location']) : '' ?></td>
            </tr>
            <tr>
                <th>Phase :</th>
                <td><?= isset($lot['phase']) ? esc($lot['phase']) : '' ?></td>
            </tr>
            <tr>
                <th>Land Owner :</th>
                <td><?= isset($lot['land_owner']) ? esc($lot['land_owner']) : '' ?></td>
            </tr>
            <tr>
                <th>Status :</th>
                <td><?= isset($lot['status']) ? esc($lot['status']) : '' ?></td>
            </tr>
        </table>
    </div>

    <div class="box">
        <div class="divider">
            <h2 class="centered">Distance</h2>
        </div>

        <table>
            <!-- Iterate over property distances -->
            <?php foreach ($propertyDistances as $distance): ?>
            <tr>
                <th>BLLM :</th>
                <td><?= isset($distance['bllm']) ? esc($distance['bllm']) : '' ?></td>
            </tr>
            <tr>
                <th>Distance to Point 1 :</th>
                <td><?= isset($distance['distance_to_point1']) ? esc($distance['distance_to_point1']) : '' ?></td>
            </tr>
            <tr>
                <td colspan="2"><hr></td> <!-- Add a horizontal divider -->
            </tr>
            <?php endforeach; ?>
        </table>
    </div>

    <div class="box">
        <div class="divider">
            <h2 class="centered">Valuation</h2>
        </div>

        <table>
            <?php foreach ($propertyValuations as $valuation): ?>
            <tr>
                <th>Lot Valuation Amount :</th>
                <td><?= isset($valuation['valuation_amount']) ? esc($valuation['valuation_amount']) : '' ?></td>
            </tr>
            <tr>
                <th>Tree Valuation Amount :</th>
                <td><?= isset($valuation['tree_valuation_amount']) ? esc($valuation['tree_valuation_amount']) : '' ?></td>
            </tr>
            <tr>
                <th>Disturbance Amount :</th>
                <td><?= isset($valuation['disturbance_amount']) ? esc($valuation['disturbance_amount']) : '' ?></td>
            </tr>
            <tr>
                <th>House Structure Amount :</th>
                <td><?= isset($valuation['house_structure_amount']) ? esc($valuation['house_structure_amount']) : '' ?></td>
            </tr>
            <tr>
                <td colspan="2"><hr></td> <!-- Add a horizontal divider -->
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>
</body>
</html>
