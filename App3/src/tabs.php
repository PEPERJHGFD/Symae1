
<!-- Responsive Tabs Start -->
                            <section class="scroll-section" id="responsiveTabs">
                                <h2 class="small-title">Responsive Tabs</h2>
                                <div class="card mb-3">
                                    <div class="card-header border-0 pb-0">
                                        <ul class="nav nav-tabs nav-tabs-line card-header-tabs responsive-tabs" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#first" role="tab" type="button" aria-selected="true">
                                                                            Vista General
                                                                          </button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#second" role="tab" type="button" aria-selected="false">Red</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#third" role="tab" type="button" aria-selected="false">OSPF</button>
                                            </li>
                                            
                                            
                                            
                                            <!-- An empty list to put overflowed links -->
                                            <li class="nav-item dropdown ms-auto pe-0 d-none responsive-tab-dropdown">
                                                <button class="btn btn-icon btn-icon-only btn-foreground mt-2" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i data-acorn-icon="more-horizontal"></i>
                                                </button>
                                                <ul class="dropdown-menu mt-2 dropdown-menu-end"></ul>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="card-body">
                                        <div class="tab-content">
                                            <div class="tab-pane fade active show" id="first" role="tabpanel">
                                                <h5 class="card-title">Gen</h5>
                                                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                            </div>
                                            <div class="tab-pane fade" id="second" role="tabpanel">
                                                <h5 class="card-title">Red</h5>
                                                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                            </div>
                                            <div class="tab-pane fade" id="third" role="tabpanel">
                                                <h5 class="card-title">ospf</h5>
                                                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                            </div>
                                            
                                            
                                            
                                        </div>
                                    </div>
                                </div>
                        
                                
                            </section>
                            <!-- Responsive Tabs with Line Title End -->





                            <!-- Personal Start -->
                <section class="scroll-section" id="sites">
                  <h2 class="small-title">Agregar / Editar</h2>
                  <form class="tooltip-end-top" id="sitesForm" >
                    <div class="card mb-5">
                      <div class="card-body">
                      <input  name="idDevice" id="idDevice" type="hidden" value=""/>
                        <div class="row g-3">
                          <div class="col-md-6">
                            <label class="mb-3 top-label">
                              <input class="form-control" name="nameDevice" id="nameDevice"/>
                              <span>NOMBRE DEL DISPOSITIVO</span>
                            </label>
                          </div>
                          <div class="col-md-4">
                            <div class="mb-3 top-label">
                              <select class="form-control" name="typeSite" id="typeSite">
                                <option label="&nbsp;"></option>
                                <option value="Ubiquiti">Ubiquiti</option>
                                <option value="Mikrotik">Mikrotik</option>
                                <option value="Cisco">Cisco</option>
                              </select>
                              <span>MARCA</span>
                            </div>
                          </div>

                        </div>
                        <div class="row g-3">
                          <div class="col-md-5">
                            <label class="mb-3 top-label">
                              <input class="form-control" name="locaSite" id="locaSite"/>
                              <span>LOCALIDAD</span>
                            </label>
                          </div>
                          <div class="col-md-5">
                            <label class="mb-3 top-label">
                              <input class="form-control" name="mpioSite" id="mpioSite"/>
                              <span>MUNICIPIO</span>
                            </label>
                          </div>
                        </div>

                        <div class="row g-3">
                          
                          <div class="col-md-6">
                            <div class="mb-3 top-label">
                              <select class="form-control" name="edoSite" id="edoSite">
                                <option label="&nbsp;"></option>
                                <option value="Hidalgo">Hidalgo</option>
                                <option value="Puebla" >Puebla</option>
                              </select>
                              <span>ESTADO</span>
                            </div>
                          </div>
                        </div>
                        <div class="row g-3">
                          
                        <div class="col-md-4">
                            <label class="mb-3 top-label">
                              <input class="form-control" name="latSite" id="latSite"/>
                              <span>LATITUD</span>
                            </label>
                          </div>
                          <div class="col-md-4">
                            <label class="mb-3 top-label">
                              <input class="form-control" name="lonSite" id="lonSite"/>
                              <span>LONGITUD</span>
                            </label>
                          </div>
                        </div>
                      </div>
                      
                    </div>
                  </form>
                </section>
                <!-- Personal End -->





                                  <!-- Responsive Tabs Start -->
                                  <section class="scroll-section" id="responsiveTabs">
                                
                                <div class="card mb-3">
                                    <div class="card-header border-0 pb-0">
                                        <ul class="nav nav-tabs nav-tabs-line card-header-tabs responsive-tabs" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#first" role="tab" type="button" aria-selected="true">
                                                                            Vista General
                                                                          </button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#second" role="tab" type="button" aria-selected="false">Red</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#third" role="tab" type="button" aria-selected="false">OSPF</button>
                                            </li>
                                            
                                            
                                            
                                            <!-- An empty list to put overflowed links -->
                                            <li class="nav-item dropdown ms-auto pe-0 d-none responsive-tab-dropdown">
                                                <button class="btn btn-icon btn-icon-only btn-foreground mt-2" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i data-acorn-icon="more-horizontal"></i>
                                                </button>
                                                <ul class="dropdown-menu mt-2 dropdown-menu-end"></ul>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="card-body">
                                        <div class="tab-content">
                                            <div class="tab-pane fade active show" id="first" role="tabpanel">
                                                
                                                <form class="tooltip-end-top" id="devicesForm" >
                    <div class="card mb-5">
                      <div class="card-body">
                      <input  name="idDevice" id="idDevice" type="hidden" value=""/>
                        <div class="row g-3">
                          <div class="col-md-10">
                            <label class="mb-3 top-label">
                              <input class="form-control" name="nameDev" id="nameDev"/>
                              <span>NOMBRE DEL DISPOSITIVO</span>
                            </label>
                          </div>
                          

                        </div>
                        <div class="row g-3">

                        <div class="col-md-5">
                            <div class="mb-3 top-label">
                              <select class="form-control" name="marcaDev" id="marcaDev">
                                <option label="&nbsp;"></option>
                                <option value="Ubiquiti">Ubiquiti</option>
                                <option value="Mikrotik">Mikrotik</option>
                                <option value="Cisco">Cisco</option>
                              </select>
                              <span>MARCA</span>
                            </div>
                          </div>

                          <div class="col-md-5">
                            <label class="mb-3 top-label">
                              <input class="form-control" name="locaSite" id="locaSite"/>
                              <span>MODELO</span>
                            </label>
                          </div>
                          

                        <div class="row g-3">
                          
                          <div class="col-md-4">
                            <div class="mb-3 top-label">
                              <select class="form-control" name="typeDev" id="typeDev">
                                <option label="&nbsp;"></option>
                                <option value="Router">Router</option>
                                <option value="Switch" >Switch</option>
                                <option value="OLT" >OLT</option>
                                <option value="Radio_PTMP" >Radio_PTMP</option>
                                <option value="Radio_PTP" >Radio_PTP</option>
                              </select>
                              <span>TIPO</span>
                            </div>
                          </div>


                          <div class="col-md-4">
                            <div class="mb-3 top-label">
                              <select class="form-control" name="siteDev" id="siteDev">
                                <option label="&nbsp;"></option>
                                <option value="Acatlan 1">Acatlan 1</option>
                                
                              </select>
                              <span>SITIO</span>
                            </div>
                          </div>


                          <div class="col-md-2">
                          
                                        <div class="top-label custom-control-container">
                                            <div class="form-check form-switch">
                                                <input type="checkbox" class="form-check-input" id="customSwitchTopLabel" checked/>
                                            </div>
                                            <span>ACTIVO</span>
                                        </div>

                          </div>

                          

                          

                        </div>

                        <div class="row g-3">
                          
                        <div class="col-md-4">
                            <label class="mb-3 top-label">
                              <input class="form-control" name="latSite" id="latSite"/>
                              <span>NOTAS</span>
                            </label>
                          </div>

                          
                        </div>
                      </div>
                      
                    </div>
                  </form>

                                                
                                            </div>
                                            <div class="tab-pane fade" id="second" role="tabpanel">
                                                <h5 class="card-title">Red</h5>
                                                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                            </div>
                                            <div class="tab-pane fade" id="third" role="tabpanel">
                                                <h5 class="card-title">ospf</h5>
                                                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                            </div>
                                            
                                            
                                            
                                        </div>
                                    </div>
                                </div>
                        
                                
                            </section>
                            <!-- Responsive Tabs with Line Title End -->




                <form class="tooltip-end-top" id="devicesForm" >
                    <div class="card mb-5">
                      <div class="card-body">
                          

                        <div class="row g-3">

                          <div class="col-md-10">
                                <input  name="idDevice" id="idDevice" type="hidden" value=""/>
                            <label class="mb-3 top-label">
                              <input class="form-control" name="nameDev" id="nameDev"/>
                              <span>NOMBRE DEL DISPOSITIVO</span>
                            </label>
                          </div>
                          

                        </div>

                        <div class="row g-3">

                            <div class="col-md-5">
                            <div class="mb-3 top-label">
                              <select class="form-control" name="marcaDev" id="marcaDev">
                                <option label="&nbsp;"></option>
                                <option value="Ubiquiti">Ubiquiti</option>
                                <option value="Mikrotik">Mikrotik</option>
                                <option value="Cisco">Cisco</option>
                              </select>
                              <span>MARCA</span>
                            </div>
                          </div>

                          <div class="col-md-5">
                            <label class="mb-3 top-label">
                              <input class="form-control" name="locaSite" id="locaSite"/>
                              <span>MODELO</span>
                            </label>
                          </div>
                          
                        </div>

                        <div class="row g-3">
                          
                          <div class="col-md-4">
                            <div class="mb-3 top-label">
                              <select class="form-control" name="typeDev" id="typeDev">
                                <option label="&nbsp;"></option>
                                <option value="Router">Router</option>
                                <option value="Switch" >Switch</option>
                                <option value="OLT" >OLT</option>
                                <option value="Radio_PTMP" >Radio_PTMP</option>
                                <option value="Radio_PTP" >Radio_PTP</option>
                              </select>
                              <span>TIPO</span>
                            </div>
                          </div>


                          <div class="col-md-4">
                            <div class="mb-3 top-label">
                              <select class="form-control" name="siteDev" id="siteDev">
                                <option label="&nbsp;"></option>
                                <option value="Acatlan 1">Acatlan 1</option>
                                
                              </select>
                              <span>SITIO</span>
                            </div>
                          </div>


                          <div class="col-md-2">
                          
                                        <div class="top-label custom-control-container">
                                            <div class="form-check form-switch">
                                                <input type="checkbox" class="form-check-input" id="customSwitchTopLabel" checked/>
                                            </div>
                                            <span>ACTIVO</span>
                                        </div>

                          </div>

                          

                          

                        </div>
                        

                        <div class="row g-3">
                          
                          <div class="col-md-4">
                            <label class="mb-3 top-label">
                              <input class="form-control" name="latSite" id="latSite"/>
                              <span>NOTAS</span>
                            </label>
                          </div>

                          
                        </div>

                      </div>
                      
                    </div>
                  </form>