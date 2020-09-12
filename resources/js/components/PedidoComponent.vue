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

       

        <!--Datos Cliente-->

        <div v-if="isClientePedidoExists && clientenuevo">
            <hr class="bg-light">
            <h3 class="text-white text-center">Datos del cliente</h3>
            <div class="row">
                    <div class="col-md-7">
                        <h5 class="text-white mt-2">Señor(a):&nbsp;</h5>
                    </div>
                    <div class="col-md-5">
                        <h5 class="text-white mt-2">Teléfono:&nbsp;</h5>
                    </div>
                    <div class="col-md-7">
                        
                        <div>
                            <input name='nombre' type="text" placeholder="Nombre del cliente" class="form-control" v-model="clienteNew.nombre" disabled>
                        </div>
                    </div>
                    <div class="col-md-5">
                        
                        <div>
                            <input name='fono' type="text" placeholder="Ingrese número" class="form-control" v-model="clienteNew.fono" disabled> 
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
                            <input name='domicilio' type="text" placeholder="Ingrese dirección" class="form-control" v-model="clienteNew.domicilio" disabled>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div>
                            <input name='depto' type="text" placeholder="Ingrese depto" class="form-control" v-model="clienteNew.depto" disabled> 
                        </div>
                    </div>
                </div>

        </div>

        <!--/Datos Cliente-->

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
                            <option selected :value="0">Seleccione un cliente:</option>
                            <option :value="item.id" v-for="(item,index) in clientes" :key="index">{{item.nombre}}</option>   
                        </select>
                    </div>
                    <div class="col-md-1"></div>
                    <div class="container text-center">
                        <button class="btn btn-success mb-3 text-white" type="submit">Seleccionar</button>
                        <button class="btn btn-success mb-3 text-white" @click="back"><i class="fas fa-arrow-left text-white"></i> volver</button>
                    </div>
                    
                </div>
            </form>  
        </div>
        <!--/Cliente en lista-->


         <!--Selecciona Productos-->
        <div v-if="isClientePedidoExists">
            <hr class="bg-light">
            <div class="row mb-2">
                <div class="col-md-7">
                    <h3 class="text-white pl-4 my-3">Seleccione los productos:</h3>
                </div>
                <div class="col-md-5 input-group md-form form-sm form-2 pl-0 my-3">
                    <input class="form-control my-0 py-1 lime-border" type="text" placeholder="Buscar producto" aria-label="Search">
                    <div class="input-group-append">
                        <span class="input-group-text lime lighten-2" id="basic-text1"><i class="fas fa-search text-grey"
                            aria-hidden="true"></i></span>
                    </div>
                </div>
            </div>
            <form @submit.prevent="">
                <div class="container productos">
                <ul class="list-inline ml-5 pl-5">
                    <li class="list-inline-item col-md-5 my-1 p-0" v-for="(item,index) in productos" :key="index">
                        <div class="container-fluid cardproducto">    
                            <h6 class="mt-2">
                                <input type="checkbox" v-model="productosSeleccionados" :checked="checked" :value="item">
                                {{item.nombre}}
                            </h6>
                        </div>
                    </li>
                </ul>
                </div>
                <div class="text-center">
                    <button class="btn btn-success mb-3 text-white" type="submit" @click="addProducto"><i class="fas fa-plus text-white"></i> Añadir Producto(s)</button>
                </div>
            </form>
        </div>
        <!--/Selecciona Productos-->
        

        <!--/Tabla de productos agregados-->
        <div v-if="pedidoFinal">
            <hr class="bg-light">
            <h3 class="text-white pl-4 text-center">Pedido final</h3>
            <form @submit.prevent="">
                <div class="card table-responsive">
                    <div class="container">
                        <table class="table table-sm mt-3">
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
                            <tr v-for="(item,index) in productosadd" :key="index">
                            <td class="pl-4"><i class="fas fa-trash-alt text-danger"></i></td>
                            <td>{{item.nombre}}</td>
                            <td>{{item.precio}}</td>
                            <td>
                                <div class="row">
                                    <div class="col">
                                        <input type="number" min="0" class="form-control" placeholder="Cantidad" v-model="cantidadSeleccionada[index]">
                                    </div>
                                </div>
                            </td>
                            <td v-for="(med, medidas) in medidas" :key="medidas" v-show="med.id===item.medidaId">{{med.nombre}}</td>
                            <td v-for="(sub, subt) in subtotal" :key="subt" v-show="subt===index">{{sub=cantidadSeleccionada[index]*item.precio}}</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th class="border-top border-dark"></th>
                                <th class="border-top border-dark"></th>
                                <th class="border-top border-dark"></th>
                                <th class="border-top border-dark"></th>
                                <th class="border-top border-dark">Total:</th>
                                <th class="border-top border-dark">{{calcularTotal}}</th>
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

        <!--Confirmación pedido-->
        <div class="modal fade" id="seguro" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title text-white" id="staticBackdropLabel">Finalizar Pedido</h5>
              <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body text-white">
                ¿Estas seguro que desea finalizar el pedido?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
              <button type="button" class="btn btn-success" @click="createPedido">Finalizar</button>
            </div>
          </div>
        </div>

        <!--Confirmación pedido-->


      </div>
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
            productosSeleccionados:[],
            productosadd:[],
            cantidadSeleccionada:[],
            medidas:[],
            cantidadAdd:[],
            subtotal:[],
            clientenuevo:false,
            total:0,
            
            

            /*variables de control */
            checked: false,
            optionCliente:'',  //variable para controlar visualizacion de nuevo cliente o lista de clientes
            viewSeccionCliente: true,  //variable que muestra las opciones nuevo cliente o lista de clientes
            isClientePedidoExists: false,   //indica si ya se seleccionó el cliente que será asociado al pedido.
            pedidoFinal: false,  //variable que indica la visualizacion del pedidofinal.

        }
    },

    computed:{

         calcularTotal()
        {
            this.total=0;
            for(var i=0; i<this.cantidadSeleccionada.length;i++)
            {
                this.total=parseInt(this.total)+(parseInt(this.cantidadSeleccionada[i])*parseInt(this.productosSeleccionados[i].precio));
                this.cantidadAdd[i]=this.cantidadSeleccionada[i];
            }


            return this.total;

        },

    },

    created(){
        axios.get('/clientespedidos').then(res =>{
            this.clientes= res.data;
        })

        axios.get('/productospedidos').then(res =>{
            this.productos= res.data;
        })

        axios.get('/medidasproductos').then(res =>{
            this.medidas= res.data;
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
            this.isClientePedidoExists=false;
            this.pedidoFinal=false;
            this.productosSeleccionados=[];
        },

        addCliente(){
            if(this.clienteNew.nombre.trim()==='' || this.clienteNew.fono.trim()==='' || this.clienteNew.domicilio.trim()==='')
            {
                alert('Debe rellenar los campos antes de proseguir');
                return;
            }
            const params={nombre: this.clienteNew.nombre, fono: this.clienteNew.fono, domicilio: this.clienteNew.domicilio, depto: this.clienteNew.depto};
            //this.clienteNew={nombre:'',fono:'',domicilio:'',depto:''};
            axios.post('/addclientepedido',params).then(res =>{
                this.clientes.push(res.data);
                this.clientePedidoData=res.data;
                console.log(this.clientePedidoData.nombre);
                this.isClientePedidoExists=true;
                this.clientenuevo=true;
                this.optionCliente='';
            });

        },

        selectClienteLista()
        {
            if(this.clientePedidoId===0 || this.clientePedidoId==='')
            {
                alert("Debe seleccionar un cliente.");
                return;
            }
            else
            {
                const params={id:this.clientePedidoId};
                axios.post('/searchcliente',params).then(res =>{
                this.clientePedidoData=res.data;
                this.isClientePedidoExists=true;
                

            });

            }
            
        },

        calcularSubtotales()
        {
            for(var i=0; i<this.productosadd.length; i++)
            {
                this.subtotal[i]=this.productosadd[i].precio*this.cantidadAdd[i];
            }
           

        },



        addProducto(){
            this.productosadd=this.productosSeleccionados;
            this.cantidadAdd=this.cantidadSeleccionada;
            this.calcularSubtotales();
            //this.productosSeleccionados=[];
            this.cantidadSeleccionada=[];
            this.pedidoFinal=true;
           
        },

        createPedido(){
            /*creación del registro de pedido*/
            var data= {clienteId:'', estado:0, total:parseInt(0)};
            data.clienteId=this.clientePedidoData.id;
            data.total=parseInt(this.total);
            var idPedido=[];
            axios.post('/pedido/new/create',data).then(res =>{
                idPedido=res.data;
                 var dataContenido= {pedidoId:'', productoId:'', cantidad:0};
            


                /*creación de los contenidos del pedido*/              
                for(var i=0; i<this.productosadd.length; i++)
                {
                    dataContenido.pedidoId=idPedido.id;
                    dataContenido.productoId=this.productosadd[i].id;
                    dataContenido.cantidad=parseInt(this.cantidadAdd[i]);
                    axios.post('/pedido/new/create/addproducto',dataContenido).then(res =>{

                        
                        
                    });

                    axios.put('/pedido/new/stock/update',dataContenido).then(res =>{

                    });
                   
                    dataContenido= {pedidoId:'', productoId:'', cantidad:0};
                    
                }

                
               setTimeout(function(){window.location.href =`http://127.0.0.1:8000/pedido/detalle/${idPedido.id}`;},500);             
            });
        },
    }
}
</script>