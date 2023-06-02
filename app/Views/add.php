<html>
    <head>
        <title>
            Add Land Details
        </title>
        <link rel="stylesheet" href="/assets/css/add.css">
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
            
        <div class="wrapper" style="background-color: 0054A5;">
            <h1>Add Land Details</h1>
            <div class="form-container">
                <form action="/land/add" method="post">
                    <input type="text" name="lot_no" placeholder="Lot No. :">
                    <input type="text" name="size_of_area" placeholder="Size of Area :">
                    <input type="text" name="cad_no" placeholder="Cad No. :">
                    <input type="text" name="location" placeholder="Location :">
                    <input type="text" name="phase" placeholder="Phase :">
                    <input type="text" name="land_owner" placeholder="Land Owner :">
                    <input type="text" name="status" placeholder="Status :">

                    <!-- Divider with heading "Distance" -->
                    <div class="divider">
                        <h2>Distance</h2>
                    </div>
                    <input type="text" name="distance[0][bllm]" placeholder="BLLM :">
                    <input type="text" name="distance[0][distance_to_point1]" placeholder="Distance to Point 1 :">
                    <button type="button" onclick="addMoreDistance()">Add more Distance</button>
                    <div id="distanceContainer"></div> <!-- Container for dynamically added distance fields -->
                    
                    <!-- Divider with heading "Valuation" -->
                    <div class="divider">
                        <h2>Valuation</h2>
                    </div>
                    <input type="text" name="valuation[0][valuation_amount]" placeholder="Lot Valuation Amount :">
                    <input type="text" name="valuation[0][tree_valuation_amount]" placeholder="Tree Valuation Amount :">
                    <input type="text" name="valuation[0][disturbance_amount]" placeholder="Disturbance Amount :">
                    <input type="text" name="valuation[0][house_structure_amount]" placeholder="House Structure Amount :">
                    <button type="button" onclick="addMoreValuation()">Add more Valuation</button>
                    <div id="valuationContainer"></div> <!-- Container for dynamically added valuation fields -->

                    <div class="submit-container">
                        <button type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        
        <script>
            var initialDistanceContainer = null;
            var previousDistanceContainer = null;
            var initialValuationContainer = null;
            var previousValuationContainer = null;
            var distanceCount = 1
            var valuationCount = 1

            function addMoreDistance() {
                var container = document.createElement('div');
                container.className = 'added-fields-container';

                var heading = document.createElement('h2');
                heading.textContent = 'Distance';

                var input1 = document.createElement('input');
                input1.type = 'text';
                input1.name = `distance[${distanceCount}][bllm]`;  // Changed to an array name
                input1.placeholder = 'BLLM :';
                input1.className = 'added-field';

                var input2 = document.createElement('input');
                input2.type = 'text';
                input2.name = `distance[${distanceCount}][distance_to_point1]`;  // Changed to an array name
                input2.placeholder = 'Distance to Point 1 :';
                input2.className = 'added-field';

                container.appendChild(heading);
                container.appendChild(input1);
                container.appendChild(input2);

                var distanceContainer = document.getElementById('distanceContainer');
                distanceContainer.appendChild(container);

                var functionButton = document.createElement('button');
                functionButton.type = 'button';
                functionButton.textContent = 'Add more Distance';
                functionButton.onclick = addMoreDistance;
                functionButton.className = 'function-button';

                container.appendChild(functionButton);

                // Remove the function button from the previous container
                if (previousDistanceContainer) {
                    var previousFunctionButton = previousDistanceContainer.querySelector('.function-button');
                    if (previousFunctionButton) {
                        previousFunctionButton.remove();
                    }
                }

                distanceCount++;
                

                // Remove the function button from the initial container
                if (initialDistanceContainer === null) {
                    initialDistanceContainer = container;
                } else {
                    var initialFunctionButton = initialDistanceContainer.querySelector('.function-button');
                    if (initialFunctionButton) {
                        initialFunctionButton.remove();
                    }
                }

                previousDistanceContainer = container;
            }

            function addMoreValuation() {
                var container = document.createElement('div');
                container.className = 'added-fields-container';

                var heading = document.createElement('h2');
                heading.textContent = 'Valuation';

                var input1 = document.createElement('input');
                input1.type = 'text';
                input1.name = `valuation[${valuationCount}][valuation_amount]`;  // Changed to an array name
                input1.placeholder = 'Lot Valuation Amount :';
                input1.className = 'added-field';

                var input2 = document.createElement('input');
                input2.type = 'text';
                input2.name = `valuation[${valuationCount}][tree_valuation_amount]`;  // Changed to an array name
                input2.placeholder = 'Tree Valuation Amount :';
                input2.className = 'added-field';

                var input3 = document.createElement('input');
                input3.type = 'text';
                input3.name = `valuation[${valuationCount}][disturbance_amount]`;  // Changed to an array name
                input3.placeholder = 'Disturbance Amount :';
                input3.className = 'added-field';

                var input4 = document.createElement('input');
                input4.type = 'text';
                input4.name = `valuation[${valuationCount}][house_structure_amount]`;  // Changed to an array name
                input4.placeholder = 'House Structure Amount :';
                input4.className = 'added-field';

                container.appendChild(heading);
                container.appendChild(input1);
                container.appendChild(input2);
                container.appendChild(input3);
                container.appendChild(input4);

                var valuationContainer = document.getElementById('valuationContainer');
                valuationContainer.appendChild(container);

                var functionButton = document.createElement('button');
                functionButton.type = 'button';
                functionButton.textContent = 'Add more Valuation';
                functionButton.onclick = addMoreValuation;
                functionButton.className = 'function-button';

                container.appendChild(functionButton);

                // Remove the function button from the previous container
                if (previousValuationContainer) {
                    var previousFunctionButton = previousValuationContainer.querySelector('.function-button');
                    if (previousFunctionButton) {
                        previousFunctionButton.remove();
                    }
                }

                valuationCount++;

                // Remove the function button from the initial container
                if (initialValuationContainer === null) {
                    initialValuationContainer = container;
                } else {
                    var initialFunctionButton = initialValuationContainer.querySelector('.function-button');
                    if (initialFunctionButton) {
                        initialFunctionButton.remove();
                    }
                }

                previousValuationContainer = container;
            }
        </script>


</body>
