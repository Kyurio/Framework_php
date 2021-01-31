
var app = new Vue({

  el: '#app',
  data: {


    titulo: 'titulo default',
    Nombre_web: 'Nombre Web'

  },

  mounted: function(){


  },

  computed: {



  },

  methods: {

    // carga el titulo de la web
    changeTitle: function(title){

      capturador = this;
      capturador.titulo = title;

    },

    test: function (){

      Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'Your work has been saved',
        showConfirmButton: false,
        timer: 1500
      })

    }


  }

})
