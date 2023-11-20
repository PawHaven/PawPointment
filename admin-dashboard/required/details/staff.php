<main id="main">

    <!-- ======= Staff Section ======= -->
    <section id="staff" class="contact">
      <div class="container">

        <div class="section-title">
          <h2>Staff Information</h2>
        </div>

        <div class="d-flex justify-content-end">
        <div class="form-inline">
          <button id="redirectButton" type="button"><i class="fas fa-plus"></i> Add Staff</button>
        </div>
         <!-- Actions -->
          <form method="GET" class="form-inline">
            <div class="form-group">
              <input type="text" name="search_query" placeholder="Search by staff-id, name, position, contact..." style="width: 70%;">
              <button type="submit"><i class="fas fa-search"></i></button>
            </div>
          </form>
        </div>

        <div class="row" data-aos="fade-in">
          <div class="mt-5 mt-lg-0 d-flex align-items-stretch">
            <div style="width: 100%; height:430px; overflow: auto;">
              <?php include '../tables/staff.php'?>
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

  var destinationURL = 'login-form/add-staff.php';

  // Redirect to the specified URL
  window.location.href = destinationURL;
});
</script>