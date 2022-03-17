<template>
    <nav class="navbar">
        <div class="navbar-brand">
            <router-link to="/home">Home</router-link>
            <Login v-show="isShowModalLogin" :show="isShowModalLogin" @close="toggleModalLogin"/>
            <Register v-show="isShowModalRegister" :show="isShowModalRegister" @close="toggleModalRegister"/>
            <a class="nav-item nav-link" style="cursor: pointer;" @click="toggleModalLogin" v-if="isLoggedIn === false">Login</a>
            <a class="nav-item nav-link" style="cursor: pointer;" @click="toggleModalRegister" v-if="isLoggedIn === false">Register</a>
            <a class="nav-item nav-link" style="cursor: pointer;" v-if="isLoggedIn === true" @click="logout">Logout</a>
        </div>
    </nav>
</template>

<script>
import Login from "../views/auth/Login";
import Register from "../views/auth/Register";
export default {
    name: "Navbar",
    data() {
        return {
            isShowModalLogin: false,
            isShowModalRegister: false,
            isLoggedIn: false,
        }
    },
    components: {
        Login,
        Register,
    },
    created() {
        if (window.Laravel.isLoggedin) {
            this.isLoggedIn = true
        }
    },
    methods: {
        logout(e) {
            e.preventDefault()
            axios.get('/sanctum/csrf-cookie').then(response => {
                axios.post('/api/logout')
                    .then(response => {
                        if (response.data.success) {
                            window.location.href = "/"
                        } else {
                            console.log(response)
                        }
                    })
                    .catch(function (error) {
                        console.error(error);
                    });
            })
        },
        toggleModalLogin() {
            this.isShowModalLogin = !this.isShowModalLogin;
        },
        toggleModalRegister() {
            this.isShowModalRegister = !this.isShowModalRegister;
        },
    },
}
</script>

<style scoped>
</style>
