<template>
  <v-data-table
  dense
    :headers="headers"
    :items="items"
    class="elevation-1"
    :loading="loadingTable"
    loading-text="Loading... Please wait"
  >
    <template v-slot:top>
      <v-toolbar flat>
        <v-toolbar-title>Projects</v-toolbar-title>
        <v-divider class="mx-4" inset vertical></v-divider>
        <v-spacer></v-spacer>
        <v-dialog v-model="dialog" max-width="1200px">
          <template v-slot:activator="{ on, attrs }">
            <v-btn color="primary" dark class="mb-2" v-bind="attrs" v-on="on">
              New Item
            </v-btn>
          </template>
          <v-card>
            <v-card-title>
              <span class="headline">{{ formTitle }}</span>
            </v-card-title>

            <v-card-text>
              <v-container>
                <v-file-input
                  accept="image/*"
                  label="File input"
                  @change="handleImage"
                ></v-file-input>
                <img
                  id="blah"
                  :src="'/storage/' + item.image"
                  v-if="item.image"
                  width="40 px"
                  height="40px"
                />

                <!--   <img id="blah" src="http://placehold.it/180" alt="your image" width="40 px" height="40px"/> -->

                <v-text-field
                  v-model="item.libelle"
                  label="Libelle"
                ></v-text-field>

                <quill-editor
                style="height: 250px;max-height: 250px; margin-bottom: 73px;"
                  v-model="item.description"
               
                  :auto-height="false"
                  
                />
                
                <v-autocomplete
                  :items="types"
                  item-text="libelle"
                  item-value="id"
                  label="Types"
                  return-object
                  v-model="item.type"
                ></v-autocomplete>
              </v-container>
            </v-card-text>

            <v-card-actions>
              <v-spacer></v-spacer>
              <v-btn color="blue darken-1" text @click="close"> Cancel </v-btn>
              <v-btn color="blue darken-1" text @click="save"> Save </v-btn>
            </v-card-actions>
          </v-card>
        </v-dialog>
        <v-dialog v-model="dialogDelete" max-width="500px">
          <v-card>
            <v-card-title class="headline"
              >Are you sure you want to delete this item?</v-card-title
            >
            <v-card-actions>
              <v-spacer></v-spacer>
              <v-btn color="blue darken-1" text @click="closeDelete"
                >Cancel</v-btn
              >
              <v-btn color="blue darken-1" text @click="deleteItemConfirm"
                >OK</v-btn
              >
              <v-spacer></v-spacer>
            </v-card-actions>
          </v-card>
        </v-dialog>
      </v-toolbar>
    </template>
    <template v-slot:item.actions="{ item }">
      <v-icon small class="mr-2" @click="editItem(item)"> mdi-pencil </v-icon>
      <v-icon small @click="deleteItem(item)"> mdi-delete </v-icon>
    </template>
    <template v-slot:item.image="{ item }">
      <img :src="'/storage/' + item.image" width="40 px" height="40px" />
    </template>
    <template v-slot:item.description="{ item }">
   
        <div  v-html="item.description " v-if="item.description.length<100"></div>
        <div   v-else  v-html="item.description.substring(0,100)+'...'"></div>
    </template>



    <template v-slot:no-data>
      <v-btn color="primary" @click="initialize"> Reset </v-btn>
    </template>
  </v-data-table>
</template>
<script>
import 'quill/dist/quill.snow.css'
import { quillEditor } from 'vue-quill-editor'
export default {
  components: {
		quillEditor
	},
  data: () => ({
    loadingTable: false,
    dialog: false,
    dialogDelete: false,
    headers: [
      {
        text: "image",
        align: "center",
        value: "image",
      },
      {  text: "libelle", value: "libelle" },
      {  text: "description", value: "description" , class:"ok"},
      {  text: "type", value: "type.libelle" },
      {  text: "Actions", value: "actions", sortable: false },
    ],
    items: [],
    types: [],
    editedIndex: -1,
    item: {
      image: null,
      libelle: "",
      description: "",
      type_id: 0,
      type: {
        id: 0,
        libelle: "",
      },
    },
    defaultItem: {
      image: null,
      libelle: "",
      description: "",
      type_id: 0,
      type: {
        id: 0,
        libelle: "",
      },
    },
  }),

  computed: {
    formTitle() {
      return this.editedIndex === -1 ? "New Item" : "Edit Item";
    },
  },
  watch: {
    dialog(val) {
      val || this.close();
    },
    dialogDelete(val) {
      val || this.closeDelete();
    },
  },

  created() {
    this.initialize();
  },

  methods: {
    async initialize() {
      this.loadingTable = true;

      const [res, resType] = await Promise.all([
        this.callApi("get", "/api/projects"),
        this.callApi("get", "/api/types"),
      ]);
      if (res.status === 200) {
        this.items = res.data;
        console.log(this.items);
      }

      this.loadingTable = false;

      if (resType.status === 200) {
        this.types = resType.data;
      }
    },

    editItem(item) {
      this.editedIndex = this.items.indexOf(item);
      this.item = Object.assign({}, item);
      this.dialog = true;
    },

    deleteItem(item) {
      this.editedIndex = this.items.indexOf(item);
      this.item = Object.assign({}, item);
      this.dialogDelete = true;
    },

    async deleteItemConfirm() {

       const res = await this.callApi("delete", "/api/projects/"+this.item.id);
				if(res.status===200){
				  this.items.splice(this.editedIndex, 1);
          this.closeDelete();
					/* this.makeAlert('success','tag successfully deleted'); */
				}else{
					/* this.makeAlert('danger','something wrong'); */
				}

    
    },

    close() {
      this.dialog = false;
      this.$nextTick(() => {
        this.item = Object.assign({}, this.defaultItem);
        this.editedIndex = -1;
      });
    },

    closeDelete() {
      this.dialogDelete = false;
      this.$nextTick(() => {
        this.item = Object.assign({}, this.defaultItem);
        this.editedIndex = -1;
      });
    },

    handleImage(file) {
      this.item.image = file;

      //preview image before upload
      if (file) {
        var reader = new FileReader();
        reader.onload = function (e) {
          $("#blah").attr("src", e.target.result);
        };
        reader.readAsDataURL(file);
      }
    },

    async save() {
      if (this.editedIndex > -1) {

         this.item.type_id = this.item.type.id;
        
        const formData = new FormData();
        formData.append("image", this.item.image);
        formData.append("libelle", this.item.libelle);
        formData.append("description", this.item.description);
        formData.append("type_id", this.item.type_id);
        formData.append("_method", "put");
        const res = await this.callApi("post", "/api/projects/"+this.item.id, formData);

        if (res.status === 200) {
          // get the path of image from Back-end
          this.item.image = res.data.image;
          Object.assign(this.items[this.editedIndex], this.item);
          
          this.close();
        } else {
          if (res.status == 422) {
            for (let i in res.data.errors) {
              /*  this.makeAlert('danger',res.data.errors[i][0]); */
            }
          } else {
            /* this.makeAlert('danger','something wrong'); */
          }
        }

        
      } else {

        this.item.type_id = this.item.type.id;

        const formData = new FormData();
        formData.append("image", this.item.image);
        formData.append("libelle", this.item.libelle);
        formData.append("description", this.item.description);
        formData.append("type_id", this.item.type_id);

        const res = await this.callApi("post", "/api/projects", formData);

        if (res.status === 201) {
          // get the path of image from Back-end
          this.item.image = res.data.image;
          this.item.id = res.data.id;
          this.items.unshift(this.item);
          this.close();
        } else {
          if (res.status == 422) {
            for (let i in res.data.errors) {
              /*  this.makeAlert('danger',res.data.errors[i][0]); */
            }
          } else {
            /* this.makeAlert('danger','something wrong'); */
          }
        }
      }
    },
  },
};
</script>

<style scoped>
/deep/ .theme--light.v-data-table > .v-data-table__wrapper > table > tbody > tr:not(:last-child) > td:not(.v-data-table__mobile-row) {
    background: red;
}

.theme--light.v-data-table > .v-data-table__wrapper > table > tbody > tr:not(:last-child) > td:not(.v-data-table__mobile-row)
{
 width: min-content;
}
.theme--light.v-data-table--dense tr { height: 30px; }
  .text-start{
   
  }

  .ok{
    color: red;
  }
</style>