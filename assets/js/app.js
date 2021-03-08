
var app = new Vue({

  el: '#app',
  data: {


    titulo: 'titulo default',
    Nombre_web: 'Nombre Web',

    //valores dolars

    ValorDolars: '',
    FechaCompra: '',
    CantidadDolars: '',
    errors: ̣{},

  },

  mounted: {


  },

  computed: {



  },

  methods: {

    // carga el titulo de la web
    changeTitle: function(title){

      capturador = this;
      capturador.titulo = title;

    },

    GrabarDolars: function (){

      axios({
        method: 'POST',
        url: '/framework_php/',
        data: {
          name: this.name_category,
          description: this.description_category,
        }

      }).then(function (response) {
        // handle success
        if(response.data == true){
          swal("Exito al grabar!","se ha guardado un nuevo registro", "success");
        }else{
          swal("Error al grabar!","por favor intentelo mas tarde", "warning");
        }
        //console.log(response.data);
      }).catch(function (error) {
        console.log(error);
      });


      //refresca la tabla

    },

    Empresa: function() {

      axios({
        method: 'POST',
        url: '/framework_php/',
        data: {
          name: this.name_category,
          description: this.description_category,
        }

      }).then(function (response) {
        // handle success
        if(response.data == true){
          swal("Exito al grabar!","se ha guardado un nuevo registro", "success");
        }else{
          swal("Error al grabar!","por favor intentelo mas tarde", "warning");
        }
        //console.log(response.data);
      }).catch(function (error) {
        console.log(error);
      });


    },




  }

})
