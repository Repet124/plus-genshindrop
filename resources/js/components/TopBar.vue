<script setup>

import {ref} from 'vue';
import axios from 'axios';

let user = ref(null);

function onTelegramAuthTest() {
	onTelegramAuth({
		id: 123,
		first_name: 'Ivan',
		last_name: 'Ivanov',
		username: 'superUserName',
		photo_url: 'https://placeholder.co/50x50',
		auth_date: 321,
		hash: 'qwerty'
	});
}

function onTelegramAuth(userDataFromTelegram) {
	axios.get('/sanctum/csrf-cookie').then(response => {
		axios.post('/api/login', userDataFromTelegram)
			.then(response => {
				user.value = response.data;
			})
	});
}

</script>

<template>
	<div class="topBar">
		<button v-if="!user" class="auth" @click="onTelegramAuthTest">Login</button>
		<div v-else class="user">
			<img class="avatar" :src="user.photo_url" alt="user avatar">
			<span class="name">{{user.first_name+' '+user.last_name}}</span>
		</div>
	</div>
</template>

<style>
	.auth {
		padding: 5px 25px;
		height: 50px;
		color: #fff;
		font-size: 1.5rem;
		border: none;
		border-radius: 25px;
		background-color: DodgerBlue;
		box-shadow: 1px 1px 5px 1px #5e5e5e;
	}
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
