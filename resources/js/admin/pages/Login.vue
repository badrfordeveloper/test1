<template>

<v-container fluid fill-height>
          <v-layout align-center justify-center>
            <v-flex xs12 sm8 md3>
              <v-card class="elevation-12">
                <v-toolbar color="primary" dark flat>
                  <v-toolbar-title>Login form</v-toolbar-title>
                </v-toolbar>
                <v-card-text>
                  <v-form>
                    <v-text-field
                      v-model="obj.email"
                      label="email"
                      type="text"
                    ></v-text-field>

                    <v-text-field
                      v-model="obj.password"
                      id="password"
                      label="Password"
                      name="password"
                      type="password"
                    ></v-text-field>
                  </v-form>
                </v-card-text>
                <v-card-actions class="justify-center">
                  <v-btn color="primary" @click="login">Login</v-btn>
                </v-card-actions>
              </v-card>
            </v-flex>
          </v-layout>
        </v-container>
    
</template>
<script>

export default {
    data: () => ({
        logging: false,
        obj : {
                    email : '', 
                    password: ''
                }
        
    }),

    methods :{
        
     async login(){
          console.log(this.obj.email);
       /*    if(this.obj.email.trim()=='') return this.makeAlert('danger','the email is empty');
          if(this.obj.password.trim()=='') return this.makeAlert('danger','the password is empty');
          if(this.obj.password.length < 6) return this.makeAlert('danger','the password is short'); 
          this.isLogging = true*/
          const res = await this.callApi('post', '/login', this.obj)
          if(res.status===200){
              /* this.makeAlert('success','you login'); */
    
           window.location = '/admin/login'
          }else{
              if(res.status===401){
                 /*  this.makeAlert('danger',res.data.msg); */
              }else if(res.status==422){
                  for(let i in res.data.errors){
                      /* this.makeAlert('danger',res.data.errors[i][0]); */
                  }
              }
              else{
                 /*  this.makeAlert('danger','somthing wrong'); */
              }
          }
         /*  this.isLogging = false */
      }
    }

}
</script>
