<template>
  <div>
    <v-app id="inspire" >
      <div v-if="logging">
         <v-navigation-drawer v-model="drawer" app>
        <v-list dense>
          <router-link :to="{ name: 'Home' }" class="text-decoration-none">
            <v-list-item link>
              <v-list-item-action>
                <v-icon>mdi-home</v-icon>
              </v-list-item-action>
              <v-list-item-content>
                <v-list-item-title>Home</v-list-item-title>
              </v-list-item-content>
            </v-list-item>
          </router-link>
          <router-link :to="{ name: 'Projects' }" class="text-decoration-none">
            <v-list-item link>
              <v-list-item-action>
                <v-icon>mdi-folder</v-icon>
              </v-list-item-action>
              <v-list-item-content>
                <v-list-item-title>Projects</v-list-item-title>
              </v-list-item-content>
            </v-list-item>
          </router-link>
          <v-list-group prepend-icon="mdi-account-circle">
            <template v-slot:activator>
              <v-list-item-title>Managements Users </v-list-item-title>
            </template>

            <v-list-item-group class="pl-10">
              <router-link :to="{ name: 'Users' }" class="text-decoration-none">
                <v-list-item link>
                  <v-list-item-action>
                    <v-icon>mdi-account-circle</v-icon>
                  </v-list-item-action>
                  <v-list-item-content>
                    <v-list-item-title>Users</v-list-item-title>
                  </v-list-item-content>
                </v-list-item>
              </router-link>
            </v-list-item-group>
          </v-list-group>
            <a href="/admin/logout" class="text-decoration-none">
            <v-list-item link>
              <v-list-item-action>
                <v-icon>mdi-logout</v-icon>
              </v-list-item-action>
              <v-list-item-content>
                <v-list-item-title>Logout</v-list-item-title>
              </v-list-item-content>
            </v-list-item>
          </a>
        </v-list>
      </v-navigation-drawer>

      <v-app-bar app color="blue darken-1" dark>
        <v-app-bar-nav-icon @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
        <v-toolbar-title>Application</v-toolbar-title>
      </v-app-bar>
       <v-footer color="blue darken-1" app>
        <span class="white--text">&copy; {{ new Date().getFullYear() }}</span>
      </v-footer>
      </div>
      <v-main>
        <v-container fluid>

          <router-view />
        </v-container>
      </v-main>
     
    </v-app>
  </div>
</template>

<script>
export default {
  data: () => ({
    drawer: null,
      logging: false,
  }),
 props: ['user'],
   created() {
     console.log(this.user);
      if(this.user!=false){
        this.logging=true;
      }
  },
  methods:{


  }
};
</script>
