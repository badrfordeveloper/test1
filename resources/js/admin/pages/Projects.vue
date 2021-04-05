<template>
  <v-data-table :headers="headers" :items="items" class="elevation-1">
    <template v-slot:top>
      <v-toolbar flat>
        <v-toolbar-title>Projects</v-toolbar-title>
        <v-divider class="mx-4" inset vertical></v-divider>
        <v-spacer></v-spacer>
        <v-dialog v-model="dialog" max-width="500px">
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

                <v-text-field
                  v-model="item.libelle"
                  label="Libelle"
                ></v-text-field>

                <v-text-field
                  v-model="item.description"
                  label="Description"
                ></v-text-field>

                <v-text-field
                  v-model="item.type_id"
                  label="Type"
                ></v-text-field>
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
    <template v-slot:no-data>
      <v-btn color="primary" @click="initialize"> Reset </v-btn>
    </template>
  </v-data-table>
</template>
<script>
export default {
  data: () => ({
    dialog: false,
    dialogDelete: false,
    headers: [
      {
        text: "image",
        align: "start",
        value: "image",
      },
      { text: "libelle", value: "libelle" },
      { text: "description", value: "description" },
      { text: "type", value: "type_id" },
      { text: "Actions", value: "actions", sortable: false },
    ],
    items: [],
    types: [],
    editedIndex: -1,
    item: {
      image: "",
      libelle: "",
      description: "",
      type_id: 0,
    },
    defaultItem: {
      image: "",
      libelle: "",
      description: "",
      type_id: 0,
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

      const [res, resType] = await Promise.all([
			this.callApi("get", "/api/projects"), 
			this.callApi("get", "/api/types")
		])
      if (res.status === 200) {
        this.items = res.data;
      }

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

    deleteItemConfirm() {
      this.items.splice(this.editedIndex, 1);
      this.closeDelete();
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
    },

    async save() {
      if (this.editedIndex > -1) {
        Object.assign(this.items[this.editedIndex], this.item);
      } else {
        const formData = new FormData();
        formData.append("image", this.item.image);
        formData.append("libelle", this.item.libelle);
        formData.append("description", this.item.description);
        formData.append("type_id", this.item.type_id);

        console.log(this.item);

        /*   const res = await this.callApi('post', '/api/projects', this.item)
         */
        const res = "";
        if (res.status === 201) {
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