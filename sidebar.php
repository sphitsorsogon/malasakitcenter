<?php $id = $_GET['id'];  ?>
<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="sidebar-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" href="home.php?id=<?php echo $_GET['id'] ?>">
              <span data-feather="home"></span>
              Dashboard <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="addBudget.php?id=<?php echo $_GET['id'] ?>">
              <span data-feather="shopping-bag"></span>
              Add Budget
            </a>
          </li>
          <li class="nav-item">
                <?php 
                    $sql = "SELECT * FROM tbl_client WHERE patient_status ='Discharged'";
                    $result = mysqli_query($conn, $sql);
                    $total_discharged = mysqli_num_rows($result) ;
                        
                ?>
            <?php
              if($total_discharged >= 1){
                echo '
                <a class="nav-link" href="./exportexcel.php?id='.$id.'">
                  <span data-feather="bar-chart-2"></span>
                  Export to Excel
                </a>
                ';
              } else {
                echo '
                <a class="nav-link disabled" href="./exportexcel.php?id='.$id.'">
                  <span data-feather="bar-chart-2"></span>
                  Export to Excel
                </a>
                ';
              }
            ?>
            

          </li>
          <li class="nav-item">
            <a class="nav-link" href="excelfile.php?id=<?php echo $_GET['id'] ?>">
              <span data-feather="bar-chart-2"></span>
              List of Exported Data
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./exportsql.php?id=<?php echo $id ?>">
              <span data-feather="database"></span>
              Backup Data
            </a>
          </li>

        </ul>

      </div>
    </nav>