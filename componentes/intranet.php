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


          <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">


          </div>

          <div class="tab-pane fade" id="tareas" role="tabpanel" aria-labelledby="tareas-tab">

            <div class="container">

              <button type="button" @click="ActivarFormulario" class="btn btn-sm btn-success mt-1 mb-1 py-1" name="button"><i class="fas fa-plus"></i></button>

              <div  v-if="formTask == true" class="card animate__animated animate__fadeInRight animate__faster 1ms" >
                <div class="card-body">

                  <form method="post" @submit="CheckFormTask" method="post" novalidate="true">
                    <div class="mb-1">
                      <div class="form-group">
                        <input type="text" class="form-control" id="nombre" v-model="title" placeholder="Tarea" aria-describedby="Tarea" required>
                      </div>
                    </div>
                    <div class="mb-1">
                      <div class="form-group">
                        <input type="date" class="form-control" id="plazo" v-model="plazo" placeholder="Plazo" aria-describedby="plazo" required>
                      </div>
                    </div>


                    <div class="progress mb-2">
                      <div class="progress-bar bg-success" role="progressbar"  aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>

                    <button type="submit" class="btn btn-sm btn-success" name="button">Grabar</button>
                  </form>

                </div>
              </div>
              <div v-else class="card animate__animated animate__fadeOutRight animate__faster 1ms" >

              </div>

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

              <div class="card mt-2 mb-2">
                <div class="card-body">
                  <div class="container">
                    <table class="table text-center">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Tarea</th>
                          <th scope="col">Fecha</th>
                          <th scope="col">Accion</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr v-for="(item, index) in filterTasks"  v-show="(pag - 1) * num_results_taks <= index  && pag * num_results_taks > index">
                          <td>1</td>
                          <td>{{ item.titulo }}</td>
                          <td>{{ item.plazo }}</td>
                          <td>
                            <button type="button" @click="TerminarTarea(item.id)" name="button" class="btn btn-info btn-sm"> <i class="fas fa-check"></i></button>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>


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

                  <!-- contenedor -->
                  <div class="row ">
                    <div class="col-sm-3 mb-4 list" v-for="(item, index) in filterTasks"  v-show="(pag - 1) * num_results_taks <= index  && pag * num_results_taks > index">
                      <div class="card z-depth-1-half " >
                        <div class="view overlay">
                          <img class="name card-img-top" src="" alt="Card image cap">
                          <a><div class="mask rgba-white-slight"></div></a>
                        </div>
                        <div class="card-body">
                          <h4 class="">{{ item.titulo }}</h4>
                          <p class="">{{ item.plazo }} </p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- end container -->

                  <!-- paginador -->
                  <nav aria-label="Page navigation" class="text-center">
                    <ul class="pagination text-center">
                      <li>
                        <a class="mr-3" href="#" aria-label="Previous" v-show="pag != 1" @click.prevent="pag -= 1">
                          <span aria-hidden="true"> anterior </span>
                        </a>
                      </li>
                      <li>
                        <a href="#" aria-label="Next" v-show="pag * num_results_taks / tasks.length < 1" @click.prevent="pag += 1">
                          <span aria-hidden="true"> siguiente </span>
                        </a>
                      </li>
                    </ul>
                  </nav>
                  <!-- end paginador -->
                </div>
              </div>







            </div>
          </div>

          <div class="tab-pane fade" id="objetivos" role="tabpanel" aria-labelledby="objetivos-tab">
            <div class="container py-5">

              <div class="card">
                <div class="card-body">
                  <h4> crear nuevo objetivo </h4>
                  <form class="border border-light p-5" enctype="multipart/form-data" method="POST" action="<?php echo RUTA_URL ?>config/control/InsertarTarea.php">

                    <div class="form-group">
                      <input type="text" class="form-control" id="objetivo" name="objetivo" placeholder="objetivo" aria-describedby="objetivo" required>
                    </div>

                    <div class="form-group">
                      <input type="date" class="form-control" id="plazo" name="plazo" placeholder="Plazo" aria-describedby="plazo" required>
                    </div>

                    <select class="form-select" aria-label="grupos">
                      <option selected>Selecciona el grupo</option>
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                    </select>

                    <div class="progress mb-2">
                      <div class="progress-bar bg-success" role="progressbar"  aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>

                    <button type="submit" class="btn btn-sm btn-success" name="button">Subir</button>
                  </form>

                </div>
              </div>


            </div>
          </div>

          <div class="tab-pane fade" id="config" role="tabpanel" aria-labelledby="config-tab">
            <div class="container py-5">


              <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">

                <li class="nav-item" role="presentation">
                  <a class="nav-link active" id="pills-seccion-tab" data-bs-toggle="pill" href="#pills-seccion" role="tab" aria-controls="pills-seccion" aria-selected="true">Secciones</a>
                </li>

                <li class="nav-item" role="presentation">
                  <a class="nav-link" id="pills-home-tab" data-bs-toggle="pill" href="#pills-users" role="tab" aria-controls="pills-users" aria-selected="false">Usuarios</a>
                </li>

                <li class="nav-item" role="presentation">
                  <a class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Contact</a>
                </li>

              </ul>

              <div class="tab-content" id="pills-tabContent">

                <div class="tab-pane fade show active" id="pills-users" role="tabpanel" aria-labelledby="pills-home-tab">

                  <p> agregar usuarios </p>
                  <div class="card">
                    <div class="card-body">
                      <form method="post" @submit="CheckFormTask" method="post" novalidate="true">

                        <div class="mb-1">
                          <div class="form-group">
                            <input type="text" class="form-control" id="usuario" v-model="usuario" placeholder="usuario" aria-describedby="usuario" required>
                          </div>
                        </div>

                        <div class="mb-1">
                          <div class="form-group">
                            <input type="text" class="form-control" id="seccion" v-model="seccion" placeholder="seccion" aria-describedby="seccion" required>
                          </div>
                        </div>

                        <div class="mb-1">
                          <div class="form-group">
                            <input type="password" class="form-control" id="password" v-model="password" placeholder="password" aria-describedby="password" required>
                          </div>
                        </div>

                        <button type="submit" class="btn btn-sm btn-success" name="button">Grabar</button>
                      </form>
                    </div>
                  </div>




                </div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">...</div>
                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">...</div>
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
