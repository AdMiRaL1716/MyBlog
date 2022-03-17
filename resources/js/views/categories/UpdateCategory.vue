<template>
    <div>
        <h4 class="text-center">Edit Category</h4>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="updateCategory">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" v-model="category.name">
                    </div>
                    <div class="form-group">
                        <label>Icon</label>
                        <input type="text" class="form-control" v-model="category.icon">
                    </div>
                    <button type="submit" class="btn btn-primary">Update category</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            category: {}
        }
    },
    created() {
        axios.get('/sanctum/csrf-cookie').then(response => {
            axios.get(`/api/categories/edit/${this.$route.params.id}`)
                .then(response => {
                    this.category = response.data;
                })
                .catch(function (error) {
                    console.error(error);
                });
        })
    },
    methods: {
        updateCategory() {
            axios.get('/sanctum/csrf-cookie').then(response => {
                axios.post(`/api/categories/update/${this.$route.params.id}`, this.category)
                    .then(response => {
                        this.$router.push({name: 'categories'});
                    })
                    .catch(function (error) {
                        console.error(error);
                    });
            })
        }
    },
}
</script>

<style scoped>
</style>
