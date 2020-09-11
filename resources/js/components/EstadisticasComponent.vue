<template>
    <div>   
        <line-chart :data="chartData"></line-chart>
    </div>
</template>


<script>
export default {
    data() {
      return{
          chartData:[],
      }
    },

    created(){
        var aux=[]
        axios.get('/estadísticas/historialventas/ganancias').then(res =>{
            res.data.forEach(element=>{
                aux=[element.fecha,element.ganancia]
                this.chartData.push(aux);
            })
        })
    },

    computed:{

    },

    methods:{

    }
}
</script>