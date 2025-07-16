<div id="nav" class="nav-container d-flex">
  <div class="nav-content d-flex">
    <!-- Logo Start -->
    <div class="logo position-relative">
      <a href="index.php">

        <img src="img/logo/logo-red-light.svg" alt="logo" />

        <!-- Logo can be added directly -->
        <!-- <img src="img/logo/logo-white.svg" alt="logo" /> -->

        <!-- Or added via css to provide different ones for different color themes 
            <div class="img"></div>
            
            -->

      </a>
    </div>
    <!-- Logo End -->




    <!-- User Menu Start -->
    <div class="user-container d-flex">
      <a href="#" class="d-flex user position-relative" data-bs-toggle="dropdown" aria-haspopup="true"
        aria-expanded="false">

        <div class="name">| <?php echo $_SESSION['nom']; ?> |</div>
      </a>
      <div class="dropdown-menu dropdown-menu-end user-menu wide">
        <div class="row mb-3 ms-0 me-0">
          <div class="col-12 ps-1 mb-2">
            <div class="text-extra-small text-primary">ACCOUNT</div>
          </div>
          <div class="col-6 ps-1 pe-1">
            <ul class="list-unstyled">
              <li>
                <a href="#">User Info</a>
              </li>
              <li>
                <a href="#">Preferences</a>
              </li>
              <li>
                <a href="#">Calendar</a>
              </li>
            </ul>
          </div>

        </div>

        <div class="row mb-1 ms-0 me-0">
          <div class="col-12 p-1 mb-3 pt-3">
            <div class="separator-light"></div>
          </div>

          <div class="col-6 pe-1 ps-1">
            <ul class="list-unstyled">

              <li>
                <a href="Logout.php">
                  <i data-acorn-icon="logout" class="me-2" data-acorn-size="17"></i>
                  <span class="align-middle">Salir</span>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!-- User Menu End -->

    <!-- Icons Menu Start -->
    <ul class="list-unstyled list-inline text-center menu-icons">

      <li class="list-inline-item">
        <a href="#" id="colorButton">
          <i data-acorn-icon="light-on" class="light" data-acorn-size="18"></i>
          <i data-acorn-icon="light-off" class="dark" data-acorn-size="18"></i>
        </a>
      </li>

    </ul>
    <!-- Icons Menu End -->

    <!-- Menu Start -->
    <div class="menu-container flex-grow-1">
      <ul id="menu" class="menu">
        <li>
          <a href="index.php" data-href="index.php">
            <i data-acorn-icon="antenna" class="icon" data-acorn-size="18"></i>
            <span class="label">Consola</span>
          </a>

        </li>


        <li>
          <a href="#crm" data-href="#">
            <i data-acorn-icon="home-garage" class="icon" data-acorn-size="18"></i>
            <span class="label">CRM</span>
          </a>
          <ul id="crm">

            <li>
              <a href="Customers.php">
                <span class="label">Clientes</span>
              </a>
            </li>

            <li>
              <a href="Payments.php">
                <span class="label">Pagos</span>
              </a>
            </li>

            <li>
              <a href="Invoices.php">
                <span class="label">Facturas</span>
              </a>
            </li>

            <li>
              <a href="Calendar.php">
                <span class="label">Calendario</span>
              </a>
            </li>

            <li>
              <a href="Tickets.php">
                <span class="label">Tickets</span>
              </a>
            </li>

          </ul>

        </li>



        <!-- Start Network Menu -->
        <li>
          <a href="#network" data-href="#">
            <i data-acorn-icon="router" class="icon" data-acorn-size="18"></i>
            <span class="label">Network</span>
          </a>
          <ul id="network">
            <!-- Start Sites Menu -->
            <li>
              <a href="#sites" data-href="#">
                <span class="label">Sitios</span>
              </a>

              <ul id="sites">
                <li>
                  <a href="Sites.php">
                    <span class="label">Sitios</span>
                  </a>
                </li>

                <li>
                  <a href="Devices.php">
                    <span class="label">Equipos</span>
                  </a>
                </li>
              </ul>

            </li>
            <!-- End Sites Menu -->


            <li>
              <a href="Closures.php">
                <span class="label">Cierres y NAPs</span>
              </a>
            </li>



          </ul>

        </li>
        <!-- End Network Menu -->

        <!-- Start Wireless Menu -->
        <li>
          <a href="#wireless" data-href="#">
          <i data-acorn-icon="wifi" class="icon" data-acorn-size="18"></i>
            <span class="label">Wireless</span>
          </a>
          <ul id="wireless">
            <li>
              <a href="Stations.php">
                <span class="label">Stations</span>
              </a>
            </li>

            <li>
              <a href="AddressLists.php">
                <span class="label">Address Lists</span>
              </a>
            </li>


          </ul>
        </li>
        <!-- End Wireless Menu -->

        <!-- Start FTTH Menu -->
        <li>
          <a href="#ftth" data-href="#">
          <i data-acorn-icon="category" class="icon" data-acorn-size="18"></i>
            <span class="label">Fibra Optica</span>
          </a>
          <ul id="ftth">

            <li>
              <a href="#pppoe" data-href="#">
                <span class="label">PPPoE</span>
              </a>

              <ul id="pppoe">
                <li>
                  <a href="PPPoESecrets.php">
                    <span class="label">Secrets</span>
                  </a>
                </li>

                <li>
                  <a href="PPPoEActive.php">
                    <span class="label">Active Connections</span>
                  </a>
                </li>

              </ul>
            </li>

            <li>

              <a href="#onts" data-href="#">
                <span class="label">ONTs</span>
              </a>

              <ul id="onts">

                <li>
                  <a href="ONTs.php">
                    <span class="label">Configuradas</span>
                  </a>
                </li>

                <li>
                  <a href="ONTAutofind.php">
                    <span class="label">NO Autorizadas </span>
                  </a>
                </li>

              </ul>
            </li>



          </ul>
        </li>
        <!-- End FTTH Menu -->


        <li>
          <a href="#inc" data-href="#">
            <i data-acorn-icon="building" class="icon" data-acorn-size="18"></i>
            <span class="label">Company</span>
          </a>
          <ul id="inc">

            <li>
              <a href="Users.php">
                <span class="label">Equipo de Trabajo</span>
              </a>
            </li>

            <li>
              <a href="#stock" data-href="#">
                <span class="label">Inventario</span>
              </a>
              <ul id="stock">
                <li>
                  <a href="Stock.php">
                    <span class="label">Listado </span>
                  </a>
                </li>
                <li>
                  <a href="EntryStock.php">
                    <span class="label">Entrada </span>
                  </a>
                </li>

                <li>
                  <a href="TransferStock.php">
                    <span class="label">Transferencia </span>
                  </a>
                </li>

              </ul>
            </li>



          </ul>

        </li>










      </ul>
    </div>
    <!-- Menu End -->

    <!-- Mobile Buttons Start -->
    <div class="mobile-buttons-container">
      <!-- Scrollspy Mobile Button Start -->
      <a href="#" id="scrollSpyButton" class="spy-button" data-bs-toggle="dropdown">
        <i data-acorn-icon="menu-dropdown"></i>
      </a>
      <!-- Scrollspy Mobile Button End -->

      <!-- Scrollspy Mobile Dropdown Start -->
      <div class="dropdown-menu dropdown-menu-end" id="scrollSpyDropdown"></div>
      <!-- Scrollspy Mobile Dropdown End -->

      <!-- Menu Button Start -->
      <a href="#" id="mobileMenuButton" class="menu-button">
        <i data-acorn-icon="menu"></i>
      </a>
      <!-- Menu Button End -->
    </div>
    <!-- Mobile Buttons End -->
  </div>
  <div class="nav-shadow"></div>
</div>