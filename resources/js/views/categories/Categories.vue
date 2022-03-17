<template>
    <div>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>icon</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="category in categories" :key="category.id">
                <td>{{ category.id }}</td>
                <td>{{ category.name }}</td>
                <td>{{ category.icon }}</td>
                <div class="btn-group" role="group">
                    <router-link :to="{name: 'editcategory', params: { id: category.id }}" class="btn btn-primary">Edit
                    </router-link>
                    <button class="btn btn-danger" @click="deleteCategory(category.id)">Delete</button>
                </div>
            </tr>
            </tbody>
        </table>
        <router-link to="/categories/add" class="nav-item nav-link">Add Category</router-link>
        <!--<button type="button" class="btn btn-info" @click="this.$router.push('/categories/categories/add')">Add Category</button>-->
    </div>
</template>

<script>
export default {
    data() {
        return {
            categories: []
        }
    },
    created() {
        axios.get('/sanctum/csrf-cookie').then(response => {
            axios.get('/api/categories/categories')
                .then(response => {
                    this.categories = response.data;
                })
                .catch(function (error) {
                    console.error(error);
                });
        })
    },
    methods: {
        deleteCategory(id) {
            axios.get('/sanctum/csrf-cookie').then(response => {
                axios.delete(`/api/categories/delete/${id}`)
                    .then(response => {
                        let i = this.categories.map(item => item.id).indexOf(id);
                        this.categories.splice(i, 1)
                    })
                    .catch(function (error) {
                        console.error(error);
                    });
            })
        }
    }
}
</script>

<style scoped>
</style>
