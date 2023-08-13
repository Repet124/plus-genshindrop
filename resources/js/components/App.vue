<script setup>

import TopBar from './TopBar.vue';

</script>

<template>
	<TopBar />
	<router-view></router-view>
</template>

<style>
	* {
		margin: 0;
		padding: 0;
		box-sizing: border-box;
	}
</style>
