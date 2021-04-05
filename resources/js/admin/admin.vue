<template>
  <v-app id="inspire">
    <v-app id="inspire">
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
           <v-list-group

           
                prepend-icon="mdi-account-circle"
            >
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


        </v-list>
      </v-navigation-drawer>

      <v-app-bar app color="blue darken-1" dark>
        <v-app-bar-nav-icon @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
        <v-toolbar-title>Application</v-toolbar-title>
      </v-app-bar>

      <v-main>
        <v-container fluid>
          <!-- <v-row align="center" justify="center">
            <v-col class="text-center">
              <v-tooltip left>
                <template v-slot:activator="{ on }">
                  <v-btn :href="source" icon large target="_blank" v-on="on">
                    <v-icon large>mdi-code-tags</v-icon>
                  </v-btn>
                </template>
                <span>Source</span>
              </v-tooltip>
            </v-col>
          </v-row> -->
          <router-view />
        </v-container>
      </v-main>
      <v-footer color="blue darken-1" app>
        <span class="white--text">&copy; {{ new Date().getFullYear() }}</span>
      </v-footer>
    </v-app>
  </v-app>
</template>

<script>
export default {
  data: () => ({ drawer: null }),
  props: {
    source: String,
  },
};
</script>