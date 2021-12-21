<!-- Code by Brave Coder | https://youtube.com/BraveCoder -->

<?php

$user_ip = $_SERVER['REMOTE_ADDR'];

if (isset($_POST['search'])) {
  $user_ip = $_POST['ip'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- FontAwesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" />
  <!-- Custom CSS -->
  <link rel="stylesheet" href="css/style.css" />
  <title>IP Lookup</title>
</head>

<body>
  <div class="search">
    <div class="container">
      <div class="row">
        <div class="col-md-5 mx-auto">
          <div class="txt text-center">
            <h1>Search</h1>
            <p>Search any IP address/domain</p>
          </div>
          <form class="form" action="" method="post">
            <input type="text" class="input me-2" name="ip" placeholder="IP Address" value="<?php echo $user_ip; ?>" required />
            <button type="submit" name="search" class="btn">
              Search <i class="far fa-paper-plane ms-1"></i>
            </button>
          </form>
        </div>
      </div>
      <?php

      $data = file_get_contents("http://ip-api.com/json/$user_ip?fields=status,message,country,countryCode,region,regionName,city,zip,lat,lon,timezone,currency,isp,org,as,query");
      $json = json_decode($data, true);

      ?>
      <div class="row mt-5">
        <div class="col-md-6">
          <table class="item table table-bordered h-100 p-4 first">
            <tbody>
              <tr>
                <td>IP Address:</td>
                <td><?php echo $json['query']; ?></td>
              </tr>
              <tr>
                <td>Country:</td>
                <td><?php echo $json['country']; ?></td>
              </tr>
              <tr>
                <td>Country Code:</td>
                <td><?php echo $json['countryCode']; ?></td>
              </tr>
              <tr>
                <td>State/Region:</td>
                <td><?php echo $json['regionName']; ?></td>
              </tr>
              <tr>
                <td>City:</td>
                <td><?php echo $json['city']; ?></td>
              </tr>
              <tr>
                <td>Zip/Postal Code:</td>
                <td><?php echo $json['zip']; ?></td>
              </tr>
              <tr>
                <td>Latitude:</td>
                <td><?php echo $json['lat']; ?></td>
              </tr>
              <tr>
                <td>Longitude:</td>
                <td><?php echo $json['lon']; ?></td>
              </tr>
              <tr>
                <td>Timezone:</td>
                <td><?php echo $json['timezone']; ?></td>
              </tr>
              <tr>
                <td>Currency:</td>
                <td><?php echo $json['currency']; ?></td>
              </tr>
              <tr>
                <td>ISP:</td>
                <td><?php echo $json['isp']; ?></td>
              </tr>
              <tr>
                <td>ORG:</td>
                <td><?php echo $json['org']; ?></td>
              </tr>
              <tr>
                <td>AS:</td>
                <td><?php echo $json['as']; ?></td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="col-md-6">
          <div class="item border second">
            <img src="https://cache.ip-api.com/<?php echo $json['lon']; ?>,<?php echo $json['lat']; ?>,10" class="w-100" alt="" />
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>