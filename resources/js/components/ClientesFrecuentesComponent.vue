<template>
    <div>
        <hr class="bg-light">
        <h5 class="my-4 text-center hit-the-floor-3">Estadísticas de Clientes</h5>
        <hr class="bg-light">
        <div class="row my-4 px-4">
            <div class="col-md-5 card card4">
                <h4 class="text-center titulotop5 mt-3">Top 5: Mayor Monto</h4>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Monto</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(item,index) in mayorMonto" :key="index">
                            <td>{{index+1}}</td>
                            <td>{{item.nombre}}</td>
                            <td>${{item.monto}}</td>
                        </tr>                      
                    </tbody>
                </table>
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-5 card card4">
                <h4 class="text-center titulotop5 mt-3">Top 5: Cantidad de pedidos</h4>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Cant. Pedidos</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(item,index) in cantPedidos" :key="index">
                            <td>{{index+1}}</td>
                            <td>{{item.nombre}}</td>
                            <td>{{item.cantidad}}</td>
                        </tr>     
                    </tbody>
                </table>
            </div>
        </div>  
    </div>
</template>

<script>
export default {
    data(){
        return{
            mayorMonto:[],
            cantPedidos:[],
        }
    },

    created(){
        axios.get('/estadisticas/clientesfrecuentes/mayormonto').then(res=> {
            this.mayorMonto=res.data;
        })
        axios.get('/estadisticas/clientesfrecuentes/cantpedidos').then(res =>{
            this.cantPedidos=res.data;
        })
    }
}
</script>