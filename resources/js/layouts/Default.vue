<template>
    <div>
        <Navbar/>
        <slot></slot>
    </div>
</template>

<script>
import Navbar from "../components/Navbar";
export default {
    name: "Default",
    components: {
        Navbar
    }
}
</script>

<style scoped>
</style>
