<template>
  <h1>Users</h1>
    <div v-for="user in users">
      <h2>{{ user }}<h2>
    </div>
</template>

<script>
  export default {
    data() {
      return {
        users: [],
        user: {
          id: '',
          email: '',
          lname: '',
          fname: '',
          username: '',
          phone: '',
          postal: '',
          confirmedEmail: '',
          created_at: '',
          role: '',
        },
        user_id: '',
        pagination: '',
        edit: false
      }
    },

    created(){
      this.fetchUsers();
    },

    methods: {
      fetchUsers(page_url){
      let vm = this;
        page_url = page_url|| 'http://localhost:8080/training/public/api/users'
        fetch(page_url)
        .then(res => res.json())
        .then(data =>{
          console.log(data);
          this.users = data;
        })
        .catch((error) => {
          console.log(error);
        })
      }
    }

  }
</script>
