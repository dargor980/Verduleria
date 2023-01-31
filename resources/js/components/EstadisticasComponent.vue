<template>
    <div> 
        <h5 class="my-4 text-center hit-the-floor-3">Ganancias del mes</h5>
        <div  class="row mb-3">
            <div class="col-md-4 pt-4">
                <div class="card text-white cardmesactual mb-3" style="width: 18rem; height: 7.7rem;">
                    <div class="ml-2 mt-2 row">
                        <div class="col-md-3">
                            <i class="fas fa-balance-scale-left pt-4" style="font-size: 45px; "></i>
                        </div>
                        <div class="col-md-9">
                            <h5>Mes actual</h5>
                            <h2>${{totalMesActual}}</h2>
                            <h6>{{actualOld}} - {{actualNow}}</h6>
                        </div>
                    </div>
                </div>
                <div class="card text-white cardmesanterior mb-1" style="width: 18rem; height: 7.7rem;">
                    <div class="ml-2 mt-2 row">
                        <div class="col-md-3">
                            <i class="fas fa-balance-scale-right pt-4" style="font-size: 45px; "></i>
                        </div>
                        <div class="col-md-9">
                            <h5>Mes pasado</h5>
                            <h2>${{totalMesAnterior}}</h2>
                            <h6>{{anteriorOld}} - {{anteriorNow}}</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 pt-3 card card4">
                <line-chart :data="chartData"></line-chart>
            </div>
        </div>
        <hr class="bg-light">
        <h5 class="my-4 text-center hit-the-floor-2">Top 5: Productos más vendidos del mes</h5>
        <div class="row my-4">
            <div class="col-md-5 card card4">
                <h4 class="text-center titulotop5 mt-3">Verduleria</h4>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Cant. vendida</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(item,index) in topVerduleria" :key="index">
                            <td>{{item.id}}</td>
                            <td>{{item.nombre}}</td>
                            <td>{{parseInt(item.cantidad)}}</td>
                        </tr>                       
                    </tbody>
                </table>
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-5 card card4">
                <h4 class="text-center titulotop5 mt-3">Congelados</h4>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Cant. vendida</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(item,index) in topCongelados" :key="index">
                            <td>{{item.id}}</td>
                            <td>{{item.nombre}}</td>
                            <td>{{parseInt(item.cantidad)}}</td>
                        </tr>     
                    </tbody>
                </table>
            </div>
        </div>  
        
    </div>
</template>


<script>
export default {
    data() {
      return{

          /*datos correspondientes a los gráficos y tablas */
          chartData:[],
          totalMesActual:'',
          totalMesAnterior:'',
          topVerduleria:[],
          topCongelados:[],


          /*fechas desde-hasta del mes actual*/
          actualOld:'',
          actualNow:'',

          /*fechas desde hasta del mes anterior */

          anteriorOld:'',
          anteriorNow:'',
      }
    },

    created(){
        var aux=[]

        /*obtiene los datos para el gráfico de ganancias*/

        axios.get('/estadísticas/historialventas/ganancias').then(res =>{
            res.data.forEach(element=>{
                aux=[element.fecha,element.ganancia]
                this.chartData.push(aux);
            })
        })

        /*obtiene la ganancia del mes actual*/
        
        axios.get('/estadisticas/historialventas/ganancias/actual').then(res =>{
            this.totalMesActual=parseInt(res.data[0]);
            this.actualNow=res.data[1];
            this.actualOld=res.data[2];
        })

         /*obtiene la ganancia del mes anterior*/

        axios.get('/estadisticas/historialventas/ganancias/anterior').then(res=>{
            this.totalMesAnterior=parseInt(res.data[0]);
            this.anteriorNow=res.data[1];
            this.anteriorOld=res.data[2];
        })

        /*Obtiene el top 5 de verduleria */

        axios.get('/estadisticas/historialventas/top/verduleria').then(res =>{
            this.topVerduleria=res.data;
        })

        /*obtiene el top 5 de congelados */ 

        axios.get('/estadisticas/historialventas/top5/congelados').then(res =>{
            this.topCongelados=res.data
        })


    },

    computed:{

    },

    methods:{

    }
}
</script>