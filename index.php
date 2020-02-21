<?php
// require_once "index.html";
require_once "function_DB.php";

$conn = connect();
$data = selectMain($conn);
$countPage = paginCount($conn);
close($conn);


// ссылка на каталог картинок:
$urlImg = 'https://enko.com.ua/upload/shop_1/2/4/1/item_241821/shop_items_catalog'
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
      integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
      <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
      <!-- <link rel="stylesheet" href="https://resources/demos/style.css"> -->
    
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  
    <script
    src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"
  ></script>
  <script
    src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"
  ></script>
      
    <link rel="stylesheet" href="styleMy.css">
    
  
    <title>Hello, world!</title>
  </head>
  <body>
  
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
      <a href="#" class="navbar-brand">
        <img
          src="https://enko.com.ua/images/logo.png"
          width="90px"
          height="60px"
          alt="logo"
        />
      </a>
      <botton
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggel navigetion"
      >
        <span class="navbar-toggler-icon"></span>
      </botton>
      <div class="collapse navbar-collapse #navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active"><a href="#">Categoria</a></li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <input
            type="text"
            class="form-control mr-sm-2"
            placeholder="Search"
            aria-label="Search"
          />
          <button class="btn btn-outline-success my-2 my-sm-0">Search</button>
        </form>
      </div>
    </nav>


    <div class="conteiner-fluid">
      <div class="conteiner">
        <div class="row text-center">
          <div class="col-md-4">Фильтр товара</div>
          <div class="col-md-8">Товары в наличии:</div>
          
          <div class="col-md-4">
            <div class="conteiner-fluide">
              <form role="form">
              <div class="col-12">
                <p>
                  <label for="amount">Ценовой диапазон(UAH):</label>
                  <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
                </p>
                 
                <div id="slider-range"></div>

               </div>
               
          <label class="col-md-10 control-label" for="select-id"><b>Производители:</b>
                    <select class="form-control col-md-12" name="producer_id" id="select-id">
                      <option value="0">…</option>
                      <option value="96">Acer</option>
                      <option value="4319">Alienware</option>
                      <option value="216">Apple</option>
                      <option value="5859">ASUS</option>
                      <option value="843">DELL</option>
                      <option value="7701">Dream Machines</option>
                      <option value="1323">Fujitsu</option>
                      <option value="5860">GigaByte</option>
                      <option value="1497">HP</option>
                      <option value="1585">Huawei</option>
                      <option value="1972">Lenovo</option>
                      <option value="5861">MSI</option>
                      <option value="2556">Panasonic</option>
                      <option value="6097">Toshiba</option>
                      <option value="6913">Vinga</option>
                      <option value="6133">Xiaomi</option>
                    </select>&nbsp;
                  </label>

            
              </form>
            </div>
            </div>

  <div class="col-md-8">
  <div class="conteiner-fluide">

<?php foreach ($data as $value): ?>


  <div class="card mb-12" style="max-width: 720px;">
  <div class="row no-gutters">
  <div class="col-md-4">

    <img src="<?php echo $value['image'];?>" alt="img" class="card-img"/>
    </div>
    <div class="col-md-8">
      <div class="card-body">
            <b><h5 class="card-title"><p><?php echo $value['name_product'];?></p></h5></b>

                <p class="card-text" id="block"><?php echo $value['schort_description'];?></p>
          
              <p class="card-text"><b><small class="text-muted"><?php echo $value['price'].' UAH';?></small></b></p>
              </div>
    </div>
  </div>

           
          
<?php endforeach;?>
<div class="div_conteiner-pagin">
<?php for ($i=1; $i <=$countPage; $i++):?>

<span class="span_pagin"><a class="a_pagin_Class" href="<?php echo'?page='.($i);?>"><?php echo ($i);?></a></span>


<?php endfor;?>
</div>

           </div>
            
          </div>
        </div>
      </div>
    </div>
    </div>
    </div>
</div>
   

   
   
<!-- jQuery UI Slider - Range slider -->
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
    $( function() {
      $( "#slider-range" ).slider({
        range: true,
        min: 1000,
        max: 40000,
        values: [ 5000, 30000 ],
        slide: function( event, ui ) {
          $( "#amount" ).val( "" + ui.values[ 0 ] + "- " + ui.values[ 1 ] );
        }
      });
      $( "#amount" ).val( "" + $( "#slider-range" ).slider( "values", 0 ) +
        "-" + $( "#slider-range" ).slider( "values", 1 ) );
    } );
    </script>
      <!-- <script
      src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
      integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
      crossorigin="anonymous"
    ></script>
    <script src="jquery-3.4.1.min.js"></script> -->
 <script src="main.js"></script>

  </body>
</html>
