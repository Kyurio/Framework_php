
var app = new Vue({

  el: '#app',
  data: {

    titulo: 'titulo default',
    tasks: [],
    errors: [],
    BusquedaTarea: '',
    filterTasks: [],
    msg: '',
    contador: 0,
    formTask: false,

    num_results_taks: 10,

    pag: 1,

    title: '',
    plazo: '',

    usuario: '',
    seccion: '',
    password: '',


  },

  mounted: function(){

    this.tabs();
    this.listado_tareas();

  },

  computed: {

    buscadorTareas:{
      get(){
        return this.BusquedaTarea
      },
      set(value){
        value = value.toLowerCase();
        this.filterTasks = this.tasks.filter(item => item.title.toLowerCase().indexOf(value) !== -1)
        this.BusquedaTarea = value
      }
    },

  },

  methods: {

    tabs: function(){

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



    changeTitle: function(title){

      capturador = this;
      capturador.titulo = title;

    },

    insert_tarea: function() {

      axios({
        method: 'POST',
        url: '/kyaria/config/control/InsertarTarea.php',
        data: {
          title_task: this.title,
          date_task: this.plazo,
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

      this.title = '';
      this.plazo = '';
      this.formTask = false;
      this.listado_tareas();
      //refresca la tabla


    },

    listado_tareas: function(){

      capturador = this;
      axios.get('/kyaria/config/control/Tareas.php', {
      }).then(function (response) {
        capturador.tasks = response.data;
        capturador.filterTasks = response.data;
      });

    },

    TerminarTarea: function(id){
      capturador = this;

      axios({
        method: 'POST',
        url: '/kyaria/config/control/UpdateTarea.php',
        data: {

          Id_tarea: id,

        }
      }).then(function (response) {
        console.log(response.data)
        if(response.data === true){

          swal("tarea completa", {
            icon: "success",
          });

        }else {
          swal("Error al complentar tareas", {
            icon: "warning",
          });
        }
      });

      this.listado_tareas();

    },

    ActivarFormulario: function() {
      capturador = this;

      capturador.formTask = true

    },

    CheckFormTask: function(e){

      this.errors = [];

      if (!this.title) {
        this.errors.push('El titulo es obligatorio.');
      } else if (!this.plazo)  {
        this.errors.push('El plazo es obligatorio.');
      }

      //grabar
      if (!this.errors.length) {
        this.insert_tarea();
      }

      e.preventDefault();

    },

    insert_usuario: function(){},

    CheckFormUser: function(e){

      this.errors = [];

      if (!this.usuario) {
        this.errors.push('El usuario es obligatorio.');
      } else if (!this.seccion)  {
        this.errors.push('La seccion es obligatorio.');
      } else if (!this.password){
        this.errors.push('La contraseña es obligatorio.');
      }

      //grabar
      if (!this.errors.length) {
        this.insert_usuario();
      }

      e.preventDefault();

    },

  },








})
