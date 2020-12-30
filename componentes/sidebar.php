

<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
  <div class="sidebar-sticky pt-3">
    <ul class="nav flex-column" id="myTab" role="tablist">

      <li class="nav-item" role="presentation">
        <a class="nav-link active" @click="changeTitle('Home')" id="home-tab" data-bs-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><i class="fas fa-home"></i> Home</a>
      </li>

      <li class="nav-item" role="presentation">
        <a class="nav-link" @click="changeTitle('Tareas')" id="profile-tab" data-bs-toggle="tab" href="#tareas" role="tab" aria-controls="tareas" aria-selected="false"><i class="fas fa-thumbtack"></i> Tareas</a>
      </li>

      <li class="nav-item" role="presentation">
        <a class="nav-link" @click="changeTitle('Cronograam')" id="contact-tab" data-bs-toggle="tab" href="#cronograma" role="tab" aria-controls="cronograma" aria-selected="false"><i class="fas fa-poll"></i> Cronograma</a>
      </li>


      <li class="nav-item" role="presentation">
        <a class="nav-link" @click="changeTitle('Objetivos')" id="contact-tab" data-bs-toggle="tab" href="#objetivos" role="tab" aria-controls="objetivos" aria-selected="false"><i class="fas fa-bullseye"></i> Objetivos</a>
      </li>


      <li class="nav-item" role="presentation">
        <a class="nav-link" @click="changeTitle('Configuracion')" id="contact-tab" data-bs-toggle="tab" href="#config" role="tab" aria-controls="config" aria-selected="false"><i class="fas fa-cog"></i> configuracion</a>
      </li>


      <li class="nav-item" role="presentation">
        <a class="nav-link" @click="changeTitle('perfil')" id="contact-tab" data-bs-toggle="tab" href="#perfil" role="tab" aria-controls="perfil" aria-selected="false"><i class="fas fa-male"></i> perfil</a>
      </li>

    </ul>
  </div>
</nav>
