<!--  <template>
  <div class="container">
    <button class="btn btn-primary ml-4" @click="followUser" v-text="buttonText"></button>
  </div>
</template>

<script>
export default {
    props:[
        'userId',
        'follows'
    ],
  mounted() {
    console.log("Component mounted.");
  },
  data:function (){
    return{
      status: this.follows
    }
  },
  methods: {
    followUser() {
      axios.post('/follow/'+this.userId).then(response => 
      {
        this.status = !this.status;
      }).catch(errors=>{
          if(errors.response.status==401){
            window.location='/login'; //ako korisnik nije ulogovan, vracamo ga na login
          }
      });
    },
  },
  computed:{
    buttonText(){
      return (this.status) ? 'Unfollow' : 'Follow';
    }
  }
};
</script>
-->
<template>
    <div>
        <button class="btn btn-primary ml-4" @click="followUser" v-text="buttonText"></button>
    </div>
</template>

<script>
    export default {
        props:[
          'userId','follows'
        ],
        mounted() {
            console.log('Component mounted.')
        },
        data: function () {
            return {
                status: this.follows, //follows prosledjujemo sa index.blade.php i on nosi info o tome da li ulogovani korisnik prati profil sa datim ID-em
            }
        },
        methods: {
            followUser() {
               axios.post('/follow/'+this.userId).then(response => { // then ako je successful
                 this.status=!this.status; // da bi se uvek update-ovalo dugme sa follow na unfollow
               }).catch(errors => {
                 if(errors.response.status ==401){
                   window.location='/login';
                 }
               })
            }
        },
        computed: {
            buttonText() {
                return (this.status) ? 'Unfollow' : 'Follow';
            }
        }
    }
</script>