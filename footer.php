<footer id="footer" class="footer">

<div class="row">
  <h3 class="text-center text-info">Some useful information and rules</h3>
     <!-- Card with header and footer -->
     <div class="col-md-6 col-sm-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Do not Drive without these Documents</h5>
                1.Valid driving license<br>
                2.Vehicle registration certificate<br>
                3.Valid vehicle's insurance certificate<br>
                4.Permit and vehicle's certificate of fitness (applicable only to transport vehicles)
                <br>
                5.Valid Pollution Under Control Certificate On demand by a police officer in uniform or an officer of the Transport Department, produce these documents for inspection

          </div><!-- End Card with header and footer -->
</div>
</div>
 <div class="col-md-6 col-sm-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Required documents to register vehicle</h5>
                1.Duty and VAT paid receipts<br>
                2.Import Entry Form<br>
                3.Foreign Registration Book<br>
                4.Bill of Landing<br>
                5.Valid Insurance Certificate<br>
                6.Keble ID Card<br>
                7.Revenue Authority PIN Card<br>
                8.Import Declaration Form
          </div><!-- End Card with header and footer -->
</div>
</div>
<div class="col-md-6 col-sm-12">
          <div class="card">
            <div class="card-body">
          <h5 class="card-title">Things to know when applying to register vehicle</h5>
            1.Applicant must provide all necessary information in the application form.<br>
            2.Documents that are needed for this procedure are mentioned under “Required Documents” section of this page.<br>
            3.Applicant should carry photocopies and originals of all the documents while applying for this procedure.<br>
            4.Applicant should attach photocopies of documents (whichever is necessary) along with the application form while submitting the application form.<br>
            5.Fee for this procedure has to be paid as per authority’s request.<br>
            6.If all above-mentioned procedures were followed properly, the registration will be issued within 3-7 days.<br>
            7.Applicant can collect their registration book by visiting the office.
          </div><!-- End Card with header and footer -->
</div>
</div>
<div class="col-md-6 col-sm-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Hand Signals</h5>
are necessary at certain times. When slowing down, extend your right arm palm down and swing it up and down; when stopping, raise your forearm vertically outside the vehicle; when turning right or changing lane to the right hand side, extend your right arm straight out, palm to the front; when turning left or changing lane to the left hand side, extend your right arm and rotate it in an anti-clockwise direction. To allow the vehicle behind you to overtake, swing your right arm backward and forward in a semi circular motion. Hand Signal Left Direction Indicators Better use directions indicators instead of hands singlals and both in case of any emergancy.
          </div><!-- End Card with header and footer -->
</div>
</div>
</div>

    <div class="copyright">
      &copy; Copyright <strong><span>Sodo City RTA</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
Designed by <a href="mailto:chereyaya16@gmail.com" target="_blank">G8</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center bg-dark justify-content-center" data-bs-toggle="tooltip" data-bs-placement="left" title="back to top"><i class="bx bxs-chevron-up-circle"></i></a>
<div class="card">
            
 
  <!-- Modal mission Scrollable -->
              <div class="modal fade" id="mission" tabindex="-1">
                <div class="modal-dialog modal-dialog-scrollable">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Mission</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                     <div class="mb-3 mt-3">
          <?php
          include('dbcon.php');

    $status="On";
    $query = "SELECT * FROM mission where status='$status'";
    $result = mysqli_query($conn,$query)or die(mysqli_error());
    $row=mysqli_fetch_array($result);
    $mission=$row['en_mission'];
    $vission=$row['en_vission'];
    
        ?>
                <p><?php echo $mission;?></p>
         </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
<!-- End Modal mission Scrollable-->

 <!-- Modal vision Scrollable -->
              <div class="modal fade" id="vision" tabindex="-1">
                <div class="modal-dialog modal-dialog-scrollable">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">vision</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <div class="mb-3 mt-3">
          <p><?php echo $vission;?></p>
         </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
<!-- End Modal vision Scrollable-->



<!-- Modal history Scrollable -->
              <div class="modal fade" id="history" tabindex="-1">
                <div class="modal-dialog modal-dialog-scrollable">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">history</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
         <div class="mb-3 mt-3">
         <p>The Ethiopian road transport authority (R.T.A) is a public transport authority based in addis ababa, Ethiopia with regional branches like SNNPR road transport authority. It was originally founded as the road transport administration in 1967 by proclamation No 256/67 but restructured and became the road transport authority (RTA) in 1976, following proclamation No 107/76. The RTA states that its mission is “To ensure the provision of a modern, integrated and safe road transport services to meet the needs of all the communities for strong and unitary economic and political system in Ethiopia”. In doing so they attempt to promote an efficient road service, to coordinate and strengthen the road traffic safety and to develop the transport data base system to enhance research for the development of the sector.
        In 2005, the Ethiopian government reorganized the transport sector and although the previously independent urban transport authority, the railway regulatory authority, the aviation authority, the airport administration authority and the maritime regulatory authority merged into the Ethiopian transport authority, the road transport authority remained independent.
        The wolaita sodo city road transport is branch of RTA which is responsible to SNNPR road transport office.  
</p>
         </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
<!-- End Modal history Scrollable-->
   <!--Modal capture image-->
    <div class="modal fade" id="photoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Capture Photo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div>
                        <div id="my_camera" class="d-block mx-auto rounded overflow-hidden"></div>
                    </div>
                    <div id="results" class="d-none"></div>
                    <form method="post" id="photoForm">
                        <input type="hidden" id="photoStore" name="photoStore" value="">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning mx-auto text-white" id="takephoto">Capture Photo</button>
                    <button type="button" class="btn btn-warning mx-auto text-white d-none" id="retakephoto">Retake</button>
                    <button type="submit" class="btn btn-warning mx-auto text-white d-none" id="uploadphoto" form="photoForm">Save</button>

                </div>
            </div>
        </div>
    </div>
          </div>
    <script src="assets/plugin/jquery.min.js"></script>
    <script src="assets/plugin/popper.min.js"></script>
    <script src="assets/plugin/bootstrap.min.js"></script>

    <script src="assets/plugin/sweetalert/sweetalert.min.js"></script>
    <script src="assets/plugin/webcamjs/webcam.min.js"></script>
    <script src="assets/plugin/main.js"></script>