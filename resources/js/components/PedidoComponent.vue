<template>
    <div>
        <!--Tipo Cliente-->
        <div v-if="viewSeccionCliente">
            <hr class="bg-light">
            <h3 class="text-white pl-4">Seleccione una opción:</h3>
                <div class="row mt-3">
                    <div class="col-md-2"></div>
                    <div class="col-md-4 text-center">
                        <button class="btn btn-success" @click="chooseNewCliente"><i class="fas fa-user-plus"></i> &nbsp; Nuevo Cliente</button>
                    </div>
                    <div class="col-md-4 text-center">
                        <button class="btn btn-success" @click="chooseClienteExistente"><i class="far fa-list-alt"></i>&nbsp; Lista de Clientes</button>
                    </div>
                    <div class="col-md-2"></div>
                </div>
        </div>
        <!--/Tipo Cliente-->


         <!--Nuevo cliente-->
         <div v-if="optionCliente==='new'">
            <hr class="bg-light">
            <h3 class="text-white text-center">Nuevo Cliente</h3>
            <form  @submit.prevent="addCliente">
                <div class="row">
                    <div class="col-md-7">
                        <h5 class="text-white mt-2">Señor(a):&nbsp;</h5>
                    </div>
                    <div class="col-md-5">
                        <h5 class="text-white mt-2">Teléfono:&nbsp;</h5>
                    </div>
                    <div class="col-md-7">
                        
                        <div>
                            <input name='nombre' type="text" placeholder="Nombre del cliente" class="form-control" v-model="clienteNew.nombre">
                        </div>
                    </div>
                    <div class="col-md-5">
                        
                        <div>
                            <input name='fono' type="text" placeholder="Ingrese número" class="form-control" v-model="clienteNew.fono"> 
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-7">
                        <h5 class="text-white mt-2">Domicilio:&nbsp;</h5>
                    </div>
                    <div class="col-md-5">
                        <h5 class="text-white mt-2">Depto:&nbsp;</h5>
                    </div>
                    <div class="col-md-7">
                      
                        <div>
                            <input name='domicilio' type="text" placeholder="Ingrese dirección" class="form-control" v-model="clienteNew.domicilio">
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div>
                            <input name='depto' type="text" placeholder="Ingrese depto" class="form-control" v-model="clienteNew.depto"> 
                        </div>
                    </div>
                </div>
                <br>
                <div class="text-center">
                    <button class="btn btn-success mb-3 text-white" type="submit"><i class="fas fa-plus text-white"></i> Añadir</button>
                    <button class="btn btn-success mb-3 text-white" @click="back"><i class="fas fa-arrow-left text-white"></i> volver</button>
                </div>
            </form>
        </div>
        <!--/Nuevo cliente-->

         <!--Cliente en lista-->
        <div v-if="optionCliente==='existente'">
            <hr class="bg-light">
            <h3 class="text-white pl-4">Seleccione Cliente:</h3>
            <!--ERROR: DEBE SELECCIONAR SI O SI UN CLIENTE UWU-->
            <form @submit.prevent="selectClienteLista">
                <div class="row mt-3">
                    
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <select  class="custom-select  mb-3"  v-model="clientePedidoId">
                            <option selected>Seleccione un cliente:</option>
                            <option :value="item.id" v-for="(item,index) in clientes" :key="index">{{item.nombre}}</option>   
                        </select>
                    </div>
                    <div class="col-md-1"></div>
                    <div class="container text-center">
                        <button class="btn btn-success mb-3 text-white" type="submit" >Seleccionar</button>
                        <button class="btn btn-success mb-3 text-white" @click="back"><i class="fas fa-arrow-left text-white"></i> volver</button>
                    </div>
                    
                </div>
            </form>  
        </div>
        <!--/Cliente en lista-->


         <!--Selecciona Productos-->
        <div v-if="isClientePedidoExists">
            <hr class="bg-light">
            <h3 class="text-white pl-4">Seleccione los productos:</h3>
            <form action="">
                <ul class="list-inline ml-5 pl-5">
                    <li class="list-inline-item col-md-5 my-1 p-0" v-for="(item,index) in productos" :key="index">
                        <div class="container-fluid cardproducto">    
                        <h6 class="mt-2">
                            <input type="checkbox">
                            {{item.nombre}}
                            <div class="col-xs-3 mt-2">
                                <input type="text" class="form-control" placeholder="Cantidad(si queri le poni la medida)">
                            </div>
                        </h6>
                        </div>
                    </li>
                </ul>
                <div class="text-center">
                    <button class="btn btn-success mb-3 text-white" type="submit" ><i class="fas fa-plus text-white"></i> Añadir Producto(s)</button>
                </div>
            </form>
        </div>
        <!--/Selecciona Productos-->
        

        <!--/Tabla de productos agregados-->
        <div v-if="pedidoFinal">
            <hr class="bg-light">
            <h3 class="text-white pl-4 text-center">Pedido final</h3>
            <form action="">
                <div class="card table-responsive">
                    <div class="container">
                        <table class="table table-sm">
                        <thead>
                            <tr class="boton text-white">
                            <th scope="col">Descartar</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Medida</th>
                            <th scope="col">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <td class="pl-4"><i class="fas fa-trash-alt text-danger"></a></i></td>
                            <td>Tomate</td>
                            <td>1200</td>
                            <td>1.8</td>
                            <td>kg</td>
                            <td>2000</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th class="border-top border-dark"></th>
                                <th class="border-top border-dark"></th>
                                <th class="border-top border-dark"></th>
                                <th class="border-top border-dark"></th>
                                <th class="border-top border-dark">Total:</th>
                                <th class="border-top border-dark">2000</th>
                            </tr>
                        </tfoot>
                        </table>
                    </div>
                </div>
                <div class="text-center mt-4">
                    <button class="btn btn-success mb-3 text-white" type="submit" data-toggle="modal" data-target="#seguro"><i class="text-white"></i> Finalizar</button>
                </div>
            </form>
        </div>
        <!--/Tabla de productos agregados-->

       
    </div>
</template>

<script>
export default {
    data(){
        return{
            clientes:[],
            clienteNew:{nombre:'',fono:'',domicilio:'',depto:''},
            clientePedidoId:'',
            clientePedidoData:[],    //Datos del cliente que se asociará al pedido.
            productos:[],


            /*variables de control */
            optionCliente:'',  //variable para controlar visualizacion de nuevo cliente o lista de clientes
            viewSeccionCliente: true,  //variable que muestra las opciones nuevo cliente o lista de clientes
            isClientePedidoExists: false,   //indica si ya se seleccionó el cliente que será asociado al pedido.
            pedidoFinal: false,  //variable que indica la visualizacion del pedidofinal.

        }
    },

    created(){
        axios.get('/clientespedidos').then(res =>{
            this.clientes= res.data;
        })

        axios.get('/productospedidos').then(res =>{
            this.productos= res.data;
        })
    },

    methods:{
        chooseClienteExistente(){
            this.optionCliente='existente';
            this.viewSeccionCliente=false;
        },

        chooseNewCliente(){
            this.optionCliente='new';
            this.viewSeccionCliente=false;
        },
        back(){
            this.viewSeccionCliente=true;
            this.optionCliente='';
        },

        addCliente(){
            if(this.clienteNew.nombre.trim()==='' || this.clienteNew.fono.trim()==='' || this.clienteNew.domicilio.trim()==='')
            {
                alert('Debe rellenar los campos antes de proseguir');
                return;
            }
            const params={nombre: this.clienteNew.nombre, fono: this.clienteNew.fono, domicilio: this.clienteNew.domicilio, depto: this.clienteNew.depto};
            this.clienteNew={nombre:'',fono:'',domicilio:'',depto:''};
            axios.post('/addclientepedido',params).then(res =>{
                this.clientes.push(res.data);
                this.clientePedidoData=res.data;
                console.log(this.clientePedidoData.nombre);
                this.isClientePedidoExists=true;
            });

        },

        selectClienteLista()
        {
            const params={id:this.clientePedidoId};
            axios.post('/searchcliente',params).then(res =>{
                this.clientePedidoData=res.data;
                this.isClientePedidoExists=true;

            });
        },

        addProducto(){

        },

        createPedido(){

        },




    }
}
</script>