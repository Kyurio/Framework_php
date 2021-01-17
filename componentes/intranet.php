

<div id="app">

  <div class="container-fluid">
    <div class="row">

      <!-- importa el sidebar -->
      <?php require_once("../componentes/sidebar.php"); ?>
      <!-- end inmport -->


      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <div class="container mt-4 mb-4">
            <h3>{{ titulo }}</h3>
          </div>
        </div>

        <div class="tab-content" id="myTabContent">

          <div class="tab-pane fade show active" id="nueva_rendicion" role="tabpanel" aria-labelledby="rendicion-tab">

            <div class="col-12">
              <div class="card">
                <div class="card-body">


                  <button type="button" class="btn btn-success mb-4 mt-2" data-bs-toggle="modal" data-bs-target="#ModalBoletas">
                    Agregar Boleta
                  </button>

                  <table class="table table-hover text-center">
                    <thead>
                      <tr>
                        <th scope="col">Fecha Boleta</th>
                        <th scope="col">Area</th>
                        <th scope="col">Monto</th>
                        <th scope="col">Pago Proveedor</th>
                        <th scope="col">N boleta</th>
                        <th scope="col">Clasificacion</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="item in boletas">
                        <th scope="row">{{ item.fecha_boleta }}</th>
                        <td>{{ item.area }}</td>
                        <td>{{ item.monto }}</td>
                        <td>{{ item.pago_proveedor }}</td>
                        <td>{{ item.n_boleta }}</td>
                        <td>{{ item.clasificacion }}</td>
                      </tr>
                    </tbody>
                  </table>



                </div>

              </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="ModalBoletas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalModela">Agregar Boleta</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form class="mt-1 mb-2 py-2" action="index.html" enctype="multipart/form-data" >

                      <div class="mb-3">
                        <label for="fechaBoleta" class="form-label">Fecha de boleta</label>
                        <input type="date" class="form-control" id="fechaBoleta" v-model="fechaBoleta" required>
                      </div>

                      <div class="mb-3">
                        <label for="Area" class="form-label">Area</label>
                        <select class="form-select" aria-label="Seleccionar Area" id="Area" required>
                          <option v-for="item in areas" v-bind:value="item.id_area" >{{ item.area }}</option>
                        </select>
                      </div>

                      <div class="mb-3">
                        <label for="Monto" class="form-label">Monto</label>
                        <input type="number" min="1" class="form-control" id="Monto" v-model="Monto" required>
                      </div>

                      <div class="mb-3">
                        <label for="PagoProveedor" class="form-label">Pago Proveedor</label>
                        <input type="text" class="form-control" id="PagoProveedor" v-model="PagoProveedor" required>
                      </div>

                      <div class="mb-3">
                        <label for="monto" class="form-label">Numero Boleta</label>
                        <input type="number" min="1" class="form-control" id="monto" v-model="N_boleta" required>
                      </div>

                      <div class="mb-3">
                        <label for="Clasificacion" class="form-label">Clasificacion</label>
                        <input type="number" min="1" class="form-control" id="Clasificacion" v-model="Clasificacion" required>
                      </div>

                      <div class="mb-3">
                        <label for="formFile" class="form-label">Boletas</label>
                        <input class="form-control" type="file" name="boletas[]" multiple=""  id="formFile">
                      </div>

                      <div class="mb-3">
                        <button type="button" class="btn btn-sm btn-success" name="button" @click="insert_boleta">Grabar</button>
                      </div>

                    </form>

                  </div>

                </div>
              </div>
            </div>

          </div>

          <div class="tab-pane fade" id="NuevaRendicion" role="tabpanel" aria-labelledby="tareas-tab">
            <div class="container">

              <!-- buscador -->
              <div class="col-sm-5">
                <div class="mt-1 d-flex justify-content-start">
                  <div class="md-form input-with-pre-icon">
                    <i class="fas fa-search input-prefix"></i>
                    <input type="text"  placeholder="buscar..."  class="form-control">
                  </div>
                </div>
              </div>
              <!-- end buscador -->




            </div>
          </div>

          <div class="tab-pane fade" id="cronograma" role="tabpanel" aria-labelledby="cronograma-tab">
            <div class="container py-5">

              <div class="container">
                <div class="mt-5 mb-5 py-5">

                  <!-- buscador -->
                  <div class="col-sm-5">
                    <div class="mt-1 d-flex justify-content-start">
                      <div class="md-form input-with-pre-icon">
                        <i class="fas fa-search input-prefix"></i>
                        <input type="text"  placeholder="buscar..."  class="form-control">
                      </div>
                    </div>
                  </div>
                  <!-- end buscador -->


                </div>
              </div>







            </div>
          </div>

          <div class="tab-pane fade" id="objetivos" role="tabpanel" aria-labelledby="objetivos-tab">
            <div class="container py-5">




            </div>
          </div>

          <div class="tab-pane fade" id="configuracion" role="tabpanel" aria-labelledby="config-tab">

            <div class="card">
              <div class="card-body">

                <!-- importa el navbar de el tabs -->
                <?php require_once("../componentes/navbartab.php"); ?>
                <!-- end inmport -->

                <div class="tab-content" id="pills-tabContent">

                  <div class="tab-pane fade show active" id="pills-area" role="tabpanel" aria-labelledby="pills-home-tab">

                    <div class="card">
                      <div class="card-body">

                        <h5>Areas</h5>
                        <form >

                          <div class="col-6 mb-2 mt-2">
                            <div class="mb-3">
                              <label for="Area" class="form-label">Agregar Nueva Area</label>
                              <input type="text" class="form-control" v-model="name_area" id="Area" required>
                            </div>
                          </div>
                          <div class="col-4">
                            <button type="button" @click="insert_areas" class="btn btn-success">Agregar</button>
                          </div>

                        </form>

                        <table class="table text-center">
                          <thead>
                            <tr>
                              <th scope="col">Area</th>
                              <th scope="col">Accion</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr v-for="item in areas">
                              <th scope="row">{{ item.area }}</th>
                              <td>
                                <button type="button" class="btn btn-sm btn-warning" name="button"><i class="fas fa-pen"></i></button>
                                <button @click="eliminar_areas(item.id_area)" type="button" class="btn btn-sm btn-danger" name="button"><i class="fas fa-trash"></i></button>
                              </td>
                            </tr>
                          </tbody>
                        </table>

                      </div>
                    </div>

                  </div>
                  <div class="tab-pane fade" id="pills-rol" role="tabpanel" aria-labelledby="pills-profile-tab">

                    <div class="card">
                      <div class="card-body">
                        <h5>Roles de el sistema</h5>

                        <div class="col-6 mb-2 mt-2">
                          <div class="mb-3">
                            <label for="Roles" class="form-label">Agregar Nuevo Rol</label>
                            <input type="text" class="form-control" v-model="name_rol" id="Roles" required>
                          </div>
                        </div>
                        <div class="col-4">
                          <button type="button" @click="insert_rol" class="btn btn-success">Agregar</button>
                        </div>

                        <table class="table text-center">
                          <thead>
                            <tr>
                              <th scope="col">Area</th>
                              <th scope="col">Accion</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr v-for="item in roles">
                              <th scope="row">{{ item.rol }}</th>
                              <td>
                                <button type="button" class="btn btn-sm btn-warning" name="button"><i class="fas fa-pen"></i></button>
                                <button @click="eliminar_rol(item.id)" type="button" class="btn btn-sm btn-danger" name="button"><i class="fas fa-trash"></i></button>
                              </td>
                            </tr>
                          </tbody>
                        </table>

                      </div>
                    </div>

                  </div>
                  <div class="tab-pane fade" id="pills-bancos" role="tabpanel" aria-labelledby="pills-bancos-tab">

                    <div class="card">
                      <div class="card-body">

                        <h5>Bancos</h5>
                        <form >

                          <div class="col-6 mb-2 mt-2">
                            <div class="mb-3">
                              <label for="Area" class="form-label">Agregar Nuevo Banco</label>
                              <input type="text" class="form-control" v-model="name_banco" id="banco" required>
                            </div>
                          </div>
                          <div class="col-4">
                            <button type="button" @click="insert_banco" class="btn btn-success">Agregar</button>
                          </div>

                        </form>

                        <table class="table text-center">
                          <thead>
                            <tr>
                              <th scope="col">banco</th>
                              <th scope="col">Accion</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr v-for="item in bancos">
                              <th scope="row">{{ item.banco }}</th>
                              <td>
                                <button type="button" class="btn btn-sm btn-warning" name="button"><i class="fas fa-pen"></i></button>
                                <button @click="eliminr_banco(item.id_banco)" type="button" class="btn btn-sm btn-danger" name="button"><i class="fas fa-trash"></i></button>
                              </td>
                            </tr>
                          </tbody>
                        </table>

                      </div>
                    </div>

                  </div>
                  <div class="tab-pane fade" id="pills-usuarios" role="tabpanel" aria-labelledby="pills-usuarios-tab">

                    <div class="card">
                      <div class="card-body">

                        <h5>Usuarios</h5>

                        <div class="row">
                          <div class="col-sm-5">

                            <form >


                              <div class="mb-3">
                                <label for="Area" class="form-label">Rol</label>
                                <select class="form-select" aria-label="roles" id="rol">
                                  <option v-for="item in roles" v-bind:value="item.id" >{{ item.rol }}</option>
                                </select>
                              </div>
                              <div class="mb-3">
                                <label for="Area" class="form-label">Rol</label>
                                <select class="form-select" aria-label="roles" id="rol">
                                  <option v-for="item in bancos" v-bind:value="item.id_banco" >{{ item.banco }}</option>
                                </select>
                              </div>
                              <div class="mb-3">
                                <label for="Area" class="form-label">Mail</label>
                                <input type="mail" class="form-control" v-model="mail" id="Mail" required>
                              </div>
                              <div class="mb-3">
                                <label for="Area" class="form-label">Tipo Cuenta</label>
                                <select class="form-select" aria-label="roles" id="rol">
                                  <option v-for="item in cuentas" v-bind:value="item.id_tipo_cuenta" >{{ item.tipo_cuenta }}</option>
                                </select>
                              </div>
                              <div class="mb-3">
                                <label for="Area" class="form-label">Rut</label>
                                <input type="text" class="form-control" v-model="rut" id="Rut" required>
                              </div>
                              <div class="mb-3">
                                <label for="Area" class="form-label">Nro Cuenta</label>
                                <input type="text" class="form-control" v-model="n_Cuenta" id="n_cuenta" required>
                              </div>
                              <div class="mb-3">
                                <label for="password" class="form-label">password</label>
                                <input type="password" class="form-control" v-model="password" id="password" required>
                              </div>
                              
                              <div class="col-4">
                                <button type="button" @click="insert_areas" class="btn btn-success">Agregar</button>
                              </div>

                            </form>

                          </div>
                          <div class="col-sm-7">
                            <table class="table text-center">
                              <thead>
                                <tr>
                                  <th scope="col">Usuarios</th>
                                  <th scope="col">Accion</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr v-for="item in areas">
                                  <th scope="row">{{ item.area }}</th>
                                  <td>
                                    <button type="button" class="btn btn-sm btn-warning" name="button"><i class="fas fa-pen"></i></button>
                                    <button @click="eliminar_areas(item.id_area)" type="button" class="btn btn-sm btn-danger" name="button"><i class="fas fa-trash"></i></button>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>


                      </div>
                    </div>

                  </div>
                  <div class="tab-pane fade" id="pills-cuenta" role="tabpanel" aria-labelledby="pills-cuenta-tab">

                    <div class="card">
                      <div class="card-body">
                        <h5>Cuentas</h5>

                        <div class="col-6 mb-2 mt-2">
                          <div class="mb-3">
                            <label for="Cuentas" class="form-label">Agregar Nueva Cuenta</label>
                            <input type="text" class="form-control" v-model="name_cuenta" id="Cuentas" required>
                          </div>
                        </div>
                        <div class="col-4">
                          <button type="button" @click="insert_cuenta" class="btn btn-success">Agregar</button>
                        </div>

                        <table class="table text-center">
                          <thead>
                            <tr>
                              <th scope="col">Cuentas</th>
                              <th scope="col">Accion</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr v-for="item in cuentas">
                              <th scope="row">{{ item.tipo_cuenta }}</th>
                              <td>
                                <button type="button" class="btn btn-sm btn-warning" name="button"><i class="fas fa-pen"></i></button>
                                <button @click="eliminar_cuenta(item.id_tipo_cuenta)" type="button" class="btn btn-sm btn-danger" name="button"><i class="fas fa-trash"></i></button>
                              </td>
                            </tr>
                          </tbody>
                        </table>

                      </div>
                    </div>

                  </div>
                </div>


              </div>
            </div>

          </div>

        </div>

      </main>


    </div>
  </div>



</div>
</div>
</div>



</div>
