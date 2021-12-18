<template>
    <div>

        <button type="button" v-on:click="followUser" class="btn btn-link" v-text="buttonText"></button>     
    </div>
</template>

<script>
    export default {

        props: ['userId', 'isFollowing'],

        mounted() {
            console.log('Component mounted.')
       },

       data: function () {
          return {
             status: this.isFollowing,
          }
        },

       methods: {
            followUser(){  
                
                axios.post('/follows/' + this.userId)
                    .then( this.status = !this.status )
                    .catch(e => {

                        if(e.response.status == 401){
                            window.location = '/login'
                        }
                        });
    
            },

        },

        computed: {

            buttonText(){
                return (this.status) ? 'Unfollow' : 'Follow';
            }
        }
    }

    

</script>
