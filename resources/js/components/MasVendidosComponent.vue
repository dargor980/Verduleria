<template>
    <div>
        <hr class="bg-light">
        <h4 class="my-4 text-center hit-the-floor-3">Estadísticas de Productos</h4>
        <hr class="bg-light">
        <h4 class="my-4 text-center hit-the-floor-2">Top 10: Productos</h4>
        <div class="row my-4 px-4 pb-4">
            <div class="col-md-1"></div>
            <div class="col-md-10 card card4 table-responsive">
                <h4 class="text-center titulotop5 mt-3">Más vendidos</h4>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Categoria</th>
                            <th scope="col">Cant.</th>
                            <th scope="col">Medida</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(item,index) in masVendidos" :key="index">
                            <td>{{index+1}}</td>
                            <td>{{item.nombre}}</td>
                            <td>{{item.categoria}}</td>
                            <td>{{item.cantidad}}</td>
                            <td>{{item.medida}}</td>
                        </tr> 
                    </tbody>
                </table>
            </div>
            <div class="col-md-1"></div>
        </div>

        <hr class="bg-light">

        <h4 class="my-4 text-center hit-the-floor-2">Top 5: Productos congelados</h4>

        <div class="">
            <div class="row pb-4">
            <div class="col-md-1"></div>
            <div class="card col-md-10 card4 table-responsive">
                <table class="table my-4">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Categoria</th>
                            <th scope="col">Cant.</th>
                            <th scope="col">Medida</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(item,index) in congelados" :key="index">
                            <td>{{index+1}}</td>
                            <td>{{item.nombre}}</td>
                            <td>{{item.categoria}}</td>
                            <td>{{item.cantidad}}</td>
                            <td>{{item.medida}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-1"></div>
            </div>

            <hr class="bg-light">
            <h4 class="mt-4 mb-1 text-center hit-the-floor-2">Top 5: Productos verdulería</h4>

            <div class="row">
                <div class="col-md-1"></div>
                <div class="my-4 card card4 col-md-10 table-responsive">
                    <table class="table my-4">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Categoria</th>
                                <th scope="col">Cant.</th>
                                <th scope="col">Medida</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(item,index) in verduleria" :key="index">
                                <td>{{index+1}}</td>
                                <td>{{item.nombre}}</td>
                                <td>{{item.categoria}}</td>
                                <td>{{item.cantidad}} </td>
                                <td>{{item.medida}}</td>
                            </tr>   
                        </tbody>
                    </table>
                </div>
                <div class="col-md-1"></div>
            </div>
            
        </div> 
        <hr class="bg-light"> 
    </div>
</template>

<script>
export default {
    data(){
        return{
            masVendidos:[],
            congelados:[],
            verduleria:[],
        }
    },

    created(){

        axios.get('/estadisticas/masvendidos/masvendido').then(res =>{
            this.masVendidos=res.data;
        });

        axios.get('/estadisticas/masvendidos/congelados').then(res =>{
            this.congelados=res.data;
        });

        axios.get('/estadisticas/masvendidos/verduleria').then(res =>{
            this.verduleria=res.data;
        });

    }
}
</script>