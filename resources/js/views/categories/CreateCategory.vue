<template>
    <div>
        <h4 class="text-center">Add Category</h4>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="addCategory">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" v-model="category.name">
                    </div>
                    <div class="form-group">
                        <label>Icon</label>
                        <input type="text" class="form-control" v-model="category.icon">
                    </div>
                    <button type="submit" class="btn btn-primary">Add Category</button>
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
    methods: {
        addCategory() {
            axios.get('/sanctum/csrf-cookie').then(response => {
                axios.post('/api/categories/add', this.category)
                    .then(response => {
                        this.$router.push({name: 'categories'})
                    })
                    .catch(function (error) {
                        console.error(error);
                    });
            })
        }
    }
}
</script>
