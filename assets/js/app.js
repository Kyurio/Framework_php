
var app = new Vue({

  el: '#app',
  data: {

    // areas
    name_area: '',

    // boletas
    fechaBoleta: '',
    Area: 0,
    Monto: 0,
    PagoProveedor: 0,
    Monto: 0,
    Clasificacion: 0,
    N_boleta: 0,

    // roles
    name_rol: '',

    // bancos
    name_banco: '',

    // cuentas
    name_cuenta: '',

    // Usuarios
    mail: '',



    boletas: [],
    areas: [],
    roles: [],
    bancos: [],
    cuentas: [],


    titulo: 'titulo default',

  },

  mounted: function(){

    this.listado_areas();
    this.listado_boleta();
    this.listado_roles();
    this.mantenerTabs();
    this.listado_banco();
    this.listado_cuentas();

  },

  computed: {



  },

  methods: {

    // otros
    changeTitle: function(title){

      capturador = this;
      capturador.titulo = title;

    },

    mantenerTabs: function(){
      $(document).ready(function(){
        $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
          localStorage.setItem('activeTab', $(e.target).attr('href'));
        });
        var activeTab = localStorage.getItem('activeTab');
        if(activeTab){
          $('#myTab a[href="' + activeTab + '"]').tab('show');
        }
      });
    },



    // roles
    insert_rol: function() {

      axios({
        method: 'POST',
        url: '/rendiciones/config/control/Rol.php',
        data: {
          rol: this.name_rol,
        }

      }).then(function (response) {
        // handle success
        console.log(response.data);
        if(response.data == true){
          swal("Exito al grabar!","se ha guardado un nuevo registro", "success");
        }else{
          swal("Error al grabar!","por favor intentelo mas tarde", "warning");
        }
      }).catch(function (error) {
        console.log(error);
      });

      this.name_rol = '';
      //refresca la tabla
      this.listado_roles();


    },

    listado_roles: function() {

      capturador = this;
      axios.get('/rendiciones/config/control/ListadoRol.php', {
      }).then(function (response) {
        capturador.roles = response.data;
      });

    },

    eliminar_rol: function(id) {

      swal({
        title: "¿Estas seguro de Eliminar el registro?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          axios({
            method: 'POST',
            url: '/rendiciones/config/control/DeleteRol.php',
            data: {
              id_rol: id,
            }
          }).then(function (response) {
            if(response.data === true){
              swal("Poof! Tu registro fue eliminado !", {
                icon: "success",
              });
            }else {
              swal("Error al eliminar el registro", {
                icon: "warning",
              });
            }
          });
          this.listado_roles();
        }
      });


    },


    // areas
    insert_areas: function() {

      axios({
        method: 'POST',
        url: '/rendiciones/config/control/Area.php',
        data: {
          area: this.name_area,
        }

      }).then(function (response) {
        // handle success
        console.log(response.data);
        if(response.data == true){
          swal("Exito al grabar!","se ha guardado un nuevo registro", "success");
        }else{
          swal("Error al grabar!","por favor intentelo mas tarde", "warning");
        }
      }).catch(function (error) {
        console.log(error);
      });

      this.name_area = '';
      //refresca la tabla
      this.listado_areas();


    },

    listado_areas: function(){

      capturador = this;
      axios.get('/rendiciones/config/control/ListadoArea.php', {
      }).then(function (response) {
        capturador.areas = response.data;
      });

    },

    eliminar_areas: function(id) {

      swal({
        title: "¿Estas seguro de Eliminar el registro?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          axios({
            method: 'POST',
            url: '/rendiciones/config/control/DeleteArea.php',
            data: {
              id_area: id,
            }
          }).then(function (response) {
            if(response.data === true){
              swal("Poof! Tu registro fue eliminado !", {
                icon: "success",
              });
            }else {
              swal("Error al eliminar el registro", {
                icon: "warning",
              });
            }
          });
          this.listado_roles();
        }
      });

    },


    // boletas
    insert_boleta: function(){

      var area = document.getElementById('Area').value;

      axios({
        method: 'POST',
        url: '/rendiciones/config/control/Rendicion.php',
        data: {

          fecha_boleta: this.fechaBoleta,
          area: area,
          monto: this.Monto,
          pago_proveedor: this.PagoProveedor,
          monto: this.Monto,
          clasificacion: this.Clasificacion,
          n_boleta: this.N_boleta,

        }

      }).then(function (response) {
        // handle success
        if(response.data == true){
          swal("Exito al grabar!","se ha guardado un nuevo registro", "success");
        }else{
          swal("Error al grabar!","por favor intentelo mas tarde", "warning");
        }
      }).catch(function (error) {
        console.log(error);
      });

      this.fechaBoleta = '';
      this.Area = '';
      this.Monto = '';
      this.PagoProveedor = '';
      this.Monto = '';
      this.Clasificacion = '';
      this.N_boleta = '';

      //refresca la tabla
      this.listado_boleta();
      $("#ModalBoletas").modal("hide");

    },

    listado_boleta: function(){
      capturador = this;
      axios.get('/rendiciones/config/control/ListadoBoleta.php', {
      }).then(function (response) {
        capturador.boletas = response.data;
      });
    },


    // bancos
    insert_banco: function(){

      axios({
        method: 'POST',
        url: '/rendiciones/config/control/Banco.php',
        data: {
          banco: this.name_banco,
        }

      }).then(function (response) {
        // handle success
        console.log(response.data);
        if(response.data == true){
          swal("Exito al grabar!","se ha guardado un nuevo registro", "success");
        }else{
          swal("Error al grabar!","por favor intentelo mas tarde", "warning");
        }
      }).catch(function (error) {
        console.log(error);
      });

      this.name_banco = '';
      //refresca la tabla
      this.listado_roles();

    },

    listado_banco: function(){

      capturador = this;
      axios.get('/rendiciones/config/control/ListadoBanco.php', {
      }).then(function (response) {
        capturador.bancos = response.data;
        console.log(response.data);
      });

    },

    eliminr_banco: function(id) {
      swal({
        title: "¿Estas seguro de Eliminar el registro?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          axios({
            method: 'POST',
            url: '/rendiciones/config/control/DeleteBanco.php',
            data: {
              id_banco: id,
            }
          }).then(function (response) {
            if(response.data === true){
              swal("Poof! Tu registro fue eliminado !", {
                icon: "success",
              });
            }else {
              swal("Error al eliminar el registro", {
                icon: "warning",
              });
            }
          });
          this.listado_banco();
        }
      });

    },

    // cuentas
    insert_cuenta: function(){

      axios({
        method: 'POST',
        url: '/rendiciones/config/control/Cuenta.php',
        data: {
          cuenta: this.name_cuenta,
        }

      }).then(function (response) {
        // handle success
        console.log(response.data);
        if(response.data == true){
          swal("Exito al grabar!","se ha guardado un nuevo registro", "success");
        }else{
          swal("Error al grabar!","por favor intentelo mas tarde", "warning");
        }
      }).catch(function (error) {
        console.log(error);
      });

      this.name_cuenta = '';
      //refresca la tabla
      this.listado_cuentas();


    },

    listado_cuentas: function(){

      capturador = this;
      axios.get('/rendiciones/config/control/ListadoCuenta.php', {
      }).then(function (response) {
        capturador.cuentas = response.data;
        console.log(this.cuentas);
      });

    },

    eliminar_cuenta: function(id) {
      swal({
        title: "¿Estas seguro de Eliminar el registro?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          axios({
            method: 'POST',
            url: '/rendiciones/config/control/DeleteCuenta.php',
            data: {
              id_cuenta: id,
            }
          }).then(function (response) {
            if(response.data === true){
              swal("Poof! Tu registro fue eliminado !", {
                icon: "success",
              });
            }else {
              swal("Error al eliminar el registro", {
                icon: "warning",
              });
            }
          });
          this.listado_cuentas();
        }
      });

    },







  }

})
