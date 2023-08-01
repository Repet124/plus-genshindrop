<script setup>

import { ref } from 'vue';

let test = ref(123);
</script>

<template>
	<div class="menu">
		<router-link class="menu-item" to="/mona">Мона</router-link>
		<div class="menu-item">Скоро</div>
		<div class="menu-item">Скоро</div>
	</div>

</template>

<style>
	.menu {
		display: flex;
		justify-content: space-around;
	}
	.menu-item {
		height: 500px;
		background: #efefef;
		padding: 50px;
	}
</style>
