

<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
  <div class="sidebar-sticky pt-3">
    <ul class="nav flex-column" id="myTab" role="tablist">
      

      <li class="nav-item" role="presentation">
        <a class="nav-link active" @click="changeTitle('Agregar Nueva Rendicion')" id="NuevaRendicion-tab" data-bs-toggle="tab" href="#nueva_rendicion" role="tab" aria-controls="NuevaRendicion" aria-selected="true"><i class="fas fa-money-bill-alt"></i> Nueva Rendicion</a>
      </li>

      <li class="nav-item" role="presentation">
        <a class="nav-link" @click="changeTitle('Agregar Nuevo Anexo')" id="home-tab" data-bs-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><i class="fas fa-archive"></i> Nuevo Anexo</a>
      </li>

      <li class="nav-item" role="presentation">
        <a class="nav-link" @click="changeTitle('Agregar Nuevo Evento')" id="home-tab" data-bs-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><i class="fas fa-calendar-alt"></i> Nuevo Evento</a>
      </li>

      <li class="nav-item" role="presentation">
        <a class="nav-link" @click="changeTitle('Agregar Nuevo Viaje')" id="home-tab" data-bs-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><i class="fas fa-car-side"></i> Nuevo Viaje</a>
      </li>

      <li class="nav-item" role="presentation">
        <a class="nav-link" @click="changeTitle('Configuracion de el sistema')" id="configuracion-tab" data-bs-toggle="tab" href="#configuracion" role="tab" aria-controls="configuracion" aria-selected="true"> <i class="fas fa-cog"></i> Configuracion</a>
      </li>


    </ul>
  </div>
</nav>
