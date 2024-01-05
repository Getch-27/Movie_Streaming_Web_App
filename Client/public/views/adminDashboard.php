<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <title>Admin Dashboard</title>
  <style>
  /* Entire CSS code for the admin dashboard with dark theme and analytics */

  body {
  font-family: 'Arial', sans-serif;
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  background-color: #1f1f1f;
  color: #fff;
}

header {
  background-color: #333;
  color: #fff;
  padding: 1em;
  text-align: center;
}

h1 {
  margin: 0;
}

.dashboard {
  width: 100%;
  min-height: 100vh;
  background-color: #333;
  padding: 20px;
  box-sizing: border-box;
}

.section {
  margin-bottom: 15px;
}

.section h2 {
  margin-bottom: 16px;
}

.dashboard-item {
  border: 1px solid #555;
  padding: 10px;
  margin-bottom: 10px;
  border-radius: 4px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  transition: background-color 0.3s ease;
}

.dashboard-item:hover {
  background-color: #2c2c2c;
}

.dashboard-item div {
  flex: 1;
}

.dashboard-item .actions {
  display: flex;
  justify-content: flex-end;
  align-items: center;
}

.dashboard-item button {
  padding: 8px;
  cursor: pointer;
  border: none;
  border-radius: 4px;
  margin-left: 8px;
  transition: background-color 0.3s ease;
}

.dashboard-item button:hover {
  background-color: #4caf50;
}

.analytics {
  background-color: #333;
  padding: 1px;
  border-radius: 8px;
  border-color:darkgrey;
;
  border:groove;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.analytics h3 {
  margin-bottom: 6px;
}

.analytics-item {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 1px;
  border-bottom: 1px solid #555;
  transition: background-color 0.3s ease;
}

/* .analytics-item:last-child {
  border-bottom: none;
} */

.analytics-item:hover {
  background-color: #2c2c2c;
}

.analytics-item h2 {
  margin-right: 10px;
}

.analytics-chart {
  width: 100%;
  margin-top: 10px;
  display: flex;
  flex-wrap: wrap;
  gap: 7px;
}

.analytics-chart {
      width: 100%;
      margin-top: 10px;
      display: flex;
      flex-wrap: wrap;
      gap: 10px;
    }

    .bar {
      flex: 1;
      height: 100px;
      background-color: #4caf50;
    }

    .pie-chart {
      width: 100px;
      height: 100px;
      border-radius: 50%;
      background-color: #333;
      position: relative;
    }

    .slice {
      width: 50%;
      height: 100%;
      clip-path: polygon(50% 50%, 100% 0, 100% 100%);
      background-color: #4caf50;
      position: absolute;
      transform-origin: 100% 50%;
    }

/* Additional styles for dark theme */

h2,
h3,
strong {
  color: #fff;
}


   
  </style>
</head>
<body>

  <?php

  $dashboardContent = array(
      'Content Creators' => array(
          array('name' => 'Content Creator 1', 'email' => 'creator1@example.com'),
          array('name' => 'Content Creator 2', 'email' => 'creator2@example.com'),
          array('name' => 'Content Creator 3', 'email' => 'creator3@example.com'),
      ),
      'Users' => array(
          array('name' => 'User 1', 'email' => 'user1@example.com'),
          array('name' => 'User 2', 'email' => 'user2@example.com'),
          array('name' => 'User 3', 'email' => 'user3@example.com'),
          array('name' => 'User 4', 'email' => 'user4@example.com'),
          array('name' => 'User 5', 'email' => 'user5@example.com'),
      ),
    
  );
  $additionalAnalytics = array(
        'Total Content Creators' => 15,
        'Total Users' => 500,
        'Most Viewed Content' => 'Movie XYZ',
        'Average Session Duration' => '15 minutes',
        // 'ConversionRate' => '3%',
        
    
);
$setting=array(
  'Theme Options' => array('light', 'dark'),
  'Language Options' => array('english', 'spanish'),
);
  ?>
  
  <header>
      <h1>Admin Dashboard</h1>
  </header>
  
  <div class="dashboard">
  
      <?php foreach ($dashboardContent as $sectionTitle => $sectionItems) : ?>
          <div class="section">
              <h2><?php echo $sectionTitle; ?></h2>
              <?php foreach ($sectionItems as $item) : ?>
                  <div class="dashboard-item">
                      <div>
                          <strong>Name:</strong> <?php echo $item['name']; ?>
                          <br>
                          <strong>Email:</strong> <?php echo $item['email']; ?>
                      </div>
                      <div class="actions">
                          <button>Edit</button>
                          <button>Delete</button>
                      </div>
                  </div>
              <?php endforeach; ?>
          </div>
      <?php endforeach; ?>
  
      <!-- Add canvas elements for the charts -->
      <div class="analytics-chart">
          <canvas id="barChart"></canvas>
      </div>
  
      <div class="analytics-chart">
          <canvas id="pieChart"></canvas>
      </div>
  
       <!-- Additional Analytics -->
       <div class="analytics">
        <!-- <fieldset> -->
        <!-- <h2>Additional Analytics<h2>   -->
        <?php foreach ($additionalAnalytics as $label => $value) : ?>
            <div class="analytics-chart">         
                <div class="analytics-item">
                    <strong><?php echo $label; ?>:</strong> <?php echo $value; ?>
                </div>
            </div>
        <?php endforeach; ?>
    
    </div>
    <!-- </fieldset> -->
   
        <div class="section">
            <h2>Settings</h2>
            <?php foreach ($setting as $settingTitle => $options) : ?>
                <div class="settings-item">
                    <label><?php echo $settingTitle; ?>:</label>
                    <select>
                        <?php if (is_array($options)) : ?>
                            <?php foreach ($options as $option) : ?>
                                <option value="<?php echo $option; ?>"><?php echo ucfirst($option); ?></option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                </div>
            <?php endforeach; ?>
        </div>
 
  </div>
  
    <script>
        // JavaScript code for dynamic charts
    
        // Bar Chart Data
        var barChartData = {
          labels: ["Label 1", "Label 2", "Label 3", "Label 4", "Label 5"],
          datasets: [{
            label: "Bar Chart",
            backgroundColor: "#4caf50",
            data: [80, 60, 90, 70, 50],
          }]
        };
    
        // Pie Chart Data
        var pieChartData = {
          labels: ["Label A", "Label B"],
          datasets: [{
            data: [45, 55],
            backgroundColor: ["#4caf50", "#333"],
          }]
        };
    
        // Get canvas elements
        var barChartCanvas = document.getElementById("barChart");
        var pieChartCanvas = document.getElementById("pieChart");
    
        // Create Bar Chart
        var barChart = new Chart(barChartCanvas, {
          type: 'bar',
          data: barChartData,
          options: {
            responsive: true,
            maintainAspectRatio: false,
          }
        });
    
        // Create Pie Chart
        var pieChart = new Chart(pieChartCanvas, {
          type: 'pie',
          data: pieChartData,
          options: {
            responsive: true,
            maintainAspectRatio: false,
          }
        });
      </script>
  
</body>
</html>
