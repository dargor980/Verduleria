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
        <div v-if="optionCliente==='existente' && isClientePedidoExists===false">
            <hr class="bg-light">
            <h3 class="text-white pl-4">Seleccione Cliente:</h3>
            <form @submit.prevent="selectClienteLista">
                <div class="row mt-3">
                    <div class="col-md-5"></div>
                    <div class="col-md-5 input-group md-form form-sm form-2 pl-0 my-3">
                        <input class="form-control my-0 py-1 line-border" type="text" placeholder="Buscar Cliente" name="searcha" v-model="searchCLIENTE">
                        <div class="input-group-append">
                            <span class="input-group-text lime lighten-2" id="basic-text1"><i class="fas fa-search text-grey"
                                aria-hidden="true"></i></span>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <div class="container productos">
                            <ul class="list-inline ml-5 pl-5">
                                <li class="list-inline-item col-md-5 my-1 p-0" v-for="(item,index) in clientes" :key="index">
                                    <div class="container-fluid cardproducto">
                                        <h6 class="mt-2">
                                            <input type="radio" v-model="clientePedidoData" :checked="checkcl" :value="item">
                                            {{item.nombre}}
                                        </h6>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                    <div class="container text-center">
                        <button class="btn btn-success mb-3 text-white" type="submit" :disabled="selectCliente">Seleccionar</button>
                        <button class="btn btn-success mb-3 text-white" @click="back"><i class="fas fa-arrow-left text-white"></i> Volver</button>
                    </div>
                </div>
            </form>
        </div>
        <!--/Cliente en lista-->

        <div v-if="isClientePedidoExists">
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
                            <input name='nombre' type="text" placeholder="Nombre del cliente" class="form-control" v-model="clientePedidoData.nombre" disabled>
                        </div>
                    </div>
                    <div class="col-md-5">

                        <div>
                            <input name='fono' type="text" placeholder="Ingrese número" class="form-control" v-model="clientePedidoData.fono" disabled>
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
                            <input name='domicilio' type="text" placeholder="Ingrese dirección" class="form-control" v-model="clientePedidoData.domicilio" disabled>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div>
                            <input name='depto' type="text" placeholder="Ingrese depto" class="form-control" v-model="clientePedidoData.depto" disabled>
                        </div>
                    </div>
                </div>
                <div class="text-center mt-3">
                    <button class="btn btn-success mb-3 text-white" @click="back"><i class="fas fa-arrow-left text-white"></i> Volver</button>
                </div>

        </div>

         <!--Selecciona Productos-->
        <div v-if="isClientePedidoExists">
            <hr class="bg-light">
            <form class="row mb-2"  @submit.prevent="">
                <div class="col-md-7">
                    <h3 class="text-white pl-4 my-3">Seleccione los productos:</h3>
                </div>
                <div class="col-md-5 input-group md-form form-sm form-2 pl-0 my-3">
                    <input class="form-control my-0 py-1 lime-border" type="text" placeholder="Buscar producto" name="search" v-model="search">
                    <div class="input-group-append">
                        <span class="input-group-text lime lighten-2" id="basic-text1"><i class="fas fa-search text-grey"
                            aria-hidden="true"></i></span>
                    </div>
                </div>
            </form>
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
                <div class="card table-responsive" id="prod">
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
                            <td class="pl-4"><a href="#prod" @click="spliceProductoSeleccionado(index)"><i class="fas fa-trash-alt text-danger"></i></a></td>
                            <td>{{item.nombre}}</td>
                            <td>{{item.precio}}</td>
                            <td>
                                <div class="row">
                                    <div class="col">
                                        <input type="number" min="0" :max="item.cantidad" class="form-control" placeholder="Cantidad" value=0 v-model="cantidadSeleccionada[index]">
                                    </div>
                                </div>
                            </td>
                            <td v-for="(med, medidas) in medidas" :key="medidas" v-show="med.id===item.medidaId">{{med.nombre}}</td>
                            <td v-for="(sub, subt) in subtotal" :key="subt" v-show="subt===index"><span v-if="cantidadSeleccionada[index]===undefined">{{sub=0}}</span> <span v-else>{{sub=cantidadSeleccionada[index]*item.precio}}</span></td>
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
                    <button class="btn btn-success mb-3 text-white" type="submit" data-toggle="modal" data-target="#seguro" @click="isCantidadNegativa"><i class="text-white"></i> Finalizar</button>
                </div>
            </form>
        </div>
        <!--/Tabla de productos agregados-->

        <!--Confirmación pedido-->
        <div class="modal fade" id="seguro" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" >
                    <h5 class="modal-title text-white" id="staticBackdropLabel">Finalizar Pedido</h5>
                    <button v-if="!spin" type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-white">
                    <div class="row">
                        <div class="col-md-4">
                            Método de pago:
                        </div>
                        <div class="col-md-8">
                            <select name='metodopago' class="custom-select" v-model="metodo_pago">
                                <option selected value="0">Seleccione método de pago:</option>
                                <option value="1">Efectivo</option>
                                <option value="2">Transferencia</option>
                                <option value="3">Tarjeta</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                    <button type="button" class="btn btn-success" @click="createPedido" v-if="!spin">Finalizar</button>
                    <button  type="button" class="btn btn-success" disabled v-else><span ><img src="/img/spinner.gif" alt="" style="width:25px; height:25px"></span>&nbsp; Registrando...</button>
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
            search:'',
            spin:false,
            metodo_pago:'',
            searchCLIENTE:'',



            /*variables de control */
            checked: false,
            checkcl:false,
            optionCliente:'',  //variable para controlar visualizacion de nuevo cliente o lista de clientes
            viewSeccionCliente: true,  //variable que muestra las opciones nuevo cliente o lista de clientes
            isClientePedidoExists: false,   //indica si ya se seleccionó el cliente que será asociado al pedido.
            pedidoFinal: false,  //variable que indica la visualizacion del pedidofinal.
            selectCliente:false,

        }
    },

    computed:{

         calcularTotal()
        {
            this.total=0;
            for(var i=0; i<this.cantidadSeleccionada.length;i++)
            {
                if(this.cantidadSeleccionada[i]===undefined)
                {

                }
                else
                {
                    this.total=parseInt(this.total)+this.cantidadSeleccionada[i]*this.productosSeleccionados[i].precio;
                    this.total= parseInt(this.total);
                    this.cantidadAdd[i]=this.cantidadSeleccionada[i];

                }

            }

            this.total= this.total- this.total%10;

            return this.total;

        },
        calcularSubtotales()
        {
            for(var i=0; i<this.productosadd.length; i++)
            {
                this.subtotal[i]=this.productosadd[i].precio*this.cantidadAdd[i];
            }


        },



    },

    watch:{
        search(nuevo,old){
            var param= {search:nuevo};
            axios.post('/pedido/search',param).then(res =>{
                this.productos=res.data;
            })

        },

        searchCLIENTE(nuevo,old){
            var param= {search:nuevo};
            axios.post('/pedido/cliente/search',param).then(res => {
                this.clientes=res.data;
            })

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
            this.selectCliente=false;
            this.viewSeccionCliente=true;
            this.optionCliente='';
            this.isClientePedidoExists=false;
            this.pedidoFinal=false;
            this.productosSeleccionados=[];
            this.cantidadSeleccionada=[];
            this.searchCLIENTE='';
            this.clientePedidoData=[];
        },

        addCliente(){
            if(this.clienteNew.nombre.trim()==='' || this.clienteNew.fono.trim()==='' || this.clienteNew.domicilio.trim()==='')
            {
                alert('Debe rellenar los campos antes de proseguir');
                return;
            }
            const params={nombre: this.clienteNew.nombre, fono: this.clienteNew.fono, domicilio: this.clienteNew.domicilio, depto: this.clienteNew.depto};

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
            this.isClientePedidoExists=true;

            this.clientePedidoId=this.clientePedidoData[0].id;
            const params={id:this.clientePedidoId};
            axios.post('/searchcliente',params).then(res =>{
                this.clientePedidoData=res.data;
                this.selectCliente=true;
            });

        },



        spliceProductoSeleccionado(index)
        {
            this.productosSeleccionados.splice(index,1);
            this.cantidadSeleccionada.splice(index,1);
        },



        addProducto(){
            this.productosadd=this.productosSeleccionados;
            this.cantidadAdd=this.cantidadSeleccionada;
            this.calcularSubtotales;
            this.pedidoFinal=true;

        },
        isCantidadNull()
        {
            for(var i=0; i<this.cantidadAdd.length; i++)
            {
                if(this.cantidadAdd[i]===undefined)
                {

                    return true;
                }
            }
            return false;
        },

        isCantidadNegativa()
        {
            for(var i=0; i<this.cantidadAdd.length; i++)
            {
                if(this.cantidadAdd[i]<0)
                {
                    alert('Advertencia: Ha ingresado un valor negativo.');
                }
            }
        },

        createPedido(){
            if(this.isCantidadNull())
            {
                alert('ha dejado producto(s) sin cantidad especificada. Ingrese la cantidad y vuelva a intentarlo.');
                return;
            }
            /creación del registro de pedido/
            if(this.metodo_pago.trim()==='' || this.metodo_pago==='0')
            {
                alert('seleccione un método de pago antes de continuar');
                return;
            }
            var data= {clienteId:'', estado:0, total:parseInt(0),metodopago:''};
            data.clienteId=this.clientePedidoData.id;
            data.total=parseInt(this.total);
            data.metodopago= this.metodo_pago;
            var idPedido=[];


            axios.post('/pedido/new/create',data).then(res =>{
                idPedido=res.data;
                 var dataContenido= {pedidoId:'', productoId:'', cantidad:0};
                 var pedidofinal=[];

                /creación de los contenidos del pedido/
                for(var i=0; i<this.productosadd.length; i++)
                {
                    dataContenido.pedidoId=idPedido.id;
                    dataContenido.productoId=this.productosadd[i].id;
                    dataContenido.cantidad=this.cantidadAdd[i];
                    pedidofinal.push(dataContenido);

                    dataContenido= {pedidoId:'', productoId:'', cantidad:0};
                }


                axios.post('/pedido/new/create/addproducto',pedidofinal).then(res =>{

                })

                axios.put('/pedido/new/stock/update',pedidofinal).then(res =>{

                });
            });
            this.spin=true;
            setTimeout(function(){window.location.href =`http://verduleria.santagemita.com/pedido/detalle/${idPedido.id}`;},5000);
        }
    },

}
</script>
