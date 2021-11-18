<template>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Table List</h3>

              <div class="card-tools">
                <form id="mainFormExel">
                  <div class="form-group">
                    <table class="table">
                      <tr>
                        <a
                          style="margin: 5px"
                          href="/api/empatbelas/export_excel/"
                          class="btn btn-danger"
                          >Download</a
                        >
                        <label class="btn btn-success" style="margin: 5px"
                          >Select File
                          <input
                            type="file"
                            style="display: none"
                            name="select_file"
                            class="btn btn-danger"
                          />
                        </label>
                        <label
                          class="btn btn-primary"
                          style="margin: 5px"
                          onClick="window.location.reload();"
                          >Upload file
                          <input
                            type="submit"
                            style="display: none"
                            name="upload"
                            @click.prevent="saveExel"
                          />
                        </label>
                      </tr>
                    </table>
                  </div>
                </form>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Pelanggan</th>
                    <th>No Inetrn</th>
                    <th>kcontact</th>
                    <th>kecepatan</th>
                    <th>deskripsi Paket</th>
                    <th>Indeks</th>
                    <th>Jumlah Paket</th>
                    <th>Total Indeks</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="(product, index) in products" :key="product.id">
                    <td>{{ index + 1 }}</td>
                    <td>{{ product.nama }}</td>
                    <td>{{ product.no_inetrn }}</td>
                    <td>{{ product.kcontact }}</td>
                    <td>{{ product.kecepatan }}</td>
                    <td>{{ product.description }}</td>
                    <td class="input1">{{ product.indeks }}</td>
                    <td class="input2">{{ product.jumlah }}</td>
                    <td>{{ product.total }}</td>
                    <!-- <td><img v-bind:src="'/' + product.photo" width="100" alt="product"></td> -->
                    <td>
                      <!-- <a href="#" @click="editModal(product)">
                            <i class="fa fa-edit blue"></i>
                        </a>
                        / -->
                      <a href="#" @click="deleteProduct(product.id)">
                        <i class="fa fa-trash red"></i>
                      </a>
                    </td>
                  </tr>
                  <tr class="text-danger font-weight-bold">
                    <td>Total:</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>{{ sumField("jumlah") }}</td>
                    <td>{{ sumField("total") }}</td>
                    <td></td>
                  </tr>
                </tbody>
                <tfoot>
                  <tr>
                    <!-- <td>abd</td> -->
                  </tr>
                </tfoot>
              </table>
            </div>
            <!-- <div>Hasil : {{ products.jumlah }}</div> -->
            <!-- /.card-body -->
            <div class="card-footer">
              <pagination
                :data="products"
                @pagination-change-page="getResults"
              ></pagination>
            </div>
          </div>
          <!-- /.card -->
        </div>
      </div>

      <!-- Modal -->
      <div
        class="modal fade"
        id="addNew"
        tabindex="-1"
        role="dialog"
        aria-labelledby="addNew"
        aria-hidden="true"
      >
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
import VueTagsInput from "@johmun/vue-tags-input";
import axios from "axios";
// import {onMounted, ref} from 'vue'

export default {
  components: {
    VueTagsInput,
  },
  data() {
    return {
      editmode: false,
      products: [],
      // indeks : 'products.indeks',
      // jumlah : 'products.jumlah',
      // priceLoc: localStorage.getItem('indeks'), //46.10€
      // nombredejours : localStorage.getItem('jumlah'),
      error: {},
      form: new Form({
        id: "",
        category: "",
        name: "",
        description: "",
        tags: [],
        photo: "",
        category_id: "",
        price: "",
        photoUrl: "",
        input1: 0,
        input2: 0,
        hasil: 0,
      }),

      // import_file: '',

      categories: [],

      tag: "",
      total: 0,
      autocompleteItems: [],
      kali: null,
    };
  },
  created() {
    console.log(products);
  },
  methods: {
    getResults(page = 1) {
      this.$Progress.start();

      axios
        .get("api/product?page=" + page)
        .then(({ data }) => (this.products = data.data));

      this.$Progress.finish();
    },

    sumField(key) {
      // sum data in give key (property)
      return this.products.reduce((a, b) => a + (b[key] || 0), 0);
    },

    // multiply() {
    //   axios.get("api/product/multiply").then(({ data }) => (this.kali = data));
    // },
    saveExel() {
      var $mainFormExel = $("#mainFormExel");
      var data = new FormData(mainFormExel);
      axios.post("api/empatbelas/import_excel", data).then((res) => {
        this.$Swal({
          title: "succes",
          text: "all data",
          icon: "succes",
          confirmButtonText: "cool",
        });
      });
    },

    loadProducts() {
      // if(this.$gate.isAdmin()){
      axios.get("api/empatbelas").then(
        (data) =>
          (this.products = data.data.data.map((dat) => ({
            ...dat,
            total: dat.indeks * dat.jumlah,
          })))
      );
      axios.get("api/empatbelas/export_excel");
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
    loadCategories() {
      axios.get("/api/category/list").then(({ data }) => (this.categories = data.data));
    },
    // loadTags(){
    //     axios.get("/api/tag/list").then(response => {
    //         this.autocompleteItems = response.data.data.map(a => {
    //             return { text: a.name, id: a.id };
    //         });
    //     }).catch(() => console.warn('Oh. Something went wrong'));
    // },
    editModal(product) {
      this.editmode = true;
      this.form.reset();
      $("#addNew").modal("show");
      this.form.fill(product);
    },
    newModal() {
      this.editmode = false;
      this.form.reset();
      $("#addNew").modal("show");
    },
    createProduct() {
      this.$Progress.start();

      this.form
        .post("api/product/import_excel")
        .then((data) => {
          if (data.data.success) {
            $("#addNew").modal("hide");

            Toast.fire({
              icon: "success",
              title: data.data.message,
            });
            this.$Progress.finish();
            this.loadProducts();
          } else {
            Toast.fire({
              icon: "error",
              title: "Some error occured! Please try again",
            });

            this.$Progress.failed();
          }
        })
        .catch(() => {
          Toast.fire({
            icon: "error",
            title: "Some error occured! Please try again",
          });
        });
    },
    updateProduct() {
      this.$Progress.start();
      this.form
        .put("api/product/" + this.form.id)
        .then((response) => {
          // success
          $("#addNew").modal("hide");
          Toast.fire({
            icon: "success",
            title: response.data.message,
          });
          this.$Progress.finish();
          //  Fire.$emit('AfterCreate');

          this.loadProducts();
        })
        .catch(() => {
          this.$Progress.fail();
        });
    },
    deleteProduct(id) {
      Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        confirmButtonText: "Yes, delete it!",
      }).then((result) => {
        // Send request to the server
        if (result.value) {
          this.form
            .delete("api/empatbelas/" + id)
            .then(() => {
              Swal.fire("Deleted!", "Your file has been deleted.", "success");
              // Fire.$emit('AfterCreate');
              this.loadProducts();
            })
            .catch((data) => {
              Swal.fire("Failed!", data.message, "warning");
            });
        }
      });
    },
  },
  mounted() {},
  created() {
    this.$Progress.start();
    // this.kali();
    // this.multiply();

    this.loadProducts();
    // this.proceedAction();
    // this.onFileChange(e);
    // this.loadCategories();
    this.loadTags();

    this.$Progress.finish();
  },
  filters: {
    truncate: function (text, length, suffix) {
      return text.substring(0, length) + suffix;
    },
  },
  computed: {
    perkalian() {
      return this.firstNumber * this.secondNumber;
    },
    filteredItems() {
      return this.autocompleteItems.filter((i) => {
        return i.text.toLowerCase().indexOf(this.tag.toLowerCase()) !== -1;
      });
    },
    totalJourPrice() {
      // axios.get("api/product").then(({ data }) => (this.products = data.data));
      axios.get("api/product");
      return products.indeks * products.jumlah;
    },
  },
};
</script>
