<template>
  <section class="content">
    <div class="container-fluid">
        <div class="row">

          <div class="col-12">
        
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Seles List</h3>

                <!-- <div class="card-tools">
                  <form id="mainFormExel">
                    <div class="form-group">
                      <table class="table">
                        <tr>
                          <a style="margin: 5px" href="/api/product/export_excel/" class="btn btn-danger">Download</a>
                          <label class="btn btn-success" style="margin:5px">Select File
                            <input type="file" style="display:none" name="select_file" class="btn btn-danger">
                          </label>
                          <label class="btn btn-primary" style="margin:5px" onClick="window.location.reload();">Upload file
                            <input type="submit" style="display:none" name="upload" @click.prevent="saveExel" >
                          </label>
                        </tr>
                      </table>
                    </div>
                  </form>
                </div> -->
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Teritory</th>
                      <th>K Kontact</th>
                      <th>Supervisor</th>
                      <th>PS</th>
                      <th>Indeks</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(seles,index) in seles" :key="seles.id">

                      <td>{{index+1}}</td>
                      <td>{{ seles.nama }}</td>
                      <td>{{ seles.teritory }}</td>
                      <td>{{ seles.kontact }}</td>
                      <td>{{ seles.supervisor }}</td>
                      <td>11</td>
                      <td>20.4</td>
                      <!-- <td><img v-bind:src="'/' + product.photo" width="100" alt="product"></td> -->
                      <td>
                        
                        <router-link to="/products">
                            <i class="fa fa-eye blue"></i>
                        </router-link>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                  <pagination :data="products" @pagination-change-page="getResults"></pagination>
              </div>
            </div>
            <!-- /.card -->
          </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="addNew" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" v-show="!editmode">Create New Product</h5>
                    <h5 class="modal-title" v-show="editmode">Edit Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                
                </div>
            </div>
        </div>
    </div>
  </section>
</template>

<script>
    import VueTagsInput from '@johmun/vue-tags-input';
import axios from 'axios';

    export default {
      components: {
          VueTagsInput,
        },
        data () {
            return {
                editmode: false,
                seles : {},
                error: {},
                form: new Form({
                    id : '',
                    category : '',
                    name: '',
                    description: '',
                    tags:  [],
                    photo: '',
                    category_id: '',
                    price: '',
                    photoUrl: '',
                    input1:0,
                    input2:0,
                    hasil:0,

                }),

                // import_file: '',

                categories: [],
              
                tag:  '',
                autocompleteItems: [],
            }
        },
        methods: {

          getResults(page = 1) {

              this.$Progress.start();
              
              axios.get('api/seles?page=' + page).then(({ data }) => (this.seles = data.data));

              this.$Progress.finish();
          },

          kali() {
            this.hasil = parseInt(this.input1) * parseInt(this.input2)
          },
          saveExel(){
            var $mainFormExel = $('#mainFormExel')
            var data = new FormData(mainFormExel)
            axios.post('api/product/import_excel', data)
                  .then((res) => {
                    this.$Swal({
                      title: 'succes',
                      text: 'all data',
                      icon: 'succes',
                      confirmButtonText: 'cool'
                    });

                  })
          },


          loadSeles(){

            // if(this.$gate.isAdmin()){
              axios.get("api/seles").then(({ data }) => (this.seles = data.data));
            // }
            //   axios.get('api/product/export_excel')
            // .then(()=>{
            //     toast({
            //         type: 'success',
            //         title: 'Export the Data'
            //     })
            // })
            // .catch(()=> {
            //     toast({
            //             type: 'warning',
            //             title: 'Can not Export'
            //             })
            // })
          },
          loadProducts(){

            // if(this.$gate.isAdmin()){
              axios.get("api/product").then(({ data }) => (this.product = data.data));
            
          },
          loadCategories(){
              axios.get("/api/category/list").then(({ data }) => (this.categories = data.data));
          },
          loadTags(){
              axios.get("/api/tag/list").then(response => {
                  this.autocompleteItems = response.data.data.map(a => {
                      return { text: a.name, id: a.id };
                  });
              }).catch(() => console.warn('Oh. Something went wrong'));
          },
          editModal(product){
              this.editmode = true;
              this.form.reset();
              $('#addNew').modal('show');
              this.form.fill(product);
          },
          newModal(){
              this.editmode = false;
              this.form.reset();
              $('#addNew').modal('show');
          },
          createProduct(){
              this.$Progress.start();

              this.form.post('api/product/import_excel')
              .then((data)=>{
                if(data.data.success){
                  $('#addNew').modal('hide');

                  Toast.fire({
                        icon: 'success',
                        title: data.data.message
                    });
                  this.$Progress.finish();
                  this.loadProducts();

                } else {
                  Toast.fire({
                      icon: 'error',
                      title: 'Some error occured! Please try again'
                  });

                  this.$Progress.failed();
                }
              })
              .catch(()=>{

                  Toast.fire({
                      icon: 'error',
                      title: 'Some error occured! Please try again'
                  });
              })
          },
          updateProduct(){
              this.$Progress.start();
              this.form.put('api/product/'+this.form.id)
              .then((response) => {
                  // success
                  $('#addNew').modal('hide');
                  Toast.fire({
                    icon: 'success',
                    title: response.data.message
                  });
                  this.$Progress.finish();
                      //  Fire.$emit('AfterCreate');

                  this.loadProducts();
              })
              .catch(() => {
                  this.$Progress.fail();
              });

          },
          deleteProduct(id){
              Swal.fire({
                  title: 'Are you sure?',
                  text: "You won't be able to revert this!",
                  showCancelButton: true,
                  confirmButtonColor: '#d33',
                  cancelButtonColor: '#3085d6',
                  confirmButtonText: 'Yes, delete it!'
                  }).then((result) => {

                      // Send request to the server
                        if (result.value) {
                              this.form.delete('api/product/'+id).then(()=>{
                                      Swal.fire(
                                      'Deleted!',
                                      'Your file has been deleted.',
                                      'success'
                                      );
                                  // Fire.$emit('AfterCreate');
                                  this.loadProducts();
                              }).catch((data)=> {
                                  Swal.fire("Failed!", data.message, "warning");
                              });
                        }
                  })
          },

        },
        mounted() {
            
        },
        created() {
            this.$Progress.start();

            this.loadProducts();
            this.loadSeles();
            // this.proceedAction();
            // this.onFileChange(e);
            this.loadCategories();
            this.loadTags();

            this.$Progress.finish();
        },
        filters: {
            truncate: function (text, length, suffix) {
                return text.substring(0, length) + suffix;
            },
        },
        computed: {
          filteredItems() {
            return this.autocompleteItems.filter(i => {
              return i.text.toLowerCase().indexOf(this.tag.toLowerCase()) !== -1;
            });
          },
        },
    }
</script>
