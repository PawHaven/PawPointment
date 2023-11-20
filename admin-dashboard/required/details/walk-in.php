<main id="main">

    <!-- ======= Animal Status Section ======= -->
    <section id="pet-status" class="contact">
      <div class="container">

        <div class="section-title">
          <h2>Walk-In Registration</h2>
        </div>

        <div class="d-flex justify-content-end">
          <div class="form-inline">
            <button id="redirectButton" type="button"><i class="fas fa-plus"></i> Add Schedule</button>
          </div>

          <form method="GET" class="form-inline">
            <div class="form-group">
              <input type="text" name="search_query" placeholder="Search by animal name, dates, service..." style="width: 70%;">
              <button type="submit" ><i class="fas fa-search"></i></button>
            </div>
          </form>
        </div>

        <div class="row" data-aos="fade-in">
          <div class="mt-5 mt-lg-0 d-flex align-items-stretch">
          <div style="width: 100%; max-height: 430px; overflow-x: auto; overflow-y: auto;">
              <?php include '../tables/walk-in.php'?>
          </div>

          </div>
        </div>

        <div class="d-flex justify-content-end">
          <!-- Actions -->
          <form method="post" action="backend/export.php">
            <h6>Convert Into:

            <button type="submit" name="Status-PDF-for-walkin" value="Status-PDF-for-walkin">PDF</button>
            or
            <button type="submit" name="status-walkin" value="Status">EXCEL</button>?
            </h6>
          </form>
        </div>

      </div>
    </section>
    <!-- End Animal Status Section -->
  </main>
  <!-- End #main -->
  <script>

var button = document.getElementById('redirectButton');


button.addEventListener('click', function() {

  var destinationURL = 'login-form/add-appointment.php';

  // Redirect to the specified URL
  window.location.href = destinationURL;
});
</script>