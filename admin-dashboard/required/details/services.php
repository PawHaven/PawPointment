<main id="main">
<style>
  .table-container {
  overflow-x: auto;
}
</style>
    <!-- ======= Staff Section ======= -->
    <section id="staff" class="contact">
      <div class="container">
        <div class="row" data-aos="fade-in">
          <div class="section-title">
            <h2>Services</h2>
          </div>
          
          <div class="d-flex justify-content-end">
           <!-- Actions -->
           <div class="form-inline">
            <form action="backend/automatic_send_sms.php">
              <button type="submit"> <i class="fas fa-clock"></i> Send SMS to Clients</button>
              <button id="redirectButton" type="button"><i class="fas fa-plus"></i> Add Service</button>
            </form>
           </div>
           
           <div class="form-inline">
            <div class="form-group">
              <form method="GET">
                  <input type="text" id="search_query" name="search_query" placeholder="Search by staff-id, name, position, contact..." style="width: 70%;">
                  <button type="submit"><i class="fas fa-search"></i></button>
              </form>
              </div>  
           </div>
          </div>
          <div class="d-flex justify-content-end appointment-grid">
      <!-- Services Start -->
          <div class="container-fluid pt-5" id="service">
              <div class="container">
                <div class="row pb-3">
                  <?php 
                    require 'backend/connection.php';

                    $show_query = "SELECT appointment_id, appointment_service, appointment_status FROM appointment";
                    $result = $conn->query($show_query);

                    $doneCount = 0;
                    $ongoingCount = 0;
                    $vaccineCount = 0;
                    $checkupCount = 0;
                    $groomCount = 0;
                    $surgeryCount = 0;
                    $dewormingCount = 0;

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $service = $row['appointment_service'];
                            $status = $row['appointment_status'];

                            switch ($status) {
                                case 'Done':
                                    $doneCount++;
                                    break;
                                case 'Ongoing':
                                    $ongoingCount++;
                                    break;
                            }

                            switch ($service) {
                                case 'Vaccine':
                                    $vaccineCount++;
                                    break;
                                case 'Checkup':
                                    $checkupCount++;
                                    break;
                                case 'Groom':
                                    $groomCount++;
                                    break;
                                case 'Surgery':
                                    $surgeryCount++;
                                    break;
                                case 'Deworming':
                                    $dewormingCount++;
                                    break;
                            }
                        }
                    }

                    echo '<div class="table-container">
                            <div class="d-flex align-items-center justify-content-center mb-4">
                              <p class="appointment-count done-color"><i class="fas fa-check"></i> Done: ' . $doneCount . '</p>
                              <p class="appointment-count undone-color"><i class="fas fa-spinner"></i> Ongoing: ' . $ongoingCount . '</p>
                              <p class="appointment-count vax-color"><i class="fas fa-syringe"></i> Vaccine: ' . $vaccineCount . '</p>
                              <p class="appointment-count check-color"><i class="fas fa-stethoscope"></i> Checkup: ' . $checkupCount . '</p>
                              <p class="appointment-count groom-color"><i class="fas fa-shower"></i> Groom: ' . $groomCount . '</p>
                              <p class="appointment-count surgery-color"><i class="fas fa-user-md"></i> Surgery: ' . $surgeryCount . '</p>
                              <p class="appointment-count deworming-color"><i class="fas fa-bug"></i> Deworming:' . $dewormingCount . '</p>
                            </div>
                          </div>';

                    $conn->close();
                ?>
                </div>
              </div>
              <div class="container">

                  <div class="row pb-3">
                     <?php

                      // Get the search query from the form.
                      $searchQuery = isset($_GET["search_query"]) ? $_GET["search_query"] : '';

                      // Connect to the MySQL database.
                      $db = new PDO('mysql:host=localhost;dbname=pawheaven', 'root', '');

                      // Create a SQL query to select the services that match the search query.
                      $sql = "SELECT services_id, services_title, services_description, services_image FROM services WHERE services_title LIKE '%$searchQuery%'";

                      // Execute the SQL query and get the results.
                      $stmt = $db->prepare($sql);
                      $stmt->execute();
                      $services = $stmt->fetchAll(PDO::FETCH_ASSOC);

                      // Display the results to the user.
                      foreach ($services as $service) {
                        echo '<div class="col-lg-4 col-md-6 text-center mb-5">';
                        echo '<div class="d-flex align-items-center justify-content-center mb-4">';
                        echo '<img src="../assets/img/' . $service['services_image'] . '" class="service-icon bg-primary text-white mr-3">';
                        echo '<h4 class="font-weight-bold m-0">' . $service['services_title'] . '</h4>';
                        echo '</div>';
                        $shortDescription = implode(' ', array_slice(explode(' ', $service['services_description']), 0, 20));
                        echo '<p>' . $shortDescription . '...</p>';

                        echo '<a class="border-primary text-decoration-none" href="edit-services.php?services_id=' . $service["services_id"] . '"><button style="width:30%; margin-left:3px; border-radius:50px" >Edit</button></a>';
                        echo '<a class="border-primary text-decoration-none" href="backend/crude.php?services_id=' . $service["services_id"] . '&role=delete-services"  onclick="return confirm(\'Are you sure you want to delete this appointment?\')"><button style="width:30%; margin-left:3px; border-radius:50px" >Delete</button></a>';
                        echo '</div>';
                      }

                        if (empty($services)) {
                          echo '<div class="alert alert-info">No services found.</div>';
                        }
                      ?>

                  </div>
              </div>
          </div>
        </div>

      </div>
    </div>
  </section>
      <!-- End Staff Section -->
  </main>
  <!-- End #main -->
  <script>

  var button = document.getElementById('redirectButton');


  button.addEventListener('click', function() {

    var destinationURL = 'add.php';

    // Redirect to the specified URL
    window.location.href = destinationURL;
  });
</script>