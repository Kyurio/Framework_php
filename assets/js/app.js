
var app = new Vue({

  el: '#app',
  data: {

    name_area: '',
    fechaBoleta: '',
    Area: 0,
    Monto: 0,
    PagoProveedor: 0,
    Monto: 0,
    Clasificacion: 0,
    N_boleta: 0,

    boletas: [],
    areas: [],


    titulo: 'titulo default',

  },

  mounted: function(){

    this.listado_areas();
    this.listado_boleta();

  },

  computed: {



  },

  methods: {

    // otros
    changeTitle: function(title){

      capturador = this;
      capturador.titulo = title;

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
          this.listado_areas();
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


  }

})
