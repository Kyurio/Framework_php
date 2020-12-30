<footer>
  <div class="footer">
    <div class="row">
      <div class="col-md-12 py-2">
        <div class="d-flex justify-content-center mt-5">
          <a class="social social-facebook">
            <i class="fab fa-facebook-f mr-md-5 mr-3 fa-1x"> </i>
          </a>
          <a class="social social-twitter">
            <i class="fab fa-twitter mr-md-5 mr-3 fa-1x"> </i>
          </a>
          <a class="social social-google-plus">
            <i class="fab fa-google-plus-g mr-md-5 mr-3 fa-1x"> </i>
          </a>
          <a class="social social-linkedin">
            <i class="fab fa-linkedin-in mr-md-5 mr-3 fa-1x"> </i>
          </a>
          <a class="social social-instagram">
            <i class="fab fa-instagram mr-md-5 mr-3 fa-1x"> </i>
          </a>
          <a class="social social-pinterest">
            <i class="fab fa-pinterest fa-1x"> </i>
          </a>
        </div>
      </div>
    </div>
    <div class="footer-copyright text-center py-3">
      <small>
        2020 -  <br>  <a href="">Desarrollado por Doublecode</a>
      </small>
    </div>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.20.0/axios.min.js" integrity="sha512-quHCp3WbBNkwLfYUMd+KwBAgpVukJu5MncuQaWXgCrfgcxCJAq/fo+oqrRKOj+UKEmyMCG3tb8RB63W+EmrOBg==" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/alertify.min.js" integrity="sha512-JnjG+Wt53GspUQXQhc+c4j8SBERsgJAoHeehagKHlxQN+MtCCmFDghX9/AcbkkNRZptyZU4zC8utK59M5L45Iw==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js" integrity="sha512-Eak/29OTpb36LLo2r47IpVzPBLXnAMPAVypbSZiZ4Qkf8p/7S/XRG5xp7OKWPPYfJT6metI+IORkR5G8F900+g==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous"></script>
<script src='<?php echo RUTA_URL ?>assets/js/functions.js'> type="text/javascript"></script>
<?php

  switch ($option) {

    case 'contacto':

      echo "<script src='". RUTA_URL ."assets/js/concat.js'></script>";
      break;

    default:
      echo "<script src='". RUTA_URL ."assets/js/app.js'></script>";
      break;
  }


 ?>



</body>
