import * as VueRouter from "vue-router";
import Home from "./views/Home";
import Login from "./views/auth/Login";
import Register from "./views/auth/Register";
import Dashboard from "./views/Dashboard";
import Categories from "./views/categories/Categories";
import CreateCategory from "./views/categories/CreateCategory";
import UpdateCategory from "./views/categories/UpdateCategory";

const routes = [
    {
        path: "/",
        name: "/",
        component: Home,
    },
    {
        path: "/home",
        name: "home",
        component: Home,
    },
    {
        path: "/login",
        name: "login",
        component: Login,
    },
    {
        path: "/register",
        name: "register",
        component: Register,
    },
    {
        path: "/dashboard",
        name: "dashboard",
        component: Dashboard,
        beforeEnter(to, from, next) {
            if (!window.Laravel.isLoggedin) {
                window.location.href = "/login";
            }
            else {
                next()
            }
        }
    },
    {
        path: "/categories",
        name: "categories",
        component: Categories,
        beforeEnter(to, from, next) {
            if (!window.Laravel.isLoggedin) {
                window.location.href = "/login";
            }
            else {
                next()
            }
        }
    },
    {
        path: "/categories/add",
        name: "createcategory",
        component: CreateCategory,
        beforeEnter(to, from, next) {
            if (!window.Laravel.isLoggedin) {
                window.location.href = "/login";
            }
            else {
                next()
            }
        }
    },
    {
        path: "/categories/edit/:id",
        name: "editcategory",
        component: UpdateCategory,
        beforeEnter(to, from, next) {
            if (!window.Laravel.isLoggedin) {
                window.location.href = "/login";
            }
            else {
                next()
            }
        }
    },
];

const router = VueRouter.createRouter({
    history: VueRouter.createWebHistory(),
    routes,
});

export default router;
