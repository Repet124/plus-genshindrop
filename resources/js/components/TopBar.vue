<script setup>

import {ref} from 'vue';
import axios from 'axios';

let user = ref(null);

function onTelegramAuth(userDataFromTelegram) {
	axios.get('/sanctum/csrf-cookie').then(response => {
		axios.post('/api/login', userDataFromTelegram)
			.json(response => {
				user.value = response
			})
	});
}

</script>

<template>
	<div class="topBar">
		<div class="user">
			<img class="avatar" :src="user ? user.photo_url : 'https://placehold.co/50x50'" alt="user avatar">
			<span class="name">{{ user ? user.first_name+' '+user.last_name : 'Anonimus'}}</span>
		</div>
	</div>
</template>

<style>
	.topBar {
		display: flex;
		justify-content: end;
		padding: 15px;
		background-color: DarkSlateGrey;
	}
	.user {
		display: flex;
		align-items: center;
		gap: 15px;
	}
	.avatar {
		width: 50px;
		height: 50px;
		border-radius: 50%;
	}

	.name {
		color: #fff;
		font-size: 1.5rem;
	}

</style>
