<template>
	<div class="contact">

    <!--====================================================
                          CONTACT
    ======================================================-->       
      <section class="resume-section p-3 p-lg-5 d-flex flex-column">
          <div class="row my-auto" id="contact"> 
            <div class="col-md-8">
              <div class="contact-cont">
                <h3>N'hésitez pas à me contacter</h3>
                <div class="heading-border-light"></div>
                <p>Vous recherchez un développeur créatif et spécial qui travaille avec de nouveaux outils de Web, et prêt pour des nouveaux challenges et idées, N'hésitez pas à me contacter</p>
              </div>   
              <div class="row con-form">

                <form id="form" @submit.prevent="sendForm" style="width: 100%;">
                    <div class="col-md-12">
                      <input type="text" name="name" v-model="obj.name" placeholder="Full Name" class="form-control" >
                    </div>
                    <div class="col-md-12">
                      <input type="text" name="email" v-model="obj.email" placeholder="Email Id" class="form-control" >
                    </div>
                    <div class="col-md-12">
                      <input type="text" name="subject"  v-model="obj.subject" placeholder="Subject" class="form-control" >
                    </div>
                    <div class="col-md-12">
                      <textarea name="body" v-model="obj.body"  id="" ></textarea>
                    </div>

                    <div class="col-md-12 sub-but">
                      <button class="btn btn-general btn-white" role="button" type="submit" >Send</button>
                    </div>

                  </form>

              </div>
            </div>
            <div class="col-md-4 col-sm-12 mt-5"> 
              <div class="contact-cont2"> 
                <div class="contact-add contact-box-desc">
                  <h3><i class="fa fa-map-marker cl-atlantis "></i> Adresse</h3>
                  <p>Al-baraka , Casablanca <br></p>
                </div>
                <div class="contact-phone contact-side-desc contact-box-desc">
                  <h3><i class="fa fa-phone cl-atlantis "></i> Phone</h3>
                  <p>+212615564741</p>
                </div>
                <div class="contact-mail contact-side-desc contact-box-desc">
                  <h3><i class="fas fa-envelope cl-atlantis"></i> Email</h3>
                <address class="address-details-f"> 
                  Email: <a href="mailto:info@themsbit.com" class="">mrbadrjeddab@gmail.com</a>
                </address>
                <ul class="list-inline social-icon-f top-data">
                  <li><a href="#" target="_empty"><i class="fab top-social fa-facebook-f" style="color: #4267b2; border-color:#4267b2;"></i></a></li>
                  <li><a href="#" target="_empty"><i class="fab top-social fa-twitter" style="color: #4AB3F4; border-color:#4AB3F4;"></i></a></li>
                  <li><a href="#" target="_empty"><i class="fab top-social fa-google-plus-g" style="color: #e24343; border-color:#e24343;"></i></a></li> 
                </ul>
                </div>
              </div>
            </div> 
          </div>
      </section>

    </div>
	</div>
</template>
<script>
	   export default {

        data(){
          return{
            obj :{
              name:'',
              email:'',
              subject : '',
              body : ''
            },
          }
        },
        methods:{

          async sendForm(){
            console.log(this.obj);
                  if(this.obj.name.trim()=='') {
                      return this.makeAlert('danger','the Tag Name is empty');
                  }
                  else if (this.obj.email.trim()=='') {
                      return this.makeAlert('danger','the email is empty');
                  }
                  else if (this.obj.subject.trim()=='') {
                      return this.makeAlert('danger','the subject is empty');
                  }
                  else if (this.obj.body.trim()=='') {
                      return this.makeAlert('danger','the body is empty');
                  }else{

                   const res = await this.callApi('post', '/add_contact', this.obj)
                    if(res.status===200){
                      this.makeAlert('success','Your message has been received successfully ');

                      this.resetForm();
                    }else{
                      if(res.status==422){
                        if(res.data.errors.name){
                          this.makeAlert('danger',res.data.errors.name[0]);
                        }
                        if(res.data.errors.email){
                          this.makeAlert('danger',res.data.errors.email[0]);
                        }
                        if(res.data.errors.subject){
                          this.makeAlert('danger',res.data.errors.subject[0]);
                        }
                        if(res.data.errors.body){
                          this.makeAlert('danger',res.data.errors.body[0]);
                        }
                      }else{
                        this.makeAlert('danger','something wrong');
                      }
                    }
                  }
          },

          resetForm(){
            let obj2 ={
              name:'',
              email:'',
              subject : '',
              body : ''
            };

            this.obj=obj2;
          }
         
        }
      
  }
</script>
<style>
  .contact{
    text-align: center;
  }
</style>