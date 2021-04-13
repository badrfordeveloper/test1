<template>
  <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="portfolio">
    <div class="row my-auto">
      <div class="col-12">
        <h2 class="text-center">Portfolio</h2>
        <div class="mb-5 heading-border"></div>
      </div>
<!--       <div class="col-md-12">
        <div class="port-head-cont">
          <button
            class="btn btn-general btn-green filter-b"
            data-mixitup-control
            data-filter="all"
          >
            TOUS
          </button>
          <button
            class="btn btn-general btn-green filter-b"
            data-mixitup-control
            data-filter=".application"
          >
            APPLICATION WEB
          </button>
          <button
            class="btn btn-general btn-green filter-b"
            data-mixitup-control
            data-filter=".vitrine"
          >
            VITRINE
          </button>
          <button
            class="btn btn-general btn-green filter-b"
            data-mixitup-control
            data-filter=".ecommerce"
          >
            E-COMMERCE
          </button>
        </div>
      </div> -->
    </div>



 <div class="container row my-auto">

      <div v-if="items.length"  v-for="(item, i) in items" :key="i"  class="mix application col-sm-4 portfolio-item filter finance" v-bind:class="item.type.libelle">
        <a class="portfolio-link" href="#portfolioModal4"  @click="showDialog(item)">
          <div class="caption-port">
            <div class="caption-port-content">
              <i class="fa fa-search-plus fa-3x"></i>
            </div>
          </div>
          <img class="img-fluid" :src="'/storage/' + item.image"  alt="" />
        </a>
      </div>
 </div>



    <b-modal id="bv-modal-example" scrollable  size="xl" centered  hide-footer>
    <template #modal-title>
         <div class="mx-auto">
          <h3>{{ item.libelle}}</h3>
           
         </div>
    </template>
    <div class="row">
        <div class="col-sm">
            <img class="img-fluid" :src="'/storage/' + item.image"  alt="" />
        </div>
        <div class="col-sm">
            <p>
              Type : {{ item.type.libelle}}
            </p>
            <p  v-html="item.description ">
            </p>
        </div>
    </div>
   
  </b-modal>

  </section>
</template>

<script>
/* import mixitup from "mixitup"; */

export default {
    data: () => ({
       
    loadingTable: false,
    dialog: false,
    items: [],
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
    }),

    created() {
    this.initialize();

  },
  methods:{

    async initialize() {
      this.loadingTable = true;

       const res = await this.callApi("get", "/api/projects")
        if(res.status===200){

          
        this.items=res.data; 

        }
      this.loadingTable = false;
    },
    showDialog(item){

        this.item=item;
        this.$bvModal.show('bv-modal-example');
    }
  },
};
</script>

<style scoped>

/deep/ .modal-xl {
    max-width: 1753px;
}
/deep/ .modal-title {
    width: 100%;
    text-align: center;
}
.kunk-logo {
  width: 12.5rem;
}
.logo_kunkalabs-glyph__light {
  fill: #5ecdde;
}
.logo_kunkalabs-glyph__dark {
  fill: #27aabe;
}
.logo_kunkalabs-glyph__light {
  fill: #5ecdde;
}
.logo_kunkalabs-glyph__shadow {
  fill: #249bad;
}
/*#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #222222;
  margin-top: 20px;
}
html,
body {
  height: 100%;
  background: #f2f2f2;
}*/
.vue-logo {
  width: 150px;
  max-width: 100%;
  height: auto;
}
*,
*:before,
*:after {
  box-sizing: border-box;
}

/* Controls
---------------------------------------------------------------------- */

.controls {
  padding: 1rem;
  background: #333;
  font-size: 0.1px;
}

.control {
  position: relative;
  display: inline-block;
  width: 2.7rem;
  height: 2.7rem;
  background: #444;
  cursor: pointer;
  font-size: 0.1px;
  color: white;
  transition: background 150ms;
}

.control:hover {
  background: #3f3f3f;
}

.control[data-filter]:after {
  content: "";
  position: absolute;
  width: 10px;
  height: 10px;
  top: calc(50% - 6px);
  left: calc(50% - 6px);
  border: 2px solid currentColor;
  border-radius: 2px;
  background: currentColor;
  transition: background-color 150ms, border-color 150ms;
}

.control[data-sort]:after {
  content: "";
  position: absolute;
  width: 10px;
  height: 10px;
  border-top: 2px solid;
  border-left: 2px solid;
  top: calc(50% - 6px);
  left: calc(50% - 6px);
  transform: translateY(1px) rotate(45deg);
}

.control[data-sort*=":desc"]:after {
  transform: translateY(-4px) rotate(-135deg);
}

.mixitup-control-active {
  background: #2196f3;
  color: white;
}

.mixitup-control-active[data-filter]:after {
  background: transparent;
}

.control:first-of-type {
  border-radius: 3px 0 0 3px;
}

.control:last-of-type {
  border-radius: 0 3px 3px 0;
}

.control[data-filter] + .control[data-sort] {
  margin-left: 0.75rem;
}

.control[data-filter=".vitrine"] {
  color: #91e6c7;
}

.control[data-filter=".catalogue"] {
  color: #5ecdde;
}

.control[data-filter=".pink"] {
  color: #d595aa;
}

.control[data-filter="none"] {
  color: #2f2f2f;
}

/* Container
---------------------------------------------------------------------- */

.container {
  padding: 1rem;
  text-align: justify;
  font-size: 0.1px;
}

.container:after {
  content: "";
  display: inline-block;
  width: 100%;
}

.container {
  max-width: 100%;
}
/* Target Elements
---------------------------------------------------------------------- */

/*.mix,
.gap {
    display: inline-block;
    vertical-align: top;
}

.mix {
    background: #fff;
    border-top: .5rem solid currentColor;
    border-radius: 2px;
    margin-bottom: 1rem;
    position: relative;
}*/

/*.mix:before {
    content: '';
    display: inline-block;
    padding-top: 56.25%;
}*/

.mix.green {
  color: #91e6c7;
}

.mix.pink {
  color: #d595aa;
}

.mix.catalogue {
  color: #5ecdde;
}
.portfolio-link {
  height: 430px;
  overflow: hidden;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
/* Grid Breakpoints
---------------------------------------------------------------------- */

/* 2 Columns */

/*.mix,
.gap {
    width: calc(100%/2 - (((2 - 1) * 1rem) / 2));
}*/

/* 3 Columns */

/*@media screen and (min-width: 541px) {
    .mix,
    .gap {
        width: calc(100%/3 - (((3 - 1) * 1rem) / 3));
    }
}*/

/* 4 Columns */

/*@media screen and (min-width: 961px) {
    .mix,
    .gap {
        width: calc(100%/4 - (((4 - 1) * 1rem) / 4));
    }
}*/

/* 5 Columns */

/*@media screen and (min-width: 1281px) {
    .mix,
    .gap {
        width: calc(100%/5 - (((5 - 1) * 1rem) / 5));
    }
}*/
</style>
